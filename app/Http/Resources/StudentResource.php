<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StudentResource extends JsonResource
{

    public function toArray(Request $request)
    {
        // return [
        //     'name' => $this->name,
        //     'birthday' => $this->birthday,
        //     'address' => $this->address,
        //     'classroom_id' => $this->classroom_id,
        //     'classroom' => new ClassroomResource($this->whenLoaded('classroom')),
        // ];
    }
}
