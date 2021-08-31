<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registered_team extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'team_id',
    	'tournament_id',
        't_points',
        't_position',
        'status'
    ];

    public function team(){
        return $this->BelongsTo(Team::class, 'team_id', 'id');
    }

    public function tournament(){
        return $this->BelongsTo(Tournament::class, 'tournament_id', 'id');
    }
}
