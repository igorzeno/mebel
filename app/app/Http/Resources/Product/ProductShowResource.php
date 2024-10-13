<?php

namespace App\Http\Resources\Product;

use App\Http\Resources\Stock\StockResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductShowResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'desc' => $this->desc,
            'price' => $this->price,
            'stocks' => StockResource::collection($this->stocks),
        ];
    }
}
