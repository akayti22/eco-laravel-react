<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['brand_id','category_id','supplier_id','name','image','description','buy_price','sell_price','discount_price','total_quantity','view_count'];
    protected $appends = ['image_url'];

    public function getImageUrlAttribute(){
        return asset('/image') .'/'. $this->image;
    }

    public function brand(){
        return $this->belongsTo(Brand::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function color(){
        return $this->belongsToMany(Color::class,'product_colors');
    }

    public function productAdd(){
        return $this->hasMany(ProductAdd::class);
    }

    public function productRemove(){
        return $this->hasMany(ProductRemove::class);
    }

    public function review(){
        return $this->hasMany(ProductReview::class);
    }

    public function supplier(){
        return $this->belongsTo(Supplier::class);
    }

}
