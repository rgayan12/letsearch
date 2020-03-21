<?php

namespace App\Http\Controllers;

use App\Category;
use App\Item;
use Illuminate\Http\Request;
use Spatie\Geocoder\Geocoder;


class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::whereHas('items')->get();
         
        return view('frontend.index',compact('categories'));
        //
    }

    public function search(Request $request){

       // dd($request);

        $items = Item::filterByRequest($request)->where('is_active', 1)->orderBy('created_at')->paginate(10);

        return view('frontend.results',compact('items'));
    }

    public function refine(Request $request){
  
        $client = new \GuzzleHttp\Client();
        $geocoder = new Geocoder($client);
        
        $geocoder->setApiKey(config('geocoder.key'));

        $geocoder->setCountry(config('geocoder.country', 'UK'));
        
        $latlongs = $geocoder->getCoordinatesForAddress($request->postcode);
      
        if($latlongs['accuracy'] == "result_not_found")
        {
            return back()->withInput()->withErrors(['postcode.required', 'Please enter a valid UK Postcode']);
        }

        $lat = $latlongs['lat'];
        $lon = $latlongs['lng'];
        $radius = $request->radius;

        $items = Item::select('items.*')
               ->selectRaw('( 3961 * acos( cos( radians(?) ) *
                           cos( radians( lat ) )
                           * cos( radians( lon ) - radians(?)
                           ) + sin( radians(?) ) *
                           sin( radians( lat ) ) )
                         ) AS distance', [$lat, $lon, $lat])
        ->havingRaw("distance < ?", [$radius])
        ->get();

        
 
        return view('frontend.results',compact('items'));


        //$items = Item::filterByRequest($request)->WithDistance()
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function get_near_items($latitude, $longitude, $radius = 20) {

        $offers = Item::select('items.*')
        ->selectRaw('( 3959 * acos( cos( radians(?) ) *
                           cos( radians( lat ) )
                           * cos( radians( lon ) - radians(?)
                           ) + sin( radians(?) ) *
                           sin( radians( lat ) ) )
                         ) AS distance', [$latitude, $longitude, $latitude])
        ->havingRaw("distance < ?", [$radius])
        ->paginate();

    return $offers;
    }
}
