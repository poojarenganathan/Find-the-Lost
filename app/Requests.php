<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Requests extends Model
{
    protected $primaryKey = "id";
    protected $fillable = ['item_id','user_id','reason','status'];
    public $timestamps = false;
    use Sortable;
    public $sortable = ['id','item_id','user_id'];
}
