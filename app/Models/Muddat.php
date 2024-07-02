<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Muddat extends Model
{
    use HasFactory;
    protected $table = 'muddat';
    protected $fillable = ['id', 'parol', 'used'];
}
