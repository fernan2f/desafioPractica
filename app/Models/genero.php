<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class genero extends Model
{
    protected $table = 'genero';
    protected $primaryKey = 'nombre';
    public $timestamps = false;
    protected $fillable = ['requester', 'user_requested', 'status'];
    public $incrementing = false;

    use HasFactory;
}
