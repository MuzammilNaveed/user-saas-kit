<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePlanRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', 'unique:plans,slug'],
            'description' => ['nullable', 'string'],
            'logo' => ['nullable', 'image', 'max:2048'],
            'stripe_price_id' => ['required', 'string', 'max:255', 'unique:plans,stripe_price_id'],
            'stripe_product_id' => ['nullable', 'string', 'max:255'],
            'billing_period' => ['required', 'in:monthly,yearly'],
            'monthly_credits' => ['required', 'integer', 'min:0'],
            'price' => ['required', 'numeric', 'min:0'],
            'currency' => ['nullable', 'string', 'max:3'],
            'features' => ['nullable', 'json'],
            'is_active' => ['nullable', 'boolean'],
            'hidden' => ['nullable', 'boolean'],
            'sort_order' => ['nullable', 'integer'],
        ];
    }
}
