<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stevebauman\Location\Facades\Location;
use Illuminate\Support\Facades\DB;

class RestaurantsController extends Controller
{
    public function frontendRestaurant(){
        return view('frontend.Restaurant.front_Restaurant');
    } // end method

    public function restaurantsearch(){

        $position = Location::get();
        $locationLat =  $position->latitude;
        $locationLon = $position->longitude;

        $result = DB::select(" SELECT * FROM (
           SELECT *, 
               (
                   (
                       (
                           acos(
                               sin(( $locationLat * pi() / 180))
                               *
                               sin(( `lat` * pi() / 180)) + cos(( $locationLat * pi() /180 ))
                               *
                               cos(( `lat` * pi() / 180)) * cos((( $locationLon - `lng`) * pi()/180)))
                       ) * 180/pi()
                   ) * 60 * 1.1515 * 1.609344
               )
           as distance FROM `restaurants`
       ) `restaurants`
       WHERE distance <= 150
       ORDER BY distance ASC LIMIT 8");

       $count = count($result);

        $notification = array (
            'message' => $count .' Nearest Restaurants Are Found Successfully!',
            'alert-type' => 'success'
        );

        session()->put($notification);

        return view('frontend.Restaurant.restaurant_results', compact('result'));

    } // end method
}
