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
        if (file_exists('storage/images/avatar/' . $this->avatar ?? '')) {
            $avatar = asset('storage/images/avatar/' . $this->avatar ?? '');
        } else {
            $avatar = '';
        }
        if (file_exists('storage/images/posts/' . $this->url_image ?? '')) {
            $image = asset('storage/images/posts/' . $this->url_image ?? '');
        } else {
            $image = '';
        }
        return [
            'id' => $this->id ?? '',
            'content' => $this->content ?? '',
            'count' => $this->count ?? 0,
            'url_image' => $this->url_image ? $image : '',
            'created_at' => $this->created_at ?? '',
            'user_id' => $this->user_id ?? '',
            'name' => $this->name ?? '',
            'avatar' => $this->avatar ? $avatar : '',
        ];
    }
}
