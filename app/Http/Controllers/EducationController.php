<?php

namespace App\Http\Controllers;
use App\Models\Education;
use Illuminate\Http\Request;
use Image;
use Illuminate\Support\Carbon;

class EducationController extends Controller
{
    public function allEducation(){
        $all_education = Education::latest()->get();
        return view('admin.education.all_education', compact('all_education'));
    }

    public function addEducation(){
        return view('admin.education.add_education');
    }

    public function storeEducation(Request $request)
    {
        $image = $request->file('image_url');

        // generate unique name for image
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension(); 

        // resize image size by  (width)850x430(height) and save resized image at 'upload/education/' with name of $name_gen
        Image::make($image)->resize(289, 193)->save('upload/education/'.$name_gen);

        // assign location of new image to $save_url
        $save_url = 'upload/education/'.$name_gen;

        // find the id of image being updated and updated below columns
        Education::insert([
          
            'title' => $request->title,
            'education_type' => $request->education_type,
            'education_description' => $request->education_description,           
            'name' => $request->name,
            'region' => $request->region,
            'image_url' => $save_url,
            'created_at' => Carbon::now()          

        ]);
    
        $notification = array (
            'message' => 'Education Added Successfully!',
            'alert-type' => 'success'
        );
        
        // display notification
        return redirect()->route('all.education')->with($notification); 
    }

    public function editEducation($id){
        $edit_education = Education::findOrFail($id);
        return view('admin.education.edit_education', compact('edit_education'));
    }

    public function updateEducation (Request $request, $id){
        {
            if($request->file('image_url')){

                // remove the old image file from folder using 'unlink()'               
                $old_image = Education::find($id);
                if($old_image->image_url){
                    $file_name = public_path('/'). $old_image->image_url;
                    unlink($file_name);
                }

                $image = $request->file('image_url');
        
                // generate unique name for image
                $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension(); 
        
                // resize image size by  (width)850x430(height) and save resized image at 'upload/education/' with name of $name_gen
                Image::make($image)->resize(289, 193)->save('upload/education/'.$name_gen);
        
                // assign location of new image to $save_url
                $image_url = 'upload/education/'.$name_gen;
        
                // find the id of image being updated and updated below columns
                Education::findOrFail($id)->update([
                
                    'title' => $request->title,
                    'education_type' => $request->education_type,
                    'education_description' => $request->education_description,           
                    'image_url' => $image_url,
                    'updated_at' => Carbon::now()                          
        
                ]);
            
                $notification = array (
                    'message' => 'Education Updated Successfully!',
                    'alert-type' => 'success'
                );
                
                // display notification
                return redirect()->route('all.education')->with($notification);

            } else{

                // find the id of image being updated and updated below columns
                Education::findOrFail($id)->update([
            
                    'title' => $request->title,
                    'education_type' => $request->education_type,
                    'education_description' => $request->education_description,
                    'updated_at' => Carbon::now()        
                                             
            
                ]);
            
                $notification = array (
                    'message' => 'Education Updated Successfully!',
                    'alert-type' => 'success'
                );
                
                // display notification
                return redirect()->route('all.education')->with($notification);
            }
        }
    } // end method

    public function deleteEducation($id){
        $education_to_be_deleted = Education::findOrFail($id);

        $education_image_url = $education_to_be_deleted->image_url;

        unlink($education_image_url);

        Education::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Education deleted successfully.',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    } // end method

    // Frontend
    public function frontendEducation()
    {         
        return view('frontend.education.front_education');
    }

}
