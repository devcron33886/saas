<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class WelcomeController extends Controller
{
    public function __invoke()
    {
        $monthlyPlans = DB::table('plans')->where('billing_period', 'Monthly')->get();
        $yearlyPlans = DB::table('plans')->where('billing_period', 'Yearly')->get();
        $features = DB::table('features')->get();

        return view('welcome', compact('monthlyPlans', 'yearlyPlans', 'features'));
    }
}
