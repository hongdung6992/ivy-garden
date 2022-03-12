<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
        return [
            'id' => $this->id ?? '',
            'name' => $this->name ?? '',
            'avatar' => $this->avatar ? $avatar : '',
            'email' => $this->email ?? '',
            'gender' => $this->gender ?? 1,
        ];
    }
}
