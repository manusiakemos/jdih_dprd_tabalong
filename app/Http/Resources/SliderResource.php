<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SliderResource extends JsonResource
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
                'store' => route('slider.store'),
                'update' => route('slider.update', $this->slide_id),
                'destroy' => route('slider.destroy', $this->slide_id)
            ]
        ];
    }
}
