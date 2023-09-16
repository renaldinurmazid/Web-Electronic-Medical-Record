<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class siswaM extends Model
{
    use HasFactory;
    protected $table = 'siswa';
    protected $fillable =
    [
        'id','nisn','nama_lengkap','kelas_id','sakit','tanggal','obat_id','alamat','status'
    ];

    public function class()
    {
        return $this->belongsTo(kelasM::class, 'kelas_id');
    }
    public function class2()
    {
        return $this->belongsTo(obatM::class, 'obat_id');
    }
}
