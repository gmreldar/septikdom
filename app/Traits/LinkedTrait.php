<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

/**
 * Trait OrderableTrait.
 * @method static $this linkedModel()
 */
trait LinkedTrait
{
    public static function bootLinkedTrait()
    {
        self::creating(function($model){
            $model->updateLinkFieldOnCreate();
        });

        self::updating(function($model){
            $model->updateLinkFieldOnUpdate();
        });

        if (in_array("Illuminate\Database\Eloquent\SoftDeletes", trait_uses_recursive(new static()))) {
            static::restoring(function($model){
                if($model->deleted_at)
                    $model->updateLinkFieldOnRestore();
            });
        }
    }

    /**
     * Update link field on create.
     */
    protected function updateLinkFieldOnCreate()
    {
        if(isset($this->{$this->getLinkField()}))
            $this->{$this->getLinkField()} = self::getHref($this->{$this->getLinkField()});
        else
            $this->{$this->getLinkField()} = self::getHref($this->{$this->getNameField()});
        $i = 1;
        while(static::linkedModel()->where($this->getLinkField(), $this->{$this->getLinkField()})->whereNull('deleted_at')->count() > 0) {
            $this->{$this->getLinkField()} = $this->{$this->getLinkField()} . '-' . $i++;
        }
    }

    /**
     * Update link field on update.
     */
    protected function updateLinkFieldOnUpdate()
    {
        $oldModel = static::linkedModel()->withTrashed()->find($this->id);
        if($this->{$this->getLinkField()} != $oldModel->{$this->getLinkField()}) {
            if(isset($this->{$this->getLinkField()}))
                $this->{$this->getLinkField()} = self::getHref($this->{$this->getLinkField()});
            else
                $this->{$this->getLinkField()} = self::getHref($this->{$this->getNameField()});
            $i = 1;
            while(static::linkedModel()->where($this->getLinkField(), $this->{$this->getLinkField()})->whereNull('deleted_at')->count() > 0) {
                $this->{$this->getLinkField()} = $this->{$this->getLinkField()} . '-' . $i++;
            }
        }
    }


    /**
     * Update link field on restore.
     */
    protected function updateLinkFieldOnRestore()
    {
        if($this->deleted_at) {
            $i = 1;
            while(static::linkedModel()->where($this->getLinkField(), $this->{$this->getLinkField()})->whereNull('deleted_at')->count() > 0) {
                $this->{$this->getLinkField()} = $this->{$this->getLinkField()} . '-' . $i++;
            }
        }
    }

    /**
     * Get href by string.
     *
     * @param string
     *
     * @return string
     */
    protected function getHref($str)
    {
        $translit = array(
            "??" => "a", "??" => "b", "??" => "v", "??" => "g", "??" => "d", "??" => "e", "??" => "e", "??" => "zh", "??" => "z", "??" => "i", "??" => "y", "??" => "k", "??" => "l", "??" => "m", "??" => "n", "??" => "o", "??" => "p", "??" => "r", "??" => "s", "??" => "t", "??" => "u", "??" => "f", "??" => "h", "??" => "ts", "??" => "ch", "??" => "sh", "??" => "shch", "??" => "", "??" => "y", "??" => "", "??" => "e", "??" => "yu", "??" => "ya",
            "??" => "a", "??" => "b", "??" => "v", "??" => "g", "??" => "d", "??" => "e", "??" => "e", "??" => "zh", "??" => "z", "??" => "i", "??" => "y", "??" => "k", "??" => "l", "??" => "m", "??" => "n", "??" => "o", "??" => "p", "??" => "r", "??" => "s", "??" => "t", "??" => "u", "??" => "f", "??" => "h", "??" => "ts", "??" => "ch", "??" => "sh", "??" => "shch", "??" => "", "??" => "y", "??" => "", "??" => "e", "??" => "yu", "??" => "ya",
            "A" => "a", "B" => "b", "C" => "c", "D" => "d", "E" => "e", "F" => "f", "G" => "g", "H" => "h", "I" => "i", "J" => "j", "K" => "k", "L" => "l", "M" => "m", "N" => "n", "O" => "o", "P" => "p", "Q" => "q", "R" => "r", "S" => "s", "T" => "t", "U" => "u", "V" => "v", "W" => "w", "X" => "x", "Y" => "y", "Z" => "z"
        );
        $str = strtr($str, $translit);
        $str = preg_replace("/[^a-zA-Z0-9_]/i", "_", $str);
        $str = preg_replace("/\-+/i", "-", $str);
        $str = preg_replace("/(^\-)|(\-$)/i", "", $str);

        return $str;
    }

    /**
     * Link scope.
     *
     * @param $query
     *
     * @return mixed
     */
    public function scopeLinkedModel($query)
    {
        return $query;
    }

    /**
     * Get link field name.
     * @return string
     */
    public function getLinkField()
    {
        return 'link';
    }

    /**
     * Get name field name.
     * @return string
     */
    public function getNameField()
    {
        return 'name';
    }
}