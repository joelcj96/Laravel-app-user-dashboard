<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Auth;
use illuminate\Support\Carbon;

class categoryController extends Controller
{
    public function allcat(){
        $categories = category::latest()->paginate(5);
        return view('category.category',['categories' => $categories]);
    }

    //STORE FUNCTION
     //STORE FUNCTION
public function addcat(Request $request){
    $request->validate([
        'category_name' => 'required|max:189|unique:categories',
    ]);

    category::create([
        'category_name' => $request->input('category_name'),
        'user_id' => auth()->user()->id,
        'created_at' => now(),
    ]);


    return redirect()->back()->with('success', 'Category added successfully');

}


// EDIT FUNCTION

public function edit($id){
    $categoryData = category::find($id);
    return view('users.edit',['category' => $categoryData]);
    
}


//UPDATE FUNCTION
public function update(Request $request, $id){
    $newData = Category::find($id)->update([
        'category_name'=>$request->category_name,
        'user_id' => auth()->user()->id
    ]);

    
    return redirect()->route('category.index')->with('updated', 'Category updated successfully');
}

//DELETE FUNCTION
public function delete(Category $id){
    $id->delete();

    
    return redirect()->back()->with('delete', 'Category deleted successfully');
}

}
