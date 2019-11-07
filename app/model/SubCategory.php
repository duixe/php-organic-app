<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class SubCategory extends Model{
  use SoftDeletes;

  public $timestamp = true;
  protected $fillable = ['name', 'slug', 'category_id'];
  protected $dates = ['deleted_at'];

  public function category() {
    return $this->belongsTo(Category::class);
  }

  public function product() {
    return $this-hasMany(Product::class);
  }

  public function transform($data) {

    $subcategories = [];

    foreach ($data as $item) {
      $added = new Carbon($item->created_at);
      array_push($subcategories, [
        'id' => $item->id,
        'category_id' => $item->category_id,
        'name' => $item->name,
        'slug' => $item->slug,
        'added' => $added->toFormattedDateString()
      ]);
    }

    return $subcategories;
  }
}
