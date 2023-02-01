<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Housing;
use Image;
use Illuminate\Support\Carbon;

class HousingController extends Controller
{
    public function allHousing()
    {
        $all_housing =  Housing::latest()->get();

        return view('admin.housing.all_housing', compact('all_housing'));
    } // end method

    public function addHousing(){
        return view('admin.housing.add_housing');
    }

    public function storeHousing(Request $request){

        $id = Auth::user()->id;

        $image = $request->file('image_url');
  
        $name_generated = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();     
  
        // resize image size by  (width)850x430(height) and save resized image at 'upload/cargos/' with name of $name_gen
        Image::make($image)->resize(430, 327)->save('upload/housing/'.$name_generated);
  
        // assign location of new image to $save_url
        $save_url = 'upload/housing/'.$name_generated;

        Housing::insert([
           'house_type' => $request->house_type,
           'house_options' => $request->house_options,
           'title' => $request->title,
           'description' => $request->description,         
           'rent_price' => $request->rent_price, 
           'location' => $request->location, 
           'post_id' => $id,                   
           'image_url' => $save_url,
           'created_at' => Carbon::now()          
  
        ]);
  
        $notification = array (
           'message' => 'Housing Added Successfully!',
           'alert-type' => 'success'
        );
        
        // display notification
        return redirect()->route('all.housing')->with($notification);        
    } // end method

    public function editHousing($id){
        $edit_housing = Housing::findOrFail($id);

        return view('admin.housing.edit_housing', compact('edit_housing'));
    } // end method

    public function updateHousing(Request $request, $id){

        if($request->file('image_url')) {

            // remove the old image file from folder using 'unlink()'               
            $old_image = Housing::find($id);
            if($old_image->image_url){
                $file_name = public_path('/'). $old_image->image_url;
                unlink($file_name);
            }

            $image = $request->file('image_url');
    
            $name_generated = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();     
    
            // resize image size by  (width)850x430(height) and save resized image at 'upload/cargos/' with name of $name_gen
            Image::make($image)->resize(430, 327)->save('upload/housing/'.$name_generated);
    
            // assign location of new image to $save_url
            $save_url = 'upload/housing/'.$name_generated;

            Housing::findOrFail($id)->update([
                'house_type' => $request->house_type,
                'house_options' => $request->house_options,
                'title' => $request->title,
                'description' => $request->description,         
                'rent_price' => $request->rent_price, 
                'location' => $request->location,                              
                'image_url' => $save_url,
                'updated_at' => Carbon::now()    
    
            ]);
    
            $notification = array (
            'message' => 'Housing Updated With Image Successfully!',
            'alert-type' => 'success'
            );
            
            // display notification
            return redirect()->route('all.housing')->with($notification);
        } else{

            Housing::findOrFail($id)->update([
                'house_type' => $request->house_type,
                'house_options' => $request->house_options,
                'title' => $request->title,
                'description' => $request->description,         
                'rent_price' => $request->rent_price, 
                'location' => $request->location,                              
                'image_url' => $save_url,
                'updated_at' => Carbon::now()    
    
            ]);
    
            $notification = array (
            'message' => 'Housing Updated Without Image Successfully!',
            'alert-type' => 'success'
            );
            
            // display notification
            return redirect()->route('all.housing')->with($notification);

        }

    }

    // Frontend
    public function frontendHousing()
    {         
        return view('frontend.Housing.front_Housing');
    }

}
