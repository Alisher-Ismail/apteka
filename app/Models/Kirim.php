<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kirim extends Model
{
    use HasFactory;
    protected $table = 'kirim';
    protected $fillable = ['id', 'tovar_id', 'olcham_id', 'miqdori', 'dona', 'muddati', 'firmaid'];
}
