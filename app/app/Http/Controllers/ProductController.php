<?php

namespace App\Http\Controllers;

use App\Http\Request\ProductRequest;
use App\Http\Resources\Product\ProductResource;
use App\Http\Resources\Product\ProductShowResource;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


class ProductController extends Controller

{
    /**
     * @var Model
     */
    protected $model;

    /**
     * @param Model $product
     * @return void
     */
    public function __construct(Product $product)
    {
        $this->model = $product;
    }

    /**
     */
    public function index(Request $request)
    {
        $query = $this->model->with('stocks');

        if ($request->input('priceStart')) {
            $query = $query->where('price', '>=', $request->input('priceStart'));
        }
        if ($request->input('priceEnd')) {
            $query = $query->where('price', '<=', $request->input('priceEnd'));
        }

        if ($request->input('stock')) {
            $query = $query->whereHas('stocks', function ($query) {
                $query->where('stocks.stock', '>', 0);
            });
        } else {
            $query = $query->whereDoesntHave('stocks', function ($query) {
                $query->where('stocks.stock', '>', 0);
            });
        }

        return ProductResource::collection($query->orderBy('price')->get());
    }

    /**
     * @param Request $request
     * @return ProductResource
     */
    public function store(ProductRequest $request): ProductResource
    {
        $item = $this->model->create($request->validated());
        return new ProductResource($item->fresh());
    }

    /**
     * @param mixed $id
     * @return Response
     */
    public function destroy($id):Response
    {
        try {
            $item = $this->model->with('stocks')->findOrFail($id);
            $item->stocks()->delete();
            $item->delete();
            return response(["id" => $id, "deleted" => true]);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response(['message' => 'Item Not Found!', 'status' => 404]);
        }
    }

    /**
     * @param mixed $id
     * @return ProductResource|Response
     */
    public function show($id):ProductShowResource|Response
    {
        try {
            $item = $this->model->with('stocks')->findOrFail($id);
            return new ProductShowResource($item);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response(['message' => 'Item Not Found!', 'status' => 404]);
        }
    }

    /**
     * @param mixed $id
     * @param mixed $request
     * @return ProductResource|Response
     */
    public function update($id, ProductRequest $request):ProductResource|Response
    {
        try {
            $item = $this->model->with('stocks')->findOrFail($id);
            $item->update($request->validated());
            return new ProductResource($item->fresh());
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response(['message' => 'Item Not Found!', 'status' => 404]);
        }
    }
}
