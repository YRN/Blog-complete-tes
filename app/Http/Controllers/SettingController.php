<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Http\Request;
use App\Setting;

class SettingController extends Controller
{
    //

    public function __construct(){
        $this->middleware('admin');
    }

    public function index(){
        return view('admin.settings.settings')->with('settings',Setting::first());
    }

    public function update(){
        $settings = Setting::first();

        $this->validate(request(),[
            'site_name' => 'required',
            'contact_number' => 'required',
            'contact_email' => 'required',
            'address' => 'required'

         ]);

         $settings->site_name = request()->site_name;
         $settings->address = request()->address;
         $settings->contact_number = request()->contact_number;
         $settings->contact_email = request()->contact_email; 


         $settings->save();


         Session::flash('success','You are successfully update site settings');

         return redirect()->back();

    }
}