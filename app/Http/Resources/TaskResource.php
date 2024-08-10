<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\PriorityResource;

class TaskResource extends JsonResource
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
            'status' => $this->status,
            'due_date' => $this->due_date,
            'completed_at' => $this->completed_at,
            'created_at' => Carbon::parse($this->created_at)->diffForHumans(),
            'updated_at' => Carbon::parse($this->updated_at)->diffForHumans(), 
            'assignTo_id' => $this->user_id,
            'assignBy_id' => $this->assignBy_id,
            // 'priority_id' => $this->priority_id,
            'priority' => PriorityResource::make($this->whenLoaded('priority')),
            // 'priority' => PriorityResource::make($this->whenLoaded('priority')),
        ];
    }
}
