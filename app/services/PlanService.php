<?php

namespace App\Services;

use App\Models\Plan;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class PlanService
{
    public function createPlan(array $data): Plan
    {
        $planPayload = $this->planParams($data);

        // Auto-generate slug from name if not provided
        if (!isset($planPayload['slug'])) {
            $planPayload['slug'] = Str::slug($data['name']);
        }

        $plan = Plan::create($planPayload);

        if (isset($data['logo']) && $data['logo'] instanceof \Illuminate\Http\UploadedFile) {
            $this->uploadLogo($plan, $data['logo']);
        }

        activity()
            ->causedBy(auth()->user())
            ->performedOn($plan)
            ->withProperties(['attributes' => $plan->toArray()])
            ->log(auth()->user()->name . " created a new Plan: " . $plan->name);

        return $plan;
    }

    public function updatePlan(Plan $plan, array $data): Plan
    {
        $planPayload = $this->planParams($data);

        // Auto-generate slug from name if name is updated
        if (isset($data['name']) && !isset($planPayload['slug'])) {
            $planPayload['slug'] = Str::slug($data['name']);
        }

        $plan->fill($planPayload);

        if ($plan->isDirty()) {
            $plan->save();

            activity()
                ->causedBy(auth()->user())
                ->performedOn($plan)
                ->withProperties(['attributes' => $plan->toArray()])
                ->log(auth()->user()->name . " updated a Plan: " . $plan->name);
        }

        if (isset($data['logo']) && $data['logo'] instanceof \Illuminate\Http\UploadedFile) {
            $this->uploadLogo($plan, $data['logo']);
        }

        return $plan;
    }

    public function deletePlan(Plan $plan)
    {
        // Check if plan has active subscriptions
        if ($plan->activeSubscriptions()->exists()) {
            throw new \Exception('Cannot delete plan with active subscriptions. Please cancel all subscriptions first.');
        }

        $planName = $plan->name;
        $plan->delete();

        activity()
            ->causedBy(auth()->user())
            ->performedOn($plan)
            ->log('Plan deleted: ' . $planName);

        return true;
    }

    protected function uploadLogo(Plan $plan, \Illuminate\Http\UploadedFile $file)
    {
        $disk = 'public';
        $filename = $file->hashName();
        $path = $file->storeAs('plans/logos', $filename, $disk);

        // Delete old logo if exists
        if ($plan->logo) {
            \Illuminate\Support\Facades\Storage::disk($disk)->delete($plan->logo);
        }

        $plan->update(['logo' => $path]);
    }

    private function planParams(array $data): array
    {
        $params = Arr::only($data, [
            'name',
            'slug',
            'description',
            'stripe_price_id',
            'stripe_product_id',
            'billing_period',
            'monthly_credits',
            'price',
            'currency',
            'features',
            'is_active',
            'hidden',
            'sort_order'
        ]);

        // Convert features to array if it's a string
        if (isset($params['features']) && is_string($params['features'])) {
            $params['features'] = json_decode($params['features'], true);
        }

        return $params;
    }
}
