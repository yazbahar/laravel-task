<?php

namespace App\Http\Requests;

use App\Models\Concerns\ProductCurrency;
use App\Models\Concerns\ProductStatus;
use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {

        $currencies = array_values(ProductCurrency::$list);
        $statuses = array_values(ProductStatus::$list);

        return [
            'title' => 'required|string|max:100',
            'category_id' => 'required|integer|exists:categories,id',
            'price' => 'required|numeric',
            'currency' => 'required|integer|in:' . implode(',', $currencies),
            'status' => 'required|integer|in:' . implode(',', $statuses),
        ];
    }
}
