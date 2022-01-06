<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sencillo extends Model
{
    use HasFactory;
    protected $table = 'sencillo';
    protected $primaryKey = 'id_sencillo';
    public $timestamps = false;
    protected $fillable = ['requester', 'user_requested', 'status'];
}
