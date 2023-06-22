<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataOtdp extends Model
{
    use HasFactory;
     protected $table = 'data_otdps';
    protected $primaryKey = 'id_otdp';
    protected $fillable = [
        'no_kepolisian', 'umur', 'ttl', 'pekerjaan', 'destinasi_tujuan'
    ];
}
