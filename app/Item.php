<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Item extends Model
{
    protected $primaryKey = 'id';
    protected $fillable = ['category','found_time', 'user_id','found_user','found place','colour','photo','description'];
    public $timestamps = false;
    use Sortable;
    public $sortable = ['id','category','found_time','colour'];
}
