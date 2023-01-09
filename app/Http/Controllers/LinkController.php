<?php

namespace App\Http\Controllers;

use App\Models\Token;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class LinkController extends Controller
{

    public function a(Request $request)
        {

            $user = Auth::user();

            $data = [];
            $data['user']=$user;

            $tokens = [];
            foreach( $user->Tokens as $one){
                $tokens[] = ['token'=>$one->token,'id'=>$one->id];

            }

            if( count($tokens) == 0){
                $model = $this->new_token($user);
                $tokens[]=['token'=>$model->token,'id'=>$model->id];
            }

            $data['tokens'] = $tokens;


            return view('a',['data'=>$data]);

        }

        public function store()
            {
                $user = Auth::user();
                $this->new_token( $user);

                return redirect( route('a') );
            }

    public function deactivate(int $id)
    {
        $user = Auth::user();

        $token = Token::find($id);

        if($token){
            if($token->User->id == $user->id){
                $token->delete();
            }
        }

        return redirect( route('a') );
    }



        private function new_token(User $user)
        {
            $token = md5($user->id.'-'.Str::random(10).time());

            $model = new Token();

            $model->tokenable_type = 'a';
            $model->tokenable_id = $user->id;
            $model->name = 'a';
            $model->token = $token;
            $model->expires_at = date('Y-m-d', time() + 7*86400);

            $model->save();


            return $model;
        }

}
