<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JadwalPelajaran extends Model
{
    protected $table = 'jadwals';
    protected $fillable = [
        'user_id',
        'hari',
        'jam',
        'mapel_id',
        'kelas_ke',
        'ruang',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function mapel()
    {
        return $this->belongsTo(Mapel::class, 'mapel_id'); // Specify the foreign key
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_ke');
    }
}
