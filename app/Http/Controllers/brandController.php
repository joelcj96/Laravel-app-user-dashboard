<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Brand;

class brandController extends Controller
{
    public function brand(){

        $brand = Brand::latest()->paginate(5);
        return view('brand.index',['brands' => $brand]);
    }

    // Post function
    public function addBrand(Request $request){
        $createBrand = $request->validate([
            'brand_name'=> 'required|unique:brands|max:30',
            'brand_image' => 'required|mimes:jpeg,jpg,png,JPG,webp'
        ]);

        $brand_image = $request->file('brand_image');
        //For my auto gen ID
        $brand_name = hexdec(uniqid());
        $image_ext = strtolower($brand_image->getClientOriginalExtension());

        $img_name = $brand_name.'.'.$image_ext;

        $img_location = 'image/brand/';
        $last_image = $img_location.$img_name;

        $brand_image->move($img_location,$img_name);

        // INSERTING THE IMAGE
        Brand::insert([
            'brand_name' => $request->brand_name,
            'brand_image' => $last_image,
            'created_at'=> Carbon::now()
        ]);

        return redirect()->back()->with('image', 'Brand inserted successfully');
    }


    // EDIT FUNCTION
    public function editBrand($id){
        $brands = Brand::find($id);
        return view('brand.edit',['update'=> $brands]);
    }
    

    public function update(Request $request, $id){
        $updateBrand = $request->validate([
            'brand_name'=> 'required|max:10',
        
        ]);

        $old_image = $request->old_image;

    

        $brand_image = $request->file('brand_image');
        //For my auto gen ID
        $brand_name = hexdec(uniqid());
        $image_ext = strtolower($brand_image->getClientOriginalExtension());

        $img_name = $brand_name.'.'.$image_ext;

        $img_location = 'image/brand/';
        $last_image = $img_location.$img_name;

        $brand_image->move($img_location,$img_name);


        unlink($old_image);
        // INSERTING THE IMAGE
        Brand::find($id)->update([
            'brand_name' => $request->brand_name,
            'brand_image' => $last_image,
            'created_at'=> Carbon::now()
        ]);

        return redirect()->route('brand.index')->with('update', 'Brand updated successfully');
    }
}

