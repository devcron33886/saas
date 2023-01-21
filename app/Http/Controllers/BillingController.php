<?php

namespace App\Http\Controllers;

use App\Models\Plan;

class BillingController extends Controller
{
    public function index()
    {
        $plans = Plan::where('status', true)->orderBy('price', 'ASC')->get();
        $currentPlan = auth()->user()->subscription('default') ?? null;

        return view('billing.index', compact('plans', 'currentPlan'));
    }

    public function cancel()
    {
        try {
            auth()->user()->subscription('default')->cancel();

            return to_route('account.billing')->withMessage('Plan cancelled successfully');
        } catch (\Exception $exception) {
            return back()->withErrors($exception->getMessage());
        }
    }

    public function resume()
    {
        try {
            auth()->user()->subscription('default')->resume();

            return to_route('account.billing')->withMessage('Plan resumed successfully');
        } catch (\Exception $exception) {
            return back()->withErrors($exception->getMessage());
        }
    }
}
