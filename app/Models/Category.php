<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Collection;

class Category extends Model
{

  // Relationships
  public function parent()
  {
      return $this->belongsTo('App\Models\Category', 'parent_id');
  }

  public function children()
  {
      return $this->hasMany('App\Models\Category', 'parent_id');
  }

  public function nested_ancestors()
  {
      return $this->belongsTo('App\Models\Category', 'parent_id');
  }

  public function nested_descendants()
  {
      return $this->hasMany('App\Models\Category', 'parent_id');
  }

 
}

 
