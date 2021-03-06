<?php

namespace App;
use App\SubCategory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $fillable=['name'];

    public function subcategories(){
        return $this->hasMany(SubCategory::class);
    }

    public function complaints(){
        return $this->hasMany(Complaint::class);
    }

 
}
