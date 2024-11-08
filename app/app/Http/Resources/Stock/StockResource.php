<?php

namespace App\Http\Resources\Stock;

use Illuminate\Http\Resources\Json\JsonResource;

class StockResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'name' => $this->name,
          //  'stock' => $this->stock,
        ];
    }
}
