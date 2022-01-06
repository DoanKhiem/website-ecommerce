<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    protected $table = "brands";
    protected $fillable = [
        'name',
        'status',
        'logo'
    ];

    public function numberOfProducts(){
        return $this->hasMany(Product::class,'brand_id','id');
    }

    public function scopeSearch($query){
        if ($key = request()->key){
            $query = $query->where('name','like','%'.$key.'%');
        }
        return $query;
    }
}
