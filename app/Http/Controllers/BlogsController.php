<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BlogCategroy;
use App\Models\Blogs;
use Illuminate\Support\Carbon;
use Image;

class BlogsController extends Controller
{
    // =============================================================== 
    public function allBlog()
    {
        $all_blogs = Blogs::latest()->get();
        return view('admin.blogs.all_blogs', compact('all_blogs'));
    }
   

    public function addBlog()
    {
        $blogs_category =  BlogCategroy::orderBy('blog_category', 'ASC')->get();
        return view('admin.blogs.add_blog', compact('blogs_category'));
    }

    public function storeBlog(Request $request)
    {
        // Error will be displayed with custom message 'Portfolio Name is Required'.
        // We can display default error message by removing 'portfolio_name.required' fields.
        $request->validate([
            'blog_category_id' => 'required|integer',
            'title' =>'required',
            'blog_description' =>'required',
            'image' => 'required',
            
        ]);        
    
        // assign image to $image
        $image = $request->file('image');

        // generate unique name for image
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension(); 

        // resize image size by  (width)850x430(height) and save resized image at 'upload/home_slide/' with name of $name_gen
        Image::make($image)->resize(430, 327)->save('upload/home_blogs/'.$name_gen);

        // assign location of new image to $save_url
        $save_url = 'upload/home_blogs/'.$name_gen;

        // find the id of image being updated and updated below columns
        Blogs::insert([
            'blog_category_id' => $request->blog_category_id,
            'title' => $request->title,
            'blog_tags' => $request->blog_tags,
            'blog_description' => $request->blog_description,
            'image' => $save_url,
            'created_at' => Carbon::now()          

        ]);
    
        $notification = array (
            'message' => 'Blog Added Successfully!',
            'alert-type' => 'success'
        );
        
        // display notification
        return redirect()->route('all.blog')->with($notification); 
    }
   

    public function editBlog($id){
        $edit_blogs = Blogs::findOrFail($id);
        $categories = BlogCategroy::orderBy('blog_category', 'ASC')->get();
        return view('admin.blogs.edit_blog', compact('edit_blogs', 'categories'));
    }

    public function updateBlog(Request $request, $id)
    {

        if($request->file('image'))
        {
            // remove the old image file from folder using 'unlink()'
            $old_image = Blogs::find($id);
            $file_name = public_path('/'). $old_image->image;
            unlink($file_name);

            // assign portfolio_image to $image variable 
            $image = $request->file('image');

            // unique name for the image to be updated, ex: 128464978431112 .  jpg
            $unique_name = hexdec(uniqid()). '.'. $image->getClientOriginalExtension();

            // resize and save image to 'upload/home_portfolio/' with $unique_name
            Image::make($image)->resize(430, 327)->save('upload/home_blogs/'. $unique_name);

            // assign image url to $image_path variable
            $image_url = 'upload/home_blogs/'. $unique_name;

            // update database with new portfolio data
            BLogs::findOrFail($id)->update([
                'blog_category_id' => $request->blog_category_id,
                'title' => $request->title,
                'blog_tags' => $request->blog_tags,
                'blog_description' => $request->blog_description,
                'image' => $image_url

            ]);

            // Toastr notification
                $notification = array (
                'message' => 'Blog Updated With Image Successfully!',
                'alert-type' => 'success'
            );
            
            // display notification on back page which is the same page is being updated
            return redirect()->route('all.blog')->with($notification);         
        } else {

            // update database with new portfolio data
            Blogs::findOrFail($id)->update([
                'blog_category_id' => $request->blog_category_id,
                'title' => $request->title,
                'blog_tags' => $request->blog_tags,
                'blog_description' => $request->blog_description      

            ]);

            // Toastr notification
                $notification = array (
                'message' => 'Blog Updated Without Image Successfully!',
                'alert-type' => 'success'
            );
            
            // display notification on back page which is the same page is being updated
            return redirect()->route('all.blog')->with($notification);
       }

    }

    public function deleteBlog($id)
    {
        $blog_to_be_deleted = Blogs::findOrFail($id);

        $blog_image_url = $blog_to_be_deleted->image;

        // to remove the image from folder
        unlink($blog_image_url);

        // to delete portfolio data from database
        Blogs::findOrFail($id)->delete();

        $notification = array (
            'message' => 'Blog Deleted Successfully!',
            'alert-type' => 'success'
        );
        
        // display notification on back page which is the same page is being updated
        return redirect()->back()->with($notification);
    }
    
    // Frontend
    public function frontendBlog()
    {
        $all_news = Blogs::latest()->limit(8)->get();
        return view('frontend.blog.front_news', compact('all_news'));
    }

    public function frontendBlogDetails($id)
    {
        $all_blogs = Blogs::latest()->limit(5)->get();
        $blog_details = Blogs::findOrFail($id);
        $categories = BlogCategroy::orderBy('blog_category', 'ASC')->get();

        return view('frontend.blog.detailed_news', compact('blog_details', 'all_blogs', 'categories'));
    }

}
