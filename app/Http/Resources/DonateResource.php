<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DonateResource extends JsonResource
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
            "id"=>$this->id,
            "amount"=>$this->amount,
            "verfied"=>$this->verfied,
            "user_name"=>$this->user->name,
            "user_namber"=>$this->user->phone_namber,
        ];
    }
}
