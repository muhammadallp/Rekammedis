<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class suster extends Model
{
    use HasFactory;
    protected $table = 'petugas';
    protected $guarded =['id'];
}
