<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Models\Subscription;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    /**
     * Display a listing of all available plans.
     */
    public function index()
    {
        $plans = Plan::active()
            ->orderBy('sort_order')
            ->orderBy('price')
            ->get();

        $userSubscription = auth()->user()->userSubscription;

        return view('subscriptions.index', compact('plans', 'userSubscription'));
    }

    /**
     * Store a new subscription (this will integrate with Stripe).
     */
    public function store(Request $request)
    {
        $request->validate([
            'plan_id' => ['required', 'exists:plans,id'],
        ]);

        // TODO: Implement Stripe checkout session creation
        return response()->json([
            'message' => 'Stripe integration pending',
            'plan_id' => $request->plan_id
        ]);
    }

    /**
     * Update an existing subscription (upgrade/downgrade).
     */
    public function update(Request $request, Subscription $subscription)
    {
        $request->validate([
            'plan_id' => ['required', 'exists:plans,id'],
        ]);

        // TODO: Implement Stripe subscription update
        return response()->json([
            'message' => 'Stripe subscription update pending',
            'subscription_id' => $subscription->id,
            'new_plan_id' => $request->plan_id
        ]);
    }

    /**
     * Cancel a subscription.
     */
    public function destroy(Subscription $subscription)
    {
        // TODO: Implement Stripe subscription cancellation
        return response()->json([
            'message' => 'Stripe subscription cancellation pending',
            'subscription_id' => $subscription->id
        ]);
    }
}
