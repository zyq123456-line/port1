<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class business_opportunities extends Model
{
    protected $table = 'businessOpportunities';
    protected $fillable = ['theme','customer','income','expect_date','clinch_percentage','expect_product','opportanity_progress','record','state','remarks','administrator_id'];
}
