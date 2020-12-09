<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class customers extends Model
{
    protected $table = 'customers';
    protected $fillable = ['remarks','customer','contact','telephone','company_type','scale','scource','administrator_name'];
}
