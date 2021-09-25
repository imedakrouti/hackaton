<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Validator;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\UpdateProfileRequest;
use App\Models\User;
use App\Rules\MatchOldPassword;
use Hash;
use Intervention\Image\Facades\Image;


class ProfileController extends Controller
{
    public function index( user $profile){
        $profile=auth()->user();
        return view('dashboard.profile.profile')->with('profile',$profile);
    }

    public function update(UpdateProfileRequest $request,User $user){
        
        $data_user=$request->except(['image','_token']);
        // dd($data_user);
        if($request->image){
            if($user->image != 'default.jpg'){
                // Storage::disk('public_upload')->delete('/user-images/' . $request->image);
                 Storage::disk('public_upload')->delete('/user-images/'.$user->image);
             }
            // $request->image->store('user-images','public_upload');
              Image::make($request->image)->resize(300, null, function ($constraint) {
                 $constraint->aspectRatio();
          })->save(public_path('uploads/user-images/'.$request->image->hashName()));
          $data_user['image']=$request->image->hashName();
         }
          //dd($data_user);
        $user->update($data_user);
        return redirect()->route('dashboard.profile')->with('add','Profile changé aves succé');

    }
    public function changePassword(Request $request){

      //  dd($request->all());
            /* $request->validate([
            'current_password'=>['required',new MatchOldPassword],
            'new_password'=>'required|min:6',
            'new_confirm_password'=>'required|same:new_password'
        ]); */
        $validator=validator()->make($request->all(),[
            'current_password'=>['required',new MatchOldPassword],
            'new_password'=>'required|min:6',
            'new_confirm_password'=>'required|same:new_password'
        ]);
        if($validator->fails()){
            return back()->withErrors($validator)-> withInput(['tab'=>'settings']);
        }
       $user= user::find(auth()->user()->id)->update(['password'=>Hash::make($request->new_password)]);
       //dd($user);
       //session()->flash('add', 'Insertion avec succés');
       return redirect()->route('dashboard.profile')->with('add','Mot de passe changée aves succé');
    }
}
