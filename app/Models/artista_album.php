<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class artista_album extends Model
{
    use HasFactory;
    protected $table = 'artista_album';
    protected $primaryKey = 'idAlbum';
    public $incrementing = false;
}
