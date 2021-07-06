<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use App;
use App\Models\Product;
use DB;
use Auth;
use Storage;
//use App\Http\Controller\Admin\libs\PHPExcel;


class ExcelController extends AppBaseController
{
    public function index(Request $request)
    {
        return view('admin.products.excel');
    }

    function exceToMysql($worksheet)
    {
        // Проверяем соединение с MySQL

        // Количество строк на листе Excel
        $rows_count = $worksheet->getHighestRow();

        $discount = 0;

        // Перебираем строки листа Excel
        for ($row = 1; $row <= $rows_count; $row++) {

            if ($worksheet->getCellByColumnAndRow(0, $row) != '') {
                if ($worksheet->getCellByColumnAndRow(3, $row) != '') {
                    $discount = $worksheet->getCellByColumnAndRow(3, $row);
                }
                $id = $worksheet->getCellByColumnAndRow(0, $row);
                $price = str_replace('р.', '', str_replace(' ', '', $worksheet->getCellByColumnAndRow(2, $row)));
//                    $connection->query("UPDATE `modifications` SET `price` = " . $price . ", `discount` = " . $discount . "*100 WHERE `id` =  " . $id);

                DB::update('update modifications set price = ?, discount = ?*100 where id = ?', array($price, $discount, $id));
            }
        }


        return true;
    }

    function excel(Request $request)
    {

        $paths = '';
        $array = $request->userfile;
        $array2 = $request->nameLink;
        foreach ($request->userfile as $userfile) {

            $userfileName = time();
            $name = $userfile->getClientOriginalName();
            $key = array_search($name, $array);
            $link = $array2[$key];

            if ($link == '') {
                $link = $userfileName;
            }

            $userfileFullName = $userfileName . '.' . $userfile->getClientOriginalExtension();
            $userfile->move(public_path('uploads/file/'), $userfileFullName);
            $paths = $userfileFullName;

        }

        require "libs\PHPExcel\IOFactory.php";

        // Загружаем файл Excel
        $PHPExcel_file =  PHPExcel_IOFactory::load(public_path('uploads/file/'. $paths));
        // Преобразуем первый лист Excel в таблицу MySQL
        $PHPExcel_file->setActiveSheetIndex(0);
        // Перебираем все листы Excel и преобразуем в таблицу MySQL
        foreach ($PHPExcel_file->getWorksheetIterator() as $index => $worksheet) {
            $this->exceToMysql($worksheet);
        }

        return back();
    }

}