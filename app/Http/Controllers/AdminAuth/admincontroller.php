<?php

namespace App\Http\Controllers\AdminAuth;


use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Hesto\MultiAuth\Traits\LogsoutGuard;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Site_details;
use App\Add_url;
use Image;
use Hash;


class admincontroller extends Controller
{
  
 
public function Site_details()
    {
      $user=Site_details::where('id',Auth::user()->id)->get();

    
         return  view('admin.details',compact('user')); 
    }
     
    public function Update_details(Request $request)
   {
  // 	dd($request);
   	           
 
      $user =Site_details::find($request->id);
      $user->title=$request->title;

      $user->link=$request->link;
      $user->discription=$request->discription;
     // dd();

     if ($request->hasFile('logo'))
          {
             $avatar = $request->file('logo'); // in here 
             $filename = time().'.'. $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(150, 150)->save(public_path('/uploads/avatar/' . $filename));
        
              
              $user->logo=$filename;
              $message="suuccess";
              $user->save();

            }
 
    
      return redirect()->route('admin.site_details');
    }

public function Ad()
{
	$user=Site_details::all();
	return view('admin.ad',compact('user'));
}
/*public function Add_url()
{
	$user=Add_url::where('id',Auth::user()->id)->get();
	return view('admin.add_url',compact('user'));
}*/
     /*public function Save_url(Request $request)
    {    
      
            $user =Add_url::find($request->id);
            $user->title=$request->title;
            $user->url=$request->url;
            //dd($user);
            $user->save();
             return back()->with(['message'=>"successfully updated"]); 
    }*/
    
public function Add_url(Request $request)
    {
    	$c=$request->link;
        $feed = implode(file($c));
        $xml = simplexml_load_string($feed);
        $json = json_encode($xml);
        $array = json_decode($json,TRUE);
        $a=$array['channel']['item'];
       for($i=0;$i<count($a);++$i)
       {
       	    $t=$a[$i];
       
        
        $u = new Add_url();
        $u->title=$t['title'];
        $u->url=$t['link'];
        $u->save();
    }
        $r=Add_url::all();
        return view('admin.add_url',compact('r'));
    }
     


  }