<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Storage;
use Image;

class StorageController extends Controller
{
	public function uploadImage(Request $request)
	{
        $CKEditor = Input::get('CKEditor');
        $funcNum = Input::get('CKEditorFuncNum');
        $message = $url = '';
        if (Input::hasFile('upload')) {
            $file = Input::file('upload');
            $filename = str_replace('.'.$file->getClientOriginalExtension(),'',$file->getClientOriginalName());
            $filename = str_slug($filename,'-').'.'.$file->getClientOriginalExtension();
            $filename = str_replace('_','-',$filename);
            $i = 1;
            $error = false;
            while(Storage::disk('uploads')->exists($filename)) {
                $filename = str_replace('.'.$file->getClientOriginalExtension(),'',$file->getClientOriginalName());
                $filename = str_slug($filename,'-') . '-' . $i++ . '.' .$file->getClientOriginalExtension();
                $filename = str_replace('_','-',$filename);
                $error = true;
            }
            if ($error)
                $message = 'Файл с таким именем уже существует. Файл переименован на ' . $filename;
            if ($file->isValid()) {
                $path = Storage::disk('uploads')->putFileAs('/', $file, $filename);
                $img = Image::make('uploads/' . $path);
                if($img->height() > $img->width() && $img->height() > 1000) {
                    $img->heighten(1000);
                } elseif($img->width() > $img->height() && $img->width() > 1000) {
                    $img->widen(1000);
                }
                $img->save('uploads/' . $path, 75);
                $url = url('uploads/' . $path);
            } else {
                $message = 'Ошибка при загрузке файла.';
            }
        } else {
            $message = 'Файл не загружен.';
        }
        /*
        return response()
            ->json(
                [
                    'uploaded' => $error ? 0 : 1,
                    'fileName' => $filename,
                    'url' => '/uploads/' . $path,
                    'error' => ['message' => $message]
                ]
            );
        */
        return '<script>window.parent.CKEDITOR.tools.callFunction('.$funcNum.', "'.'/uploads/' . $path.'", "'.$message.'")</script>';
	}

	public static function compressImage($path, $size = 1300)
	{
		$img = Image::make($path);

		if ($img->height() >= $img->width() && $img->height() > $size) {
			$img->heighten($size);
			$img->save($path, 80);
		} elseif ($img->width() >= $img->height() && $img->width() > $size) {
			$img->widen($size);
			$img->save($path, 80);
		}
	}

	public static function saveMinImage($path, $max = 1300, $min = 500)
	{
		if (!Storage::disk('public')->exists('min/' . $path)) {
			$minimg = Image::make($path);
			if ($minimg->height() >= $minimg->width() && $minimg->height() > $min) {
				$minimg->heighten($min);
			} elseif ($minimg->width() >= $minimg->height() && $minimg->width() > $min) {
				$minimg->widen($min);
			}
			$minimg->save('min/' . $path, 85);
		}

		self::compressImage($path, $max);
	}

	public function savePhoto(Request $request)
	{
		$path = Storage::disk('uploads')->put('avatars', $request->file('uploaded_photo'));
		self::saveMinImage('images/' . $path, 500, 100);
		return response()->json([
			'images/' . $path,
			'success' => true
		]);
	}

    public static function saveImageCallback($file, $path, $filename) {
        $i = 1;
        while(Storage::disk('uploads')->exists($filename)) {
            $filename = str_replace('.'.$file->getClientOriginalExtension(),'',$file->getClientOriginalName());
            $filename = str_slug($filename,'-') . '-' . $i++ . '.' .$file->getClientOriginalExtension();
            $filename = str_replace('_','-',$filename);
        }
        if (class_exists('Intervention\Image\Facades\Image') && (bool) getimagesize($file->getRealPath())) {
            $image = \Intervention\Image\Facades\Image::make($file);
            $value = $path.'/'.$filename;
            $image->save($value);
            return ['path' => $path, 'value' => 'uploads/'.$filename];
        }
        return ['path' => $path, 'value' => 'uploads/error.png'];
    }

    public static function getFileName($file) {
        $filename = str_replace('.'.$file->getClientOriginalExtension(),'',$file->getClientOriginalName());
        $slug = str_slug($filename,'-').'.'.$file->getClientOriginalExtension();
        return str_replace('_','-',$slug);
    }


    public static function saveImage($folder, $file, $size = 1500, $min = 400)
    {
        $filename = str_replace('.'.$file->getClientOriginalExtension(),'',$file->getClientOriginalName());
        $filename = str_slug($filename,'-').'.'.$file->getClientOriginalExtension();
        $filename = str_replace('_','-',$filename);
        $i = 1;
        while(Storage::disk('uploads')->exists($folder . '/' . $filename)) {
            $filename = str_replace('.'.$file->getClientOriginalExtension(),'',$file->getClientOriginalName());
            $filename = str_slug($filename,'-') . '-' . $i++ . '.' .$file->getClientOriginalExtension();
            $filename = str_replace('_','-',$filename);
        }
        if ($file->isValid()) {
            $path = Storage::disk('uploads')->putFileAs($folder, $file, $filename);
            self::saveMinImage('uploads/' . $path, $size, $min);
            return 'uploads/' . $path;
        }
        return null;
    }
}