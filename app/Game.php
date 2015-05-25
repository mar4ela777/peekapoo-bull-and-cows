<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model {
        
        protected $table = 'games';
        
        public function guessNumber()
        {
            return $this->hasMany('App\GuessNumber');
        }
        
        
}
