<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function getRouteKeyName() //Deja de ocupar el id en la parte de la url y pasa a ocupar el slug
    {
        return "slug";
    }
    //Relacion uno a muchos inversa
    public function user(){
        return $this->belongsTo(user::class);
    }
    public function category(){
        return $this->belongsTo(category::class);
    }

    //Relacion uno a uno polimorfica
    public function image(){
        return $this->morphOne(Image::class, 'imageable');
    }
}
