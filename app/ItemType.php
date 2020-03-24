<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Item;

class ItemType extends Model
{
    //
    protected $table = "item_type";


    public function items(){
        return $this->hasMany(Item::class);
    }

}
