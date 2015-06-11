<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Input; 

use App\Game;
use App\GuessNumber;

use \Validator, \Redirect;
use \Illuminate\Http\RedirectResponse;
use \Illuminate\Support\Facades\Session;

class MultiplayerController extends Controller {
	   
        /*
         * Create new multiplayer game
         */        
        
        public function newMultiplayer(){
            $secret_number = Input::get('player'); 
            
            $validator = Validator::make(Input::all(), Game::$rules, Game::$errors_message);
            
            if ($validator->fails())
            {
                return redirect()->back()->withErrors($validator)->withInput();
            }
            else{
                $game = New Game;
                $game->saveGame($secret_number);
                return view('multiplayer_start')->with('game_id', $game->game_id);
            }
        }
        
        /**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function multiplayerIndex()
	{
            return view('multiplayer');
	}
        
        public function playerPost()
	{          
            
            $game_id = Input::get('game_id');
            $guess_number = Input::get('player'); 
            
            $validator = Validator::make(Input::all(), Game::$rules, Game::$errors_message);
            
            if ($validator->fails()){                
                return Redirect::to('multiplayer-mistake')->withErrors($validator)->withInput();
            } else{
                $guess = New GuessNumber;  
            
                $guess->checkGuess($game_id, $guess_number);

                $guess->saveGuess($game_id, $guess_number, $guess->bull, $guess->cow);                

                if($guess->bull == 4){
                    return view('win_game')->with('game', $guess->game);
                } else{
                    return view('multiplayer_game')->with('game', $guess->game)->with('game_id', $game_id);
                }
            }
            
            
            
	}

}
