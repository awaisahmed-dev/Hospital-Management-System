<?php

namespace Common\Models;

use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    protected static function booted()
    {
        static::creating(function ($model) {

            if (auth()->check()) {
                $model->created_by = auth()->id();
                $model->updated_by = auth()->id();
            }
        });

        static::updating(function ($model) {

            if (auth()->check()) {
                $model->updated_by = auth()->id();
            }
        });
    }
}