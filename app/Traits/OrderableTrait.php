<?php

namespace App\Traits;

/**
 * Trait OrderableTrait.
 * @method static $this orderModel()
 */
trait OrderableTrait
{
    public static function bootOrderableTrait()
    {
        self::creating(function($model){
            $model->updateOrderFieldOnCreate();
        });

        self::deleted(function($model){
            $model->updateOrderFieldOnDelete();
        });

        if (in_array("Illuminate\Database\Eloquent\SoftDeletes", trait_uses_recursive(new static()))) {
            static::restoring(function($model){
                if($model->deleted_at)
                    $model->updateOrderFieldOnRestore();
            });
        }
    }

    /**
     * Update order field on create.
     */
    protected function updateOrderFieldOnCreate()
    {
        $this->{$this->getOrderField()} = static::orderModel()->max($this->getOrderField()) + 1;
    }

    /**
     * Update order field on delete.
     */
    protected function updateOrderFieldOnDelete()
    {
        static::orderModel()
            ->where($this->getOrderField(), '>', $this->{$this->getOrderField()})
            ->decrement($this->getOrderField());
    }

    /**
     * Update order field on restore.
     */
    protected function updateOrderFieldOnRestore()
    {
        static::orderModel()
            ->where($this->getOrderField(), '>=', $this->{$this->getOrderField()})
            ->increment($this->getOrderField());
    }

    public function updateOrder($newOrder)
    {
        $oldOrder = $this->{$this->getOrderField()};
        if ($oldOrder != $newOrder) {
            if ($oldOrder > $newOrder)
                static::orderModel()
                    ->where($this->getOrderField(), '<', $oldOrder)
                    ->where($this->getOrderField(), '>=', $newOrder)
                    ->increment($this->getOrderField());
            else
                static::orderModel()
                    ->where($this->getOrderField(), '>', $oldOrder)
                    ->where($this->getOrderField(), '<=', $newOrder)
                    ->decrement($this->getOrderField());

            $this->update([$this->getOrderField() => $newOrder]);
        }
        return response($newOrder, 200);
    }

    /**
     * Order scope.
     *
     * @param $query
     *
     * @return mixed
     */
    public function scopeOrderModel($query)
    {
        return $this->getParentFieldName() ?
            $query->where($this->getParentFieldName(), $this->{$this->getParentFieldName()}) :
            $query;
    }

    /**
     * Get order field name.
     * @return string
     */
    public function getOrderField()
    {
        return 'ord';
    }

    /**
     * Get order field name.
     * @return string
     */
    public function getParentFieldName()
    {
        return null;
    }
}