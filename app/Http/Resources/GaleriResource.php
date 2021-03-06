<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class GaleriResource extends JsonResource
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
                'store' => route('gallery.store'),
                'show' => route('gallery.show', $this->gal_id),
                'update' => route('gallery.update', $this->gal_id),
                'destroy' => route('gallery.destroy', $this->gal_id),
            ]
        ];
    }
}
