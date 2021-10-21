<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CampaignResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'from_date' => $this->from_date->format('Y-m-d'),
            'from_date_formatted' => $this->from_date->format('d M, Y'),
            'to_date' => $this->to_date->format('Y-m-d'),
            'to_date_formatted' => $this->to_date->format('d M, Y'),
            'daily_budget' => $this->daily_budget,
            'daily_budget_formatted' => number_format($this->daily_budget, 2),
            'total_budget' => $this->total_budget,
            'total_budget_formatted' => number_format($this->total_budget, 2),
            'images' => $this->images,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
