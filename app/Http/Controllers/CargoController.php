<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cargo;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Image;

class CargoController extends Controller
{
    public function allCargo(){
        
        $all_cargo = Cargo::latest()->get();
        return view('admin.cargo.all_cargo', compact('all_cargo'));
    }

    public function addCargo(){
        return view('admin.cargo.add_cargo');
    }

    public function storeCargo(Request $request)
    {
        $id = Auth::user()->id;      
        // assign image_url to $image 
        $image = $request->file('image_url');

        // generate unique name for image
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension(); 

        // resize image size by  (width)850x430(height) and save resized image at 'upload/cargos/' with name of $name_gen
        Image::make($image)->resize(430, 327)->save('upload/cargos/'.$name_gen);

        // assign location of new image to $save_url
        $save_url = 'upload/cargos/'.$name_gen;

        // find the id of image being updated and updated below columns
        Cargo::insert([
            'post_user_id' => $id,
            'cargo_type' => $request->cargo_type,
            'date_to_be_send' => $request->date_to_be_send,
            'cargo_description' => $request->cargo_description,
            'delivery_fee' => $request->delivery_fee,
            'from_location' => $request->from_location,
            'to_location' => $request->to_location,
            'image_url' => $save_url,
            'created_at' => Carbon::now()          

        ]);
    
        $notification = array (
            'message' => 'Cargo Added Successfully!',
            'alert-type' => 'success'
        );
        
        // display notification
        return redirect()->route('all.cargo')->with($notification); 
    }


    public function editCargo($id){
        $edit_cargo = Cargo::findOrFail($id);
   
        return view('admin.cargo.edit_cargo', compact('edit_cargo'));
    }

    public function updateCargo(Request $request, $id){

        if($request->file('image_url'))
        {
            // remove the old image file from folder using 'unlink()'
            $old_image = Cargo::find($id);
            $file_name = public_path('/'). $old_image->image_url;
            unlink($file_name);

            // assign image_url to $image variable 
            $image = $request->file('image_url');

            // unique name for the image to be updated, ex: 128464978431112 .  jpg
            $unique_name = hexdec(uniqid()). '.'. $image->getClientOriginalExtension();

            // resize and save image to 'upload/cargos/' with $unique_name
            Image::make($image)->resize(430, 327)->save('upload/cargos/'. $unique_name);

            $image_url = 'upload/cargos/'. $unique_name;

            // update database with new cargo data
            Cargo::findOrFail($id)->update([
                'cargo_type' => $request->cargo_type,
                'date_to_be_send' => $request->date_to_be_send,
                'cargo_description' => $request->cargo_description,
                'delivery_fee' => $request->delivery_fee,
                'from_location' => $request->from_location,
                'to_location' => $request->to_location,
                'image_url' => $image_url,
                'updated_at' => Carbon::now()    

            ]);

            // Toastr notification
                $notification = array (
                'message' => 'Cargo Updated With Image Successfully!',
                'alert-type' => 'success'
            );
            
            // display notification on back page which is the same page is being updated
            return redirect()->route('all.cargo')->with($notification);

        } else {

            // update database with new portfolio data
            Cargo::findOrFail($id)->update([
                'cargo_type' => $request->cargo_type,
                'date_to_be_send' => $request->date_to_be_send,
                'cargo_description' => $request->cargo_description,
                'delivery_fee' => $request->delivery_fee,
                'from_location' => $request->from_location,
                'to_location' => $request->to_location,               
                'updated_at' => Carbon::now()

            ]);

            // Toastr notification
                $notification = array (
                'message' => 'Cargo Updated Without Image Successfully!',
                'alert-type' => 'success'
            );
            
            // display notification on back page which is the same page is being updated
            return redirect()->route('all.cargo')->with($notification);
       }
    }

    public function deleteCargo($id)
    {
        $cargo_to_be_deleted = Cargo::findOrFail($id);

        $cargo_image_url = $cargo_to_be_deleted->image_url;

        // to remove the image from folder
        unlink($cargo_image_url);

        // to delete portfolio data from database
        Cargo::findOrFail($id)->delete();

        $notification = array (
            'message' => 'cargo Deleted Successfully!',
            'alert-type' => 'success'
        );
        
        // display notification on back page which is the same page is being updated
        return redirect()->back()->with($notification);
    }
    
     // Frontend
     public function frontendCargo()
     {       
        return view('frontend.Cargo.front_cargo');
     }
}
