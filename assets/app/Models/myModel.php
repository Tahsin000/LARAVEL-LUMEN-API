<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class myModel extends Model
{
    protected $table = 'details';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $keyType = 'int';
}
