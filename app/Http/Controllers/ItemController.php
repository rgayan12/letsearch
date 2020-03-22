<?php

namespace App\Http\Controllers;

use App\Category;
use App\Item;
use Illuminate\Http\Request;

use AWS;
use Session;
use Spatie\Geocoder\Geocoder;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('name','id');
         
        return view('frontend.create',compact('categories'));
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

        $request->validate([
	    	'person_name' => 'required',
	    	'phone_number' => 'required|max:11|phone:GB,mobile,fixed_line',
	    	'postcode' => 'required',
            'sharing_product' => 'required',
            'return_expected' => 'required',
            'category_id' => 'required',
        ],
        [   
            'person_name.required' => 'Please enter your name to continue',
            'phone_number.required' => 'Please enter a valid UK phone number',
            'postcode.required' => 'Please enter a valid postcode',
            'sharing_product.required' => 'You must want to share something?',
            'return_expected.required' => 'Please let people know if you want something in return',
            'category_id.required' => 'Category is a required field',

        ]);

        $client = new \GuzzleHttp\Client();
        $geocoder = new Geocoder($client);
         

        $geocoder->setApiKey(config('geocoder.key'));

        $geocoder->setCountry(config('geocoder.country', 'UK'));
        
        $latlongs = $geocoder->getCoordinatesForAddress($request->postcode);

        if($latlongs['accuracy'] == "result_not_found" )
        {  
            return redirect()->back()->withInput()->with('postcodeerror','Please enter a valid UK Postcode');
        }

        $item = Item::create($request->all());

        $item->lat = $latlongs['lat'];
        $item->lon = $latlongs['lng'];
        $item->save();

        return redirect()->route('item.success',$item->id)->with('successmessage','Thank you!');

        
    }

    public function success($id)
    {
        
        if(Session::has('successmessage') || Session::has('deactivatemessage'))
        {
        $item = Item::findOrFail($id);
        
        $deactivateurl = $item->DeactivateUrl;
            
        $phone_number = '0044'.$item->SanitizedPhone;
        
      
        $this->sendSMS($phone_number, $deactivateurl);

        return view('frontend.success');
        }
        else
        return redirect()->route('home');
    }


    public function deactivated($id)
    {
        if(Session::has('deactivatemessage'))
        {
          return view('frontend.success');
        }
        else
        return redirect()->route('home');
    
    }
    protected function sendSMS($phone_number, $deactivateurl){
        $sms = AWS::createClient('sns');
	
        $sms->publish([
                'Message' => 'Hello, your item is now published. Please click the link below when you complete the share to remove from the site '. $deactivateurl,
                'PhoneNumber' => $phone_number,	
                'MessageAttributes' => [
                    'AWS.SNS.SMS.SMSType'  => [
                        'DataType'    => 'String',
                        'StringValue' => 'Transactional',
                    ],
                    'AWS.SNS.SMS.SenderID' => [
                        'DataType' => 'String', 
                        'StringValue' => 'Letshare'
                
                 ]
                ]
              ]);
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
    public function destroy(Request $request)
    {
        //
        $itemid = $request->input('item');
        $item = Item::findOrFail($itemid);
        $item->is_active = 0;
        $item->save();

        return redirect()->route('item.deactivated',$item->id)->with('deactivatemessage','Thank you!');

    }
}
