<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class siswaM extends Model
{
    use HasFactory , Searchable;
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

    // Search
    public function searchableAs()
    {
        return 'siswa';
    }

    public function toSearchableArray()
    {
        
        return [
            'nisn' =>$this->nisn,
            'nama_lengkap' =>$this->nama_lengkap,
        ];
    }
}
