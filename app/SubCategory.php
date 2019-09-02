<?php

namespace App;

use App\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SubCategory extends Model
{

    protected $table = 'Sub_categories';
    protected $fillable=['name', 'category_id'];

    public function category(){
        return BelongsTo(Category::class);
    }

  

 }
