<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'name',
    	'owner',
    	'points',
        'status',
    	'bestResult',
    	'tournaments',
    	'access_code',
    ];

    public function member(){
        return $this->hasMany(Member::class, 'access_code');
    }

    public function user(){
        return $this->belongsTo(User::class, 'owner', 'id');
    }

    public function registered_team(){
        return $this->hasMany(Registered_team::class, 'team_id');
    }

}
