<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function link(Request $request)
        {

            $rules=[
                'name'  => 'required|string',
                'phone' => 'required|string',
            ];

            $this->validate( $request,  $rules);

            $user = User::where('name','like',$request->name)->first();

            if(!$user){
                $user = new User();
                $user->name = $request->name;
                $user->email = $request->name;
                $user->phone=$request->phone;
                $user->password = 'password';
                $user->save();
            }

            Auth::login($user);

            return redirect( route('a') );

        }

}
