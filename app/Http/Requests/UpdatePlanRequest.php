<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatePlanRequest extends FormRequest
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
        $planId = $this->route('plan')->id ?? $this->route('plan');

        return [
            'name' => ['nullable', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', Rule::unique('plans', 'slug')->ignore($planId)],
            'description' => ['nullable', 'string'],
            'logo' => ['nullable', 'image', 'max:2048'],
            'stripe_price_id' => ['nullable', 'string', 'max:255', Rule::unique('plans', 'stripe_price_id')->ignore($planId)],
            'stripe_product_id' => ['nullable', 'string', 'max:255'],
            'billing_period' => ['nullable', 'in:monthly,yearly'],
            'monthly_credits' => ['nullable', 'integer', 'min:0'],
            'price' => ['nullable', 'numeric', 'min:0'],
            'currency' => ['nullable', 'string', 'max:3'],
            'features' => ['nullable', 'json'],
            'is_active' => ['nullable', 'boolean'],
            'hidden' => ['nullable', 'boolean'],
            'sort_order' => ['nullable', 'integer'],
        ];
    }
}
