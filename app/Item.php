<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;


class Item extends Model
{
    protected $fillable = ['person_name','sharing_product','asking_product','return_expected','phone_number','postcode','is_active','category_id','lat','lon'];

    public function categories(){
        return $this->belongsTo(Category::class);
        }
    //

    public function scopeFilterByRequest($query, Request $request)
    {
        if ($request->input('category')) {
                $query->where('category_id', $request->input('category'));
        }
        
        if ($request->input('search')) {
            $query->where('sharing_product', 'LIKE', '%'.$request->input('search').'%');
        }

        return $query;
    }

    public function getUrlAttribute() {

        return URL::signedRoute('deactivate', ['item' => $this->id]);

    }




}
