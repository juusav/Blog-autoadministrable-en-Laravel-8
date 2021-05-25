<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'slug']; //Asignacion masiva    

    public function getRouteKeyName() //Deja de ocupar el id en la parte de la url y pasa a ocupar el slug
    {
        return "slug";
    }

    //Relacion uno a muchos
    public function products(){
        return $this->hasMany(Product::class); 
    }
}
