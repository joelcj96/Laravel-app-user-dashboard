<?php

namespace App\Http\Controllers;

use App\Models\Multi;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class MultiController extends Controller
{
    public function multiPic(){
        $data = Multi::latest()->paginate();
        return view('multiPic.index',compact('data'));
    }



    public function storeImage(Request $request){

        // Get the uploaded images
        $images = $request->file('multi_image');
    
        foreach($images as $multi_img){
    
            // Generate a unique ID for each image
            $brand_name = hexdec(uniqid());
    
            // Get the file extension
            $image_ext = strtolower($multi_img->getClientOriginalExtension());
    
            // Create a unique image name
            $img_name = $brand_name . '.' . $image_ext;
    
            // Specify the image storage location
            $img_location = 'image/brand/';
    
        
            $multi_img->move($img_location, $img_name);
    
            // INSERT INTO THE DATABASE
            Multi::create([
                'image_path' => $img_location . $img_name, // Store the path to the image in the database
            
            ]);
        }
    
    
        return redirect()->back()->with('success', 'Images uploaded successfully');
    }
    


}
