<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class artista_sencillo extends Model
{
    use HasFactory;
    protected $table = 'artista_sencillo';
    protected $primaryKey = 'idSencillo';
    public $incrementing = false;
}
