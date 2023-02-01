<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mosques;
use Illuminate\Support\Facades\DB;
use Stevebauman\Location\Facades\Location;

class MosquesController extends Controller
{
    public function frontendMosque(){
        return view('frontend.Mosque.front_Mosque');
    } // end method

    public function mosqueSearch(){

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
           as distance FROM `mosques`
       ) `mosques`
       WHERE distance <= 150
       ORDER BY distance ASC LIMIT 8");

       $count = count($result);

        $notification = array (
            'message' => $count .' Nearest Mosques Are Found Successfully!',
            'alert-type' => 'success'
        );

        session()->put($notification);

        return view('frontend.Mosque.mosque_results', compact('result'));

    }

  
}
