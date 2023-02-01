<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use Exception;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function checkOut(Plan $plan)
    {
        $currentPlan = auth()->user()->subscription('default');
        if (! is_null($currentPlan) && $currentPlan != $currentPlan->stripe_identifier) {
            try {
                auth()->user()->subscription('default')->swap($plan->stripe_identifier);

                return to_route('account.billing')->withMessage('Subscribed successfully');
            } catch (Exception $exception) {
                return to_route('account.check-out')->withError($exception->getMessage());
            }
        }
        $intent = auth()->user()->createSetupIntent();

        return view('billing.checkout', compact('plan', 'intent'));
    }

    public function checkOutProcess(Request $request)
    {
        $plan = Plan::findOrFail($request->input('plan_id'));
        try {
            auth()->user()->newSubscription('default', $plan->stripe_identifier)->create($request->input('paymentMethod'));
            auth()->user()->update(['trial_ends_at' => null]);

            return to_route('account.billing')->withMessage('Subscribed successfully');
        } catch (Exception $exception) {
            return to_route('account.check-out')->withError($exception->getMessage());
        }
    }
}
