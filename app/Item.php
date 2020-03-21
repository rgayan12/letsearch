<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;

class Item extends Model
{
    protected $fillable = ['person_name','sharing_product','asking_product','return_expected','phone_number','postcode','is_active','category_id'];

    public function categories(){
        return $this->belongsTo(Category::class);
        }
    //
}
