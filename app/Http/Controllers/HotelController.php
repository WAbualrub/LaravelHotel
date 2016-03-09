<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\hotel;
use App\city;
use App\country;
use DB;

class HotelController extends Controller {
	/**
	
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$hotels = hotel::all();
		return view('hotels.index', compact('hotels'));
}
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('hotels/insert');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		
 			$name = $request->input('Name');
 			$country = $request->input('Country');
 			$city = $request->input('City');
 			$price = $request->input('AvgRate');

			$countryid=0;
			$cityid=0;

			//check if the country exist to avoid dublication
			$coid = country::select('country_id')->where('name', '=', $country)->get();
			foreach ($coid as $c) {
   				 $countryid= $c->country_id;
				}	
			
			//check if the city exist to avoid dublication
			$ciid = city::select('city_id')->where('name', '=', $city)->get();
			foreach ($ciid as $c) {
   				 $cityid= $c->city_id;
				}		

				

			if ($countryid==null) {
			    
			    //Inserting country
				$countryNew = new country;
				//This random to changed later
				$countryid=rand(1000,9999);
	            $countryNew->country_id = $countryid;
	            $countryNew->name = $country;
	            $countryNew->save();
			
			}
				if ($cityid==null) {
				    
				    //Inserting country
					$cityNew = new city;
					//This random to changed later
					$cityid=rand(1000,9999);
					$cityNew->city_id = $cityid;
		            $cityNew->country_id = $countryid;
		            $cityNew->name = $city;
		            $cityNew->save();
				}
			

            $hotel = new hotel;
            //This random to changed later
            $hotel->hotel_id = rand(1000,9999);
            $hotel->name = $name;
            $hotel->city_id = $cityid;
            $hotel->price = $price;
            $hotel->country_id = $countryid;

            $hotel->save();
            $hotels = hotel::all();
			return view('hotels.index',compact('hotels'))->with('message', 'hotel added.');

}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	public function get_search_page()
	{
		return view('hotels.search');
	}


	
    public function search_h(Request $request)
    {
          $query = $request->input('search');
          
		
          $get_country_id = country::select('country_id')->where('name', 'LIKE', '%'. $query .'%') ->get();
    

      if ( empty( $get_country_id ))

      {
        
         
           $get_city_id = city::select('city_id')->where('name', 'LIKE', '%'. $query .'%') ->get();
          
       
       if ( empty( $get_city_id ))

       {
             echo "not found";
       }
        
       else
         {
             	
            $city_id=$get_country_id[0]->city_id;
            $hotel_quiry_res = hotel::where('city_id', 'LIKE', '%'. $city_id .'%') ->get();
 
 
             	return view('hotels.search_index')->with('hotels_info',$hotel_quiry_res);

         }

      }

       else  
        {
        	$country_id=$get_country_id[0]->country_id;
        	
      	   
           $hotel_quiry_res = hotel::where('country_id', 'LIKE', '%'. $country_id .'%') ->orderBy('price', 'desc')->get();
          
 
      	        return view('hotels.search_index')->with('hotels_info',$hotel_quiry_res);
        }
             	


    }     
	




	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$hotel = hotel::find($id);
		$hotel->delete();
		$hotels = hotel::all();
		return view('hotels.index',compact('hotels'));

			}

}
