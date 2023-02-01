<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entertainment;
use Illuminate\Support\Carbon;
use Image;

class EntertainmentController extends Controller
{
   public function allEntertainment()
   {
        $all_entertainment = Entertainment::latest()->get();

        return view('admin.entertainment.all_entertainment', compact('all_entertainment'));
   } // end method

   public function addEntertainment()
   {
      return view('admin.entertainment.add_entertainment');
   } // end method


   public function storeEntertainment(Request $request){
      $image = $request->file('image_url');

      $name_generated = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
   

      // resize image size by  (width)850x430(height) and save resized image at 'upload/cargos/' with name of $name_gen
      Image::make($image)->resize(430, 327)->save('upload/entertainment/'.$name_generated);

      // assign location of new image to $save_url
      $save_url = 'upload/entertainment/'.$name_generated;

      // find the id of image being updated and updated below columns
      Entertainment::insert([
         'entertainment_title' => $request->entertainment_title,
         'entertainment_description' => $request->entertainment_description,
         'address_link' => $request->address_link,
         'entertainment_category' => $request->entertainment_category,         
         'image_url' => $save_url,
         'created_at' => Carbon::now()          

      ]);

      $notification = array (
         'message' => 'Entertainment Added Successfully!',
         'alert-type' => 'success'
      );
      
      // display notification
      return redirect()->route('all.entertainment')->with($notification);
   }

   public function editEntertainment($id)
   {
      $edit_entertainment =  Entertainment::findOrFail($id);
      return view('admin.entertainment.edit_entertainment', compact('edit_entertainment'));
   } // end method

   public function updateEntertainment(Request $request, $id){

      if($request->file('image_url')){

         // remove the old image file from folder using 'unlink()'               
         $old_image = Entertainment::find($id);
         if($old_image->image_url){
            $file_name = public_path('/'). $old_image->image_url;
            unlink($file_name);
         }

         $image = $request->file('image_url');

         $name_generated = hexdec(uniqid()). '.'.$image->getClientOriginalExtension();
   

         // resize image size by  (width)850x430(height) and save resized image at 'upload/cargos/' with name of $name_gen
         Image::make($image)->resize(430, 327)->save('upload/entertainment/'.$name_generated);

         // assign location of new image to $save_url
         $save_url = 'upload/entertainment/'.$name_generated;

         // find the id of image being updated and updated below columns
         Entertainment::findOrFail($id)->update([
            'entertainment_title' => $request->entertainment_title,
            'entertainment_description' => $request->entertainment_description,
            'address_link' => $request->address_link,
            'entertainment_category' => $request->entertainment_category,         
            'image_url' => $save_url,
            'updated_at' => Carbon::now()          

         ]);

         $notification = array (
            'message' => 'Entertainment updated with image successfully!',
            'alert-type' => 'success'
         );
         
         // display notification
         return redirect()->route('all.entertainment')->with($notification);

      } else{
         // find the id of image being updated and updated below columns
         Entertainment::findOrFail($id)->update([
            'entertainment_title' => $request->entertainment_title,
            'entertainment_description' => $request->entertainment_description,
            'address_link' => $request->address_link,
            'entertainment_category' => $request->entertainment_category,         
            'image_url' => $save_url,
            'updated_at' => Carbon::now()          

         ]);

         $notification = array (
            'message' => 'Entertainment updated successfully!',
            'alert-type' => 'success'
         );
         
         // display notification
         return redirect()->route('all.entertainment')->with($notification);
      }
   }

   public function deleteEntertainment($id){
      $Entertainment_to_be_deleted = Entertainment::findOrFail($id);

      $Entertainment_image_url = $Entertainment_to_be_deleted->image_url;

      unlink($Entertainment_image_url);

      Entertainment::findOrFail($id)->delete();

      $notification = array(
          'message' => 'Entertainment deleted successfully.',
          'alert-type' => 'success'
      );

      return redirect()->back()->with($notification);
  } // end method

   // Frontend
   public function frontendEntertainment()
   {         
      return view('frontend.Entertainment.front_Entertainment');
   }

}
