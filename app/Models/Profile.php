<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'gamertag',
    	'platform',
    	'points',
    	'user_id',
    	'tournaments',
    ];

    public function user(){
        return $this->BelongsTo(User::class);
    }
    public function member() {
        return $this->BelongsTo(Member::class);
    }
}
