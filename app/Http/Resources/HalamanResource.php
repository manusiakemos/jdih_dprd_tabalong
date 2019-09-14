<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class HalamanResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'data' => parent::toArray($request),
            'links' => [
                'store' => route('halaman.store'),
                'update' => route('halaman.update', $this->hal_id),
                'destroy' => route('halaman.destroy', $this->hal_id),
            ]
        ];
    }
}
