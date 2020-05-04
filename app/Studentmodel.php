<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Studentmodel extends Model
{
    protected $table = 'students';
    protected $fillable = ['firstname', 'lastname', 'email', 'password'];
}
