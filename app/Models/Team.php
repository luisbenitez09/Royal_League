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
    	'bestResult',
    	'tournaments',
    	'access_code',
    ];

    public function member(){
        return $this->hasMany(Member::class, 'access_code');
    }


}
