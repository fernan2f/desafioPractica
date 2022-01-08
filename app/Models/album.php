<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class album extends Model
{
    use HasFactory;
    protected $table = 'album';
    protected $primaryKey = 'id_album';
    public $timestamps = false;
    protected $fillable = ['requester', 'user_requested', 'status'];
}
