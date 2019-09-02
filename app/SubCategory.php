<?php

namespace App;

use App\Service;
use App\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SubCategory extends Model
{

    protected $table = 'Sub_categories';
    protected $fillable=['name', 'category_id'];

    public function category(){
        return $this->BelongsTo(Category::class);
    }

    public function services(){
        return $this->hasMany(Service::class);
     }

 }
