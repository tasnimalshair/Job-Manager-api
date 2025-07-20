<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class JobResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'company' => $this->company,
            'location' => $this->location,
            'type' => $this->type,
            'deadline' => $this->deadline,
            'salary' => $this->salary,
            'created_by' => $this->created_by,
            'category' => $this->whenLoaded('category'),
            'status' => $this->status,
            'applications' => $this->whenLoaded('applications')
        ];
    }
}
