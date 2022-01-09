<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class album_genero extends Model
{
    use HasFactory;
    protected $table = 'album_genero';
    protected $primaryKey = 'idAlbum';
    public $incrementing = false;
}
