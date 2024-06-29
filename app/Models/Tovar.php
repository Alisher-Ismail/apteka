<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tovar extends Model
{
    use HasFactory;
    protected $table = 'tovar';
    protected $fillable = ['nomi', 'olingannarx', 'sotilgannarx', 'olchovid', 'barcode', 'donasoni', 'dolingannarx', 'dsotilgannarx'];
}
