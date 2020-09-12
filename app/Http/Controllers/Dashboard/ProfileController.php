<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileRequest;
use App\Models\Admin;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function editProfile(){
        $id = auth('admin')->user()->id;
        $admin = Admin::find($id);
        return view('dashboard.profile.edit', compact('admin'));
    }


    public function updateprofile(ProfileRequest $request){

        try {
            $id = auth('admin')->user()->id;
            $admin = Admin::find($id);

            if($request->filled('password')){
                 $request->merge(['password' => bcrypt($request->password)]);
            }
            unset($request['id']);
            unset($request['password_confirmation']);
            $admin->update($request->all());
            return redirect()->back()->with(['success' => 'تم التحديث بنجاح']);
        } catch (\Exception $ex) {
            return redirect()->back()->with(['error' => 'هناك خطا ما يرجي المحاولة فيما بعد']);
        }
    }
}
