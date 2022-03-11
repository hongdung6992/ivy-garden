<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
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
            'comment' => $this->comment ?? '',
            'created_at' => $this->created_at ?? '',
            'user_id' => $this->user_id ?? 0,
            'post_id' => $this->post_id ?? 0,
            'name' => $this->name,
            'avatar' => $this->avatar ? asset('storage/images/avatar/' . $this->avatar ?? '') : ''
        ];
    }
}
