<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table= "menu";
    protected $primaryKey = "menu_id";
    public $timestamps= false;

    public function children()
    {
        return $this->hasMany(self::class, 'parent_id', 'menu_id');
    }

// recursive, loads all descendants
    public function childrenRecursive()
    {
        return $this->children()->with('childrenRecursive');
        // which is equivalent to:
        // return $this->hasMany('Survey', 'parent')->with('childrenRecursive);
    }

// parent
    public function parent()
    {
        return $this->belongsTo(self::class,'parent_id');
    }

// all ascendants
    public function parentRecursive()
    {
        return $this->parent()->with('parentRecursive');
    }
}
