<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\hotel;
use App\city;
use App\country;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();
		$this->call('TablesSeeder');

		// $this->call('UserTableSeeder');
	}

}


class TablesSeeder extends Seeder{
 
	public function run()
	{
		//Deleting Old Data
		DB::table('hotels')->delete();
		DB::table('countries')->delete();
		DB::table('cities')->delete();

		//Url for Yamsafer API
		$url="https://api.yamsafer.me/en/search/index?objId=8270&objType=City&checkin_date=03/12/2016&checkout_date=03/13/2016";
		$dataJson = file_get_contents($url);
		$data = json_decode($dataJson, True);

		foreach ($data['hotels'] as $i=>$value) {
			
			//check if country exist to avoid dublication
			$CountryId = DB::table('countries')->select('country_id')->where('country_id', '=', $value['country_id'])->get();
			
			if ($CountryId==null) {
			    
			    //Inserting country
				$country = new country;
	            $country->country_id = $value['country_id'];
	            $country->name = $value['country_en'];
	            $country->save();
			}
			

			//check if city exist to avoid dublication
			$CityId = DB::table('cities')->select('city_id')->where('city_id', '=', $value['city_id'])->get();
			
			if ($CityId==null) {
				
				//inserting city
				$city = new city;
	            $city->city_id = $value['city_id'];
	            $city->name =$value['city_en'];
	            $city->country_id = $value['country_id'];
	            $city->save();
			}
            

            //Inserting Hotel
            $hotel = new hotel;
            $hotel->hotel_id = $value['hotel_id'];
            $hotel->name = $value['hotel_name'];
            $hotel->city_id = $value['city_id'];
            $hotel->country_id = $value['country_id'];
            $hotel->price = $value['avgRate'];
            $hotel->save();
			

		}
	}
}