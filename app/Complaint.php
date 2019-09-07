<?php

namespace App;

use DateTime;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Date;

class Complaint extends Model
{


    
public function __construct(){
  
}   
    //
    protected $fillable=[ 
    // 'user_id' ,
    'category' ,
    'subcategory',
    'service',
    'description',
    'customer_name',
    'job_assign' ,
    'completed',
    'date_completed',
];
   
public function category(){
    return $this->belongsTo(Category::class);
}

public function service(){
    return $this->belongsTo(Service::class);
}



}
