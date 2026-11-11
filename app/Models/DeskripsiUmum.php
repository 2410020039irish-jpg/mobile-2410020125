<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Batimetri;

class DeskripsiUmum extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_data';
    protected $fillable = ['id_abstrak', 'observer', 'lokasi_observasi', 'tanggal_observasi', 'metode_analisis'];

    public function batimetri()
    {
        return $this->hasMany(Batimetri::class, 'id_data', 'id_data');
    }
}