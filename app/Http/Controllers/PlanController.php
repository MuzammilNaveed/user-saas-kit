<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use Illuminate\Http\Request;
use App\Services\PlanService;
use App\Http\Requests\StorePlanRequest;
use App\Http\Requests\UpdatePlanRequest;

class PlanController extends Controller
{
    protected $planService;

    public function __construct(PlanService $planService)
    {
        $this->planService = $planService;
    }

    public function index(Request $request)
    {
        $query = Plan::query();

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%")
                    ->orWhere('slug', 'like', "%{$search}%");
            });
        }

        if ($request->filled('billing_period')) {
            $query->where('billing_period', $request->billing_period);
        }

        if ($request->filled('is_active')) {
            $query->where('is_active', $request->is_active);
        }

        $plans = $query->orderBy('sort_order')->latest()->paginate(10);
        return view('plans.index', compact('plans'));
    }

    public function create()
    {
        return view('plans.create');
    }

    public function store(StorePlanRequest $request)
    {
        try {
            $this->planService->createPlan($request->validated());
            return redirect()->route('plans.index')->with('success', 'Plan created successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage())->withInput();
        }
    }

    public function show(Plan $plan)
    {
        $plan->load(['subscriptions', 'activeSubscriptions']);
        return view('plans.show', compact('plan'));
    }

    public function edit(Plan $plan)
    {
        return view('plans.edit', compact('plan'));
    }

    public function update(UpdatePlanRequest $request, Plan $plan)
    {
        try {
            $this->planService->updatePlan($plan, $request->validated());
            return redirect()->route('plans.index')->with('success', 'Plan updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage())->withInput();
        }
    }

    public function destroy(Plan $plan)
    {
        try {
            $this->planService->deletePlan($plan);
            return redirect()->route('plans.index')->with('success', 'Plan deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->route('plans.index')->with('error', $e->getMessage());
        }
    }
}
