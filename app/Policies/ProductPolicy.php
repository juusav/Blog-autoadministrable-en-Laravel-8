<?php

namespace App\Policies;

use App\Models\Product;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProductPolicy
{
    use HandlesAuthorization;

    public function author(User $user, Product $product){ //Esta funcion siempre necesitará parametros
        if ($user->id == $product->user_id){   //Si el usuario que está intentando actualizar el producto es el mismo que lo escribió
            return true;
        }else{
            return false;
        }
    }

    public function published(?User $user, Product $product){ //coloqué el simbolo ? porque las policies funcionan si un usuario está registrado. Con el simbolo el usuario podrá acceder al producto en cuestion sin que le salte el error 401 no autorizado
        if ($product->status == 2){ //2 es el estado publicado 1 es el estado del producto en borrador 
            return true;
        }else{
            return false;
        }
    }
}
