<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Food;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator as FacadesValidator;

class WebpageController extends Controller
{
    public function homepage()
    {

        $foods=Food::limit(9)->get();
        return view('frontend.pages.homepage',compact('foods'));
    }
    public function about_us()
    {
        return view('frontend.pages.about');
    }
    
    //REG

    public function formreg()
    {

        return view('frontend.pages.customer_reg');
    }

    public function reg(Request $request)
    {

// dd($request->all());

        $checkValidation=FacadesValidator::make($request->all(),[
            'name'=>'required',
            'email'=>'required',
            'password'=>'required',
            'phone'=>'required|regex:/(01)[0-9]{9}/',
            'address'=>'required',
            'dob'=>'required|date',
           
            'status'=>'required',
           ]);
                
           if($checkValidation->fails()){


            notify()->error($checkValidation->getMessageBag());
            // notify()->error('somethings went wrong');
            return redirect()->back();
           }
           
           $fileNameCustomer='';
    
           if($request->hasFile('image'))  //name of image form
           {
               //generate name i.e: 20240416170933.jpeg
               $fileNameCustomer=date('YmdHis').'.'.$request->file('image')->getClientOriginalExtension();
              
                //2.3: store it into public folder
                $request->file('image')->storeAs('/customer',$fileNameCustomer);
                //public/uploads/category/20244394343.png
   
           }

    
        Customer::create([
          
            'name'=>$request->name,
            'email'=>strtolower($request->email),
            'password'=>bcrypt($request->password),
            'phone'=>$request->phone,
            'address'=>$request->address,
            'dob'=>$request->dob,
            'image'=>$fileNameCustomer,
            'status'=>$request->status,


        ]);

        notify()->success('registration Successfully.');


        return redirect()->route('homepage');
        
    }

    public function loginForm(){
        return view('frontend.pages.login');

    }
    
    public function loginsuccess(Request $request){


        //dd($request->all());


        $userInput=['email'=>$request->email,'password'=>$request->password];
        $checkLogin=auth()->guard('customerGuard')->attempt($userInput);

        if($checkLogin){
         //dd("login done");

        notify()->success('Login successfull');

        return redirect()->route('homepage');

        }
        notify()->error('invalid user');
        return redirect()->back();
    }

    public function logoutsuccess(){
            
        auth('customerGuard')->logout();
        return redirect()->back();
    }


     public function foodUnderCategory($category_id){
        $foodUnderCategory=Food::where('category_id',$category_id)->get();
        //dd($foodUnderCategory);
        return view('frontend.pages.foodUnderCategory',compact('foodUnderCategory'));

    

     
}



}
