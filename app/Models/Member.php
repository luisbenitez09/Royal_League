<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'profile_id',
    	'access_code',
        'member_points'
    ];

    public function profile(){
        return $this->BelongsTo(Profile::class, 'profile_id', 'id');
    }

    public function team(){
        return $this->BelongsTo(Team::class, 'access_code', 'access_code');
    }
}
