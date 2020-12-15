<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OfferController extends Controller
{

   
    public function fillable()
    {
        return Offer::get();
    }

    public function create()
    {
       return view('offers.create');
    }
    public function insert(Request $request)
    {
       
        $rules = $this->GetRules();
        $messages = $this->GetMessages();

        $validator = Validator::make( $request->all() , $rules , $messages );

        if($validator -> fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        };

        // insert 
        Offer::create([
            'name' => $request->name,
            'price' => $request->price,
            'detials' => $request->detials,
        ]);
        return redirect()->back()->with(['success'=>'تم الاضافة بنجاح']);
    }
    public function GetRules()
    {
        return  $rules = [  

                // Rules
            'name' => 'required|max:100|unique:offers,name',
            'price' => 'required|numeric',
            'detials' => 'required'
        ];
    }
    public function GetMessages()
    {
        return  $messages = [ 

                // messages
            'name.required' => __('message.offerName'),
            'name.unique' => __('message.offerUnique'),
            'name.max' => __('message.offerMax'),
            'price.numeric' => __('message.offerNumeric'),
            'price.required' => __('message.offerPrice'),
            'detials.required' => __('message.OfferDetials')
        ];
    }
}
