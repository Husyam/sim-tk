<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{

    protected $fillable = ['name', 'kode_mapel'];

    public function guru()
    {
        return $this->belongsTo(Guru::class);
    }

    public function jadwal_pelajaran()
    {
        return $this->hasMany(JadwalPelajaran::class);
    }

    public function nilai()
    {
        return $this->hasMany(Nilai::class);
    }
}
