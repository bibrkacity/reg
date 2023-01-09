<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Token;
use App\Models\User;


class GameController extends Controller
{

    public function index(int $zero, string $token )
        {

            $user = $this->check_token($token);

            if( !$token )
                return 'Link is invalid';

            $data = [];
            $data['user'] = $user;
            $data['token']= $token;

            return view('game',['data'=>$data]);

        }



        public function lucky(string $token)
        {

            $user = $this->check_token($token);

            if( !$token ){
                return 'Link is invalid';
            }

            $game = new Game();

            $game->user_id = $user->id;
            $game->random = rand(1,1000);
            $game->result = ( $game->random%2 == 0 && $game->random !=1  ) ? 1 : 0;

            $amount = 0.0;

            if($game->result === 1){
                if( $game->random > 900 )
                    $amount=round($game->random*0.7, 2);
                elseif( $game->random > 600 )
                    $amount=round($game->random*0.5, 2);
                elseif( $game->random > 300 )
                    $amount=round($game->random*0.3, 2);
                elseif( $game->random < 300 )
                    $amount=round($game->random*0.1, 2);

            }
            $game->amount = $amount;

            $game->save();

            return view('sub.lucky',['game'=>$game]);

        }

    public function history(string $token)
    {

        $user = $this->check_token($token);

        if( !$token ){
            return 'Link is invalid';
        }

        $games = [];

        $result = Game::where('user_id',$user->id)
            ->orderBy('id','desc')
            ->offset(0)
            ->limit(3)
            ->get();

        foreach($result as $one){
            $game = new \stdClass();
            $game->random = (int)$one->random;
            $game->result = $one->result ? 'Win' : 'Lose';
            $game->amount = $one->amount;

            $games[] = $game;
        }


        return view('sub.history',['games'=>$games]);

    }

        private function check_token(string $token) : User|bool
        {
            $result = Token::where('token','like binary',$token)
                ->where('expires_at','>=',\DB::raw('Now()'))
                ->first();

            if( !$result )
                return false;

            return $result->User;

        }


}

