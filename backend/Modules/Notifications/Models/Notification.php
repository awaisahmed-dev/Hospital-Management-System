<?php

namespace Backend\Modules\Notifications\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $table = 'notifications';

    protected $fillable = [

        'notification_no',
        'title',
        'message',
        'module_name',
        'user_id',
        'status',
        'created_by',
        'updated_by'
    ];
}