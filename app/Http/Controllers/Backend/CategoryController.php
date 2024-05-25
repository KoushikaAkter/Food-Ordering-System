<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function list() {
        $categories = Category::paginate(5); //select * from categories;
        // dd($box);
        return view('backend.pages.category.list', compact('categories'));
    }

    public function categoryForm()
    {
        return view('backend.pages.category.create');
    }
     
 //Edit
     
     public function categoryEdit($id) {
         $categories = Category::find($id);
         // dd($foods);
         return view('backend.pages.category.edit',compact('categories'));
        }

 //update
       public function categoryUpdate(Request $request,$id){
          // dd($request->all());
         $request->validate([
            'name' => $request->cat_name,
            'description' => $request->description,
            
         ]);
         notify()->success('Category updated successfully');
         return to_route('category.list');
        }
 
 //foodpost

    public function categoryStore(Request $request) {
        $checkValidation = Validator::make($request->all(), [
            'cat_name' => 'required',
        ]);

        if ($checkValidation->fails()) {
            // notify()->error("something went wrong.");
            notify()->error($checkValidation->getMessageBag());
            return redirect()->back();
        }

        $cat_image = '';
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            // dd($image);
            $cat_image = 'IMG' . '-' . date('Ymdhsi') . '.' . $image->getClientOriginalExtension();
            $image->storeAs('/category',$cat_image );
        }
        Category::create([
            //bam pase column name => dan pase value
            'name' => $request->cat_name,
            'description' => $request->description,
            'image'=>$cat_image,
        ]);

        notify()->success('Category created successfully.');
        return redirect()->route('category.list');
    }

 //delete

    public function categoryDelete($c_id)
    {
    // Food::find($f_id)->delete();
      $categories=Category::find($c_id);
      $categories->delete();
    
      notify()->success('Category deleted successfully.');
      return redirect()->back();
    }

 //VIEW
    public function categoryView($id)
    {
        $categories = Category::find($id);
        // dd($foods);
        return view('backend.pages.category.view',compact('categories'));
    }

}
