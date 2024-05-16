<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;

class CustomerController extends Controller
{
    public function customerlist(){
        $data=Customer::paginate(5);
        return View('backend.pages.customer.list',compact('data'));
    }

    public function customerform(){
        return view('backend.pages.customer.form');
    }

    public function customerstore(Request $request){
      $checkValidation=Validator::make($request->all(),[
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
                   
                
        
                Customer::Create([
        
                  
                    'name'=>$request->name,
                    'email'=>strtolower($request->email),
                    'password'=>bcrypt($request->password),
                    'phone'=>$request->phone,
                    'address'=>$request->address,
                    'dob'=>$request->dob,
                    'image'=>$request->image,
                    'status'=>$request->status,
        
        
                ]);
        
                notify()->success('customer Created Successfully.');
        
                return redirect()->route('customer.form');
                
            }

    /////EDIT
        
        public function customerEdit($id)
     {
         $customer = Customer::find($id);
         
         return view('backend.pages.customer.edit',compact('customer'));
     }
 
     //update
     
     public function categoryUpdate(Request $request,$id){
        $request->validate([
          
                    'name'=>$request->name,
                    'email'=>strtolower($request->email),
                    'password'=>bcrypt($request->password),
                    'phone'=>$request->phone,
                    'address'=>$request->address,
                    'dob'=>$request->dob,
                    'image'=>$request->image,
                    'status'=>$request->status,
            
         ]);
         notify()->success('Customer updated successfully');
         return to_route('customer.list');}
        
        ///DELETE
            public function customerDelete($id){
        
                  $customer=Customer::find($id);
                  $customer->delete();
                
                  notify()->success('Customer deleted successfully.');
                  return redirect()->back();
                }
                
      /////VIEW
             public function customerView($id)
      {
          $customer = Customer::find($id);
          return view('backend.pages.customer.view',compact('customer'));
      }
              

    }

