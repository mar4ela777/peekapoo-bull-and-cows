<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model {
        
        protected $table = 'games';
        public $game_id = 0;
        
        public function guessNumber()
        {
            return $this->hasMany('App\GuessNumber');
        }
        
        public function saveGame($secret_number) {
            $game = new Game;
            $game->secret_number = $secret_number;
            $game->save();
            $this->game_id = $game->id;
        }
}
