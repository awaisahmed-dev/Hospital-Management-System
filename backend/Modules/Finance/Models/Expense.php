<?php

namespace Backend\Modules\Finance\Models;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    protected $table = 'expenses';

    protected $fillable = [

        'expense_no',
        'expense_title',
        'amount',
        'expense_date',
        'remarks',
        'status',
        'created_by',
        'updated_by'
    ];
}