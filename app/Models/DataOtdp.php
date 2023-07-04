<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataOtdp extends Model
{
    protected $primaryKey = 'id';
    use HasFactory;
     protected $table = 'data_otdps';
    protected $fillable = [
        'no_kepolisian', 'umur', 'ttl', 'pekerjaan', 'destinasi_tujuan'
    ];
}
