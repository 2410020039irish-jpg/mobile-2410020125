<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Batimetri extends Model
{
    use HasFactory;

    protected $table = 'batimetris';
    protected $primaryKey = 'id_batimetri';

    protected $fillable = [
        'id_data',
        'id_analisis',
        'pembahasan',
    ];

    public function deskripsiUmum()
    {
        return $this->belongsTo(DeskripsiUmum::class, 'id_data', 'id_data');
    }
}