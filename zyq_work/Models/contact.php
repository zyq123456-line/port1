<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class contact extends Model
{
    protected $table = 'contact';
    protected $fillable = ['customer','	cooperation_company','person_incharge','address','product','context','contract_income','contract_date','contact_information','remarks','administrator_id'];
}
