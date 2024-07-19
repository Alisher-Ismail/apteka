<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chiqimsavdo extends Model
{
    use HasFactory;
    protected $table = 'chiqimsavdo';
    protected $fillable = ['id', 'tovar_id', 'miqdori', 'miqdoridona', 'summa', 'summadona', 'toliqsumma', 'bolimid', 'userid', 'created_at', 'firmaid'];
}
