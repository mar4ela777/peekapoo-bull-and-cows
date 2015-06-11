<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model {
        
        protected $table = 'games';
        public $game_id = 0;
        
        public static $rules = array(
            'player' => array(
                'required',
                'numeric',
                'regex:/^([1-9])(?!\1)([0-9])(?!\1|\2)([0-9])(?!\1|\2|\3)([0-9])$/',),            
	);

	protected $fillable = [];
        
        public static $errors_message = array(
            'player.required' => 'Полето е задължително!',            
            'player.numeric' => 'Моля въведете число!',            
            'player.regex' => 'Моля въведети 4-ри цифрено число от 1 до 9 без повторения!',            
        );
        
        
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
