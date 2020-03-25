<?php

namespace App\Http\Controllers;

use App\Category;
use App\Item;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Spatie\Geocoder\Geocoder;
use Session;
use App\Mail\ContactUsMail;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sharecategories = Category::whereHas('items', function (Builder $query){
            $query->where('active',1);
            $query->where('item_type_id', 1);
        })->get();

        $requestcategories = Category::whereHas('items', function (Builder $query){
            $query->where('active',1);
            $query->where('item_type_id', 1);
        })->get();

        $allcategories = Category::whereHas('items', function (Builder $query){
            $query->where('active',1);
        })->get();


        return view('frontend.index',compact('sharecategories','requestcategories','allcategories'));
        //
    }

    public function search(Request $request){

       // dd($request);

        $items = Item::filterByRequest($request)->where('active', 1)->orderBy('created_at')->paginate(10);

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
          
            return redirect()->back()->withInput()->with('postcodeerror','Please enter a valid UK Postcode');
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
        ->where('active', 1)
        ->where('item_type_id', 2)
        ->get();

 
        return view('frontend.results',compact('items'));


        //$items = Item::filterByRequest($request)->WithDistance()
    
    }

    public function helplocal(Request $request){
  
        $client = new \GuzzleHttp\Client();
        $geocoder = new Geocoder($client);
        
        $geocoder->setApiKey(config('geocoder.key'));

        $geocoder->setCountry(config('geocoder.country', 'UK'));
        
        $latlongs = $geocoder->getCoordinatesForAddress($request->postcode);
    
        if($latlongs['accuracy'] == "result_not_found")
        {
          
            return redirect()->back()->withInput()->with('postcodeerror','Please enter a valid UK Postcode');
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
        ->where('active', 1)
        ->where('item_type_id', 1)
        ->OrWhere('category_id', $request->category_id)
        ->get();

        
        return view('frontend.helpresults',compact('items'));


        //$items = Item::filterByRequest($request)->WithDistance()
    
    }

    public function howitworks(){
        return view('frontend.howitworksmain');
    }
    public function terms(){
        return view('frontend.terms');
    }

    public function contact(){
        return view('frontend.contact');
    }

    public function contactSend(Request $request){

        $name_contact = $request->name;
        $email = $request->email;
        $subject = $request->subject;
        $message = $request->message;


        $objDemo = new \stdClass();

        $objDemo->name = $name_contact;
        $objDemo->email = $email;
        $objDemo->subject = $subject;
        $objDemo->message = $message;
        $objDemo->sender = "Letshare";


        Mail::to($email)->send(new ContactUsMail($objDemo));

        
    
        $msg = ["message" => "Thank you. We will be in touch with you shortly"];

        return redirect()->back()->with($msg);
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
