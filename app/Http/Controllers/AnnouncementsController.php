<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Announcements;
use Image;

class AnnouncementsController extends Controller
{
    public function allAnnouncement(){
        $announcements = Announcements::latest()->get();
        return view('admin.announcement.all_announcement', compact('announcements'));
    }

    public function addAnnouncement(){
        return view('admin.announcement.add_announcement');
    }

    public function editAnnouncement($id){
        $edit_announcement = Announcements::findOrFail($id);
        return view('admin.announcement.edit_announcement', compact('edit_announcement'));
    }

    public function storeAnnouncement(Request $request){

        if($request->file('image_url'))
        {
            // assign portfolio_image to $image variable 
            $image = $request->file('image_url');

            // unique name for the image to be updated, ex: 128464978431112 .  jpg
            $unique_name = hexdec(uniqid()). '.'. $image->getClientOriginalExtension();

            // resize and save image to 'upload/home_portfolio/' with $unique_name
            Image::make($image)->resize(600, 600)->save('upload/announcement/'. $unique_name);

            // assign image url to $image_path variable
            $image_url = 'upload/announcement/'. $unique_name;

            // update database with new portfolio data
            Announcements::insert([
                'announcement_category' => $request->announcement_category,
                'announcement_title' => $request->announcement_title,
                'address_link' => $request->address_link,
                'announcement_description' => $request->announcement_description,
                'image_url' => $image_url
            ]);

            // Toastr notification
                $notification = array (
                'message' => 'Announcement Added With Image Successfully!',
                'alert-type' => 'success'
            );
            
            // display notification on back page which is the same page is being updated
            return redirect()->route('all.announcement')->with($notification);     

        } else {

            // update database with new portfolio data
            Announcements::insert([
                'announcement_category' => $request->announcement_category,
                'announcement_title' => $request->announcement_title,
                'address_link' => $request->address_link,
                'announcement_description' => $request->announcement_description      

            ]);

            // Toastr notification
                $notification = array (
                'message' => 'Announcement Added Without Image Successfully!',
                'alert-type' => 'success'
            );
            
            // display notification on back page which is the same page is being updated
            return redirect()->route('all.announcement')->with($notification);
       }

    }

    public function updateAnnouncement(Request $request, $id){
        if($request->file('image_url'))
        {
            // remove the old image file from folder using 'unlink()'
            $old_image = Announcements::find($id);
            if($old_image->image_url){
                $file_name = public_path('/').$old_image->image_url;
                unlink($file_name);
            }
            

            // assign portfolio_image to $image variable 
            $image = $request->file('image_url');

            // unique name for the image to be updated, ex: 128464978431112 .  jpg
            $unique_name = hexdec(uniqid()). '.'. $image->getClientOriginalExtension();

            // resize and save image to 'upload/home_portfolio/' with $unique_name
            Image::make($image)->resize(600, 600)->save('upload/announcement/'. $unique_name);

            // assign image url to $image_path variable
            $image_url = 'upload/announcement/'. $unique_name;

            // update database with new portfolio data
            Announcements::findOrFail($id)->update([
              'announcement_category' => $request->announcement_category,
                'announcement_title' => $request->announcement_title,
                'address_link' => $request->address_link,
                'announcement_description' => $request->announcement_description,
                'image_url' => $image_url

            ]);

            // Toastr notification
                $notification = array (
                'message' => 'Announcement Updated With Image Successfully!',
                'alert-type' => 'success'
            );
            
            // display notification on back page which is the same page is being updated
            return redirect()->route('all.announcement')->with($notification);         
        } else {

            // update database with new portfolio data
            Announcements::findOrFail($id)->update([
                'announcement_category' => $request->announcement_category,
                'announcement_title' => $request->announcement_title,
                'address_link' => $request->address_link,
                'announcement_description' => $request->announcement_description      

            ]);

            // Toastr notification
                $notification = array (
                'message' => 'Announcement Updated Without Image Successfully!',
                'alert-type' => 'success'
            );
            
            // display notification on back page which is the same page is being updated
            return redirect()->route('all.announcement')->with($notification);
       }

    }

    public function deleteAnnouncement($id)
    {
        $Announcement_to_be_deleted = Announcements::findOrFail($id);

        $Announcement_image_url = $Announcement_to_be_deleted->image_url;

        // to remove the image from folder
        unlink($Announcement_image_url);

        // to delete data from database
        Announcements::findOrFail($id)->delete();

        $notification = array (
            'message' => 'Announcement Deleted Successfully!',
            'alert-type' => 'success'
        );
        
        // display notification on back page which is the same page is being updated
        return redirect()->back()->with($notification);
    }

    // Frontend
    public function frontendAnnouncement()
    {
        $all_announcement = Announcements::paginate(3);
        return view('frontend.announcement.front_announcement', compact('all_announcement'));
    }
    

}
