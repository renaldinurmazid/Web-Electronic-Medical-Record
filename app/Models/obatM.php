<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class obatM extends Model
{
    use HasFactory,Searchable;
    protected $table = 'obat';
    protected $fillable = [
       'id','nama_obat','manfaat','stok'
    ];

    public function siswa()
    {
        return $this->hasMany(siswaM::class);
    }

     // Search
     public function searchableAs()
     {
         return 'obat';
     }
 
     public function toSearchableArray()
     {
         
         return [
             'nama_obat' =>$this->nama_obat,
         ];
     }
}
