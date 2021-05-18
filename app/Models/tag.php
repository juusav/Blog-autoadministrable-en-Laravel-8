<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tag extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'color']; //Valores que se puedan introducir a mi BD por asignacion masiva

    
    public function getRouteKeyName() 
    {
        return "slug";
    }

    //Relacion muchos a muchos
    public function products(){
        return $this->belongsToMany(Product::class);
    }
}
