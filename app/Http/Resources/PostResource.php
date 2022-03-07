<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
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
            'id' => $this->id ?? '',
            'content' => $this->content ?? '',
            'count' => $this->count ?? 0,
            'url_image' => $this->url_image ? asset('storage/images/posts/' . $this->url_image ?? '') : '',
            'created_at' => $this->created_at ?? '',
            'user_id' => $this->user_id ?? '',
            'name' => $this->name ?? '',
            'avatar' => $this->avatar ? asset('storage/images/avatar/' . $this->avatar ?? '') : '',
        ];
    }
}
