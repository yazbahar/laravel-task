<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\FilterProductRequest;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use App\Http\Resources\ProductCollection;
use App\Http\Resources\ProductResource;
use Symfony\Component\HttpFoundation\JsonResponse;

class ProductController extends ApiController
{
    public function index(FilterProductRequest $request): ProductCollection
    {
        $products = Product::query()
            ->when($request->category, function ($query) use ($request) {
                return $query->where('category_id', $request->category);
            })
            ->paginate(20);

        return new ProductCollection($products);
    }

    public function show(Product $product): ProductResource
    {
        return new ProductResource($product);
    }

    public function store(StoreProductRequest $request): ProductResource
    {
        $data = $request->validated();

        $data['user_id'] = auth()->user()->id;

        $product = Product::create($data);

        return new ProductResource($product);
    }

    public function update(UpdateProductRequest $request, Product $product): ProductResource
    {
        $data = $request->validated();

        $product->update($data);

        return new ProductResource($product);
    }

    public function destroy(Product $product): JsonResponse
    {
        $product->delete();

        return $this->success([], 'product successfully deleted.');
    }
}
