<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Olchamlar extends Model
{
    use HasFactory;

    protected $table = 'olchamlar';
    protected $fillable = ['id', 'olcham_nomi', 'firmaid'];
}

