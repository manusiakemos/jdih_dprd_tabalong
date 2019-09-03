<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Kelurahan extends Model
{
    protected $table = "tb_kelurahan";
    protected $primaryKey = "kelurahan_id";

    public function scopeTabalong($query)
    {
        return $query->select(["tb_kelurahan.*", "kecamatan_nama"])
            ->join("tb_kecamatan", "tb_kecamatan.kecamatan_id", "=", "tb_kelurahan.kecamatan_id")
            ->where("tb_kecamatan.kabupaten_id", 6309);
    }
}
