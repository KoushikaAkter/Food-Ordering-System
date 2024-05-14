<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Food;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FoodController extends Controller
{
    
    public function foodlist()
    {
        $foods = Food::paginate(5);
        return view('backend.pages.food.list', compact('foods'));
    }


    public function  foodform()
    {
       return view('backend.pages.food.form');

    }

    //Edit
     
    public function foodedit($id)
    {
        $foods = Food::find($id);
        // dd($foods);
        return view('backend.pages.food.edit',compact('foods'));
    }

    //update
    
    public function foodupdate(Request $request,$id){

        // dd($request->all());
        $request->validate([
        'name'=>$request->name,
        'categoryid'=>$request->cat_id,
        'price'=>$request->price,
        'description'=>$request->description,
        'quantity'=>$request->quantity,
        'status'=>$request->status,
        ]);
        notify()->success('Food updated successfully');
        return to_route('food.list');
    }

        
   
    //foodpost

    public function  foodstore(Request $request)
    {
        
    // dd($request->all());
            $checkValidation = Validator::make($request->all(), [
                'name' => 'required',
            ]);
    
            if ($checkValidation->fails()) {
                // notify()->error("something went wrong.");
                notify()->error($checkValidation->getMessageBag());
                return redirect()->back();
            }
    
            $food_image = '';
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                // dd($image);
                $food_image = 'IMG' . '-' . date('Ymdhsi') . '.' . $image->getClientOriginalExtension();
                $image->storeAs('/food',$food_image );
            }

        
       Food::create([

         //bam pase column name => dan pase value
        'name'=>$request->name,
        'category_id'=>$request->cat_id,
        'price'=>$request->price,
        'description'=>$request->description,
        'quantity'=>$request->quantity,
        'status'=>$request->status,
        'image'=>$food_image,
        

       ]);

       notify()->success('food Created Successfully.');


       return redirect()->back();

      
    }

 
    //DELETE

public function foodDelete($f_id)
{

// Food::find($f_id)->delete();

  $foods=Food::find($f_id);
  $foods->delete();

  notify()->success('Food deleted successfully.');
  return redirect()->back();
}
    //VIEW

    public function foodView($id)
    {
        $foods = Food::find($id);
        
        return view('backend.pages.food.view',compact('foods'));
    }
}

