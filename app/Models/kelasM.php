<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class kelasM extends Model
{
    use HasFactory,Searchable;
    protected $table = 'kelas';
    protected $fillable = [
       'id','namakelas'
    ];

    public function siswa()
    {
        return $this->hasMany(siswaM::class);
    }

     // Search
     public function searchableAs()
     {
         return 'kelas';
     }
 
     public function toSearchableArray()
     {
         
         return [
             'namakelas' =>$this->namakelas,
             
         ];
     }
}
