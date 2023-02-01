<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BlogCategroy;
use Illuminate\Support\Carbon;

class BlogCategroyController extends Controller
{
    public function AllBlogCategory()
    {   
        $blog_category = BlogCategroy::latest()->get();
        return view('admin.blog_category.all_blog_category', compact('blog_category'));
    } // end method

    public function AddBlogCategory()
    {
        return view('admin.blog_category.add_blog_category');
    } // end method


    public function editBlogCategory($id)
    {
        $edit_blog_categories = BlogCategroy::findOrFail($id);
        return view('admin.blog_category.edit_blog_category', compact('edit_blog_categories'));
    } // end method

    public function updateBlogCategory(Request $request, $id)
    {
        // update database with new data
        BlogCategroy::findOrFail($id)->update([
            'blog_category' => $request->blog_category           

        ]);

        // Toastr notification
            $notification = array (
            'message' => 'Blog Category Updated Successfully!',
            'alert-type' => 'success'
        );
        
        // display notification on back page which is the same page is being updated
        return redirect()->route('all.blog.category')->with($notification);   
    } // end method

    public function storeBlogCategory(Request $request)    
    {   

        // find the id of image being updated and updated below columns
        BlogCategroy::insert([
            'blog_category' => $request->blog_category,            
            'created_at' => Carbon::now()          

        ]);
       
        $notification = array (
            'message' => 'Blog Category Added Successfully!',
            'alert-type' => 'success'
        );
        
        // display notification
        return redirect()->route('all.blog.category')->with($notification);  
    } // end method

    public function deleteBlogCategory($id)
    {     

        // to delete portfolio data from database
        BlogCategroy::findOrFail($id)->delete();

        $notification = array (
            'message' => 'Blog Category Deleted Successfully!',
            'alert-type' => 'success'
        );
        
        // display notification on back page which is the same page is being updated
        return redirect()->back()->with($notification);

    }
}
 