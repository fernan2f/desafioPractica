<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class artista extends Model
{
    use HasFactory;
    protected $table = 'artista';
    protected $primaryKey = 'nombre';
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable = ['requester', 'user_requested', 'status'];
}
