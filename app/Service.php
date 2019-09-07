<?php

namespace App;

use App\SubCategory;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    //

    protected $fillable=['name', 'subcat_id'];


    public function subcategory(){
        return $this->belongsTo(SubCategory::class);
    }

    public function complaints(){
        return $this->hasMany(Complaint::class);
    }
}
