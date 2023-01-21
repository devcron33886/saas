<?php

namespace App\Http\Controllers;

    use Illuminate\Http\Request;

    class PaymentMethodController extends Controller
    {
        public function index()
        {
            $paymentMethods = auth()->user()->paymentMethods();
            $defaultPaymentMethod = auth()->user()->defaultPaymentMethod();

            return view('account.index', compact('paymentMethods', 'defaultPaymentMethod'));
        }

        public function addPaymentMethod()
        {
            $intent = auth()->user()->createSetupIntent();

            return view('account.create-payment', compact('intent'));
        }

        public function storePaymentMethod(Request $request)
        {
            try {
                auth()->user()->addPaymentMethod($request->input('paymentMethod'));
                if ($request->input('default') == 1) {
                    auth()->user()->updateDefaultPaymentMethod($request->input('paymentMethod'));
                }

                return to_route('account.myplan')->withMessage('Payment Method added successfully');
            } catch (\Exception $exception) {
                return redirect()->back()->withErrors($exception->getMessage());
            }
        }

        public function markDefault(Request $request, $payment)
        {
            try {
                auth()->user()->updateDefaultPaymentMethod($payment);

                return to_route('account.myplan')->withMessage('Payment Method updated successfully');
            } catch (\Exception $exception) {
                return redirect()->back()->withErrors($exception->getMessage());
            }
        }
    }
