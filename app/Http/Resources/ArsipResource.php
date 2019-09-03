<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ArsipResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return array (
            'arsip_id' => $this->arsip_id,
            'kategori' => $this->cat_id,
            'kategori_detail' => new CategoryResource($this->category),
            'judul' => $this->arsip_title,
            'label' => $this->category->cat_name . ' Nomor ' . $this->arsip_nomor . ' Tahun ' . $this->arsip_tahun,
            'nomor' => $this->arsip_nomor,
            'hits' => $this->arsip_hits,
            'deskripsi' => $this->arsip_desc ? $this->arsip_desc : '-',
            'tahun' => $this->arsip_tahun,
            'tanggal' => $this->arsip_date,
            'url_download' => url('/uploads/'.$this->arsip_filename),
            'file' => $this->arsip_filename,
            'created_at' => tanggal_indo($this->created_at),
            'tampilkan' => boolean_text($this->arsip_show,"Ya", "Tidak"),
            'links' =>
                array (
                    'store' => '/api/arsip',
                    'update' => route('arsip.update', $this->arsip_id),
                    'destroy' => route('arsip.destroy', $this->arsip_id),
                ),
        );
    }
}
