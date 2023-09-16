<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class obatM extends Model
{
    use HasFactory;
    protected $table = 'obat';
    protected $fillable = [
       'id','nama_obat','stok'
    ];

    public function siswa()
    {
        return $this->hasMany(siswaM::class);
    }
}
