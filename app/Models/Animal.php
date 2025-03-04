<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Animal extends BaseModel
{
    use HasFactory, SoftDeletes;

    protected $table = 'animals';
    public $timestamps = true; 

    protected $fillable = ['name', 'jumlah', 'category', 'pattern'];
    
    public function getPercentageAttribute()
    {
        $totalAnimals = Animal::sum('jumlah');
        return $totalAnimals > 0 ? ($this->jumlah / $totalAnimals) * 100 : 0;
    }
}

