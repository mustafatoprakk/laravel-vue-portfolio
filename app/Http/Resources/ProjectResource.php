<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProjectResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "skill" => new SkillResource($this->whenLoaded("skill")),
            "name" => $this->name,
            "image" => asset("/storage/" . $this->image),
            "url" => $this->url,
        ];
    }
}
