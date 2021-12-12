<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\HeadOfDepartment as HeadOfDepartmentResource;

class Department extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        //return parent::toArray($request);
        return [
            'id' => $this->id,
            'name' => $this->name,
            'desc' => $this->desc,
            'created_at' => (string)$this->created_at,
            'updated_at' =>(string) $this->updated_at,
            'headofdepartment' => new HeadOfDepartmentResource($this->whenLoaded('headofdepartment'))
        ];
    }
}
