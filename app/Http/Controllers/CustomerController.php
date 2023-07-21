<?php

namespace App\Http\Controllers;
use Inertia\Inertia;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CustomerController extends Controller
{
    public function index(){
        return inertia::render('index',[
            'customers'=>Customer::all()->map(function($customer){
                return[
                    'id'=>$customer->id,
                    'name'=>$customer->name,
                ];
            })
        ]);
    }
    public function create (){
        return inertia::render('create');
    }
    public function store(Request $request){
        $validated=$request->validate([
            'name' =>'required|max:255',
            'email' =>'required|email|unique:customers',
            'phone' =>'required|unique:customers|max:14|min:11',
        ]);
        Customer::create($validated);
        return Redirect::route('customers.index')->with('message','Customer created Succesfully');
    }
    public function edit(Customer $customer){
        return inertia::render('edit',[
            'customer'=>$customer
        ]);

     }
    public function update(Customer $customer ,Request $request){
        $validated =$request->validate([
            'name' =>'required|max:255',
            'email' =>'required|email',
            'phone' =>'required|max:14|min:11',
        ]);
        $customer->update($validated);
        return Redirect::route('customers.index')->with('Message','Record Updated Succesfully' );
    }
    public function destroy(Customer $customer ){
        $customer->delete();
        return Redirect::route('customers.index')->with('Message','Record Deleted Succesfully');
        
    }

}
