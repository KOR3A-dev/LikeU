<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;


class Agenda extends Model
{
    use HasFactory;

    /**
    * The attributes that are mass assignable.
    *
    * @var string[]
    */
    protected $fillable = [
        'subject',
        'date',
        'status',
        'user_id'
    ];


    /**
    * The attributes that should be cast.
    *
    * @var array
    */
    protected $casts = [
        'date' => 'date:Y-m-d h:m:s',
    ];


    /**
    * Relationship one to many user -> agenda.
    */
    public function User()
    {
        return $this->belongsTo(User::class);
    }

}
