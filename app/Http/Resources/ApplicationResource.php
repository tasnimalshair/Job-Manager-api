<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ApplicationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'user_id' => $this->user_id,
            'job_id' => $this->job_id,
            'status' => $this->status,
            'cv_path' => $this->cv_path,
            'coverletter' => $this->coverletter,
            'user' => new UserResource($this->whenLoaded('user'))
        ];
    }
}
