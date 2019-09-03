<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Arsip extends Model
{
    protected $table = "arsip";
    protected $primaryKey = "arsip_id";

    use SoftDeletes;

    public function category()
    {
        return $this->belongsTo(Category::class,'cat_id', 'cat_id')->withTrashed();
    }

    public function scopeSortByTahun($query, $year)
    {
        return $query->whereYear("arsip_tanggal", $year);
    }
}
