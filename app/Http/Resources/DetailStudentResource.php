<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DetailStudentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request)
    {
        return [
            'status' => 'ok',
            'message' => 'data found',
            'student' => [
                'name' => $this->name,
                'birthday' => $this->birthday,
                'address' => $this->address,
                'classroom_id' => $this->classroom_id,
                'classroom' => $this->whenLoaded('classroom')
            ]
        ];
    }
}
