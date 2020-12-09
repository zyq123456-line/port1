<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class clue extends Model
{

    protected $table = 'clue';
    protected $fillable = ['customer','contact','telephone','remarks','time'];

}
