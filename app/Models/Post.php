<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
  use HasFactory;

  use SoftDeletes;

  use Sluggable;


  protected $fillable = ["title","description","user_id","image"];


  public function user()
  {
    return $this->belongsTo(User::class);
  }


  public function comments()
  {
    return $this->morphMany(Comment::class,'commentable');
  }

  protected function humanReadableDate():Attribute
  {
    return Attribute::make(
      get: fn ($value) => $this->created_at->diffForHumans()
    );

  }

  protected function image():Attribute
  {
    return Attribute::make(
      get: fn ($value) => asset("storage/". $value)
    );

  }

  public function sluggable(): array
  {
    return [
      'slug' => [
        'source' => 'title'
      ]
    ];
  }


}
