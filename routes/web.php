<?php

    use Illuminate\Support\Facades\Route;

    Route::get('/', \App\Http\Controllers\WelcomeController::class)->name('welcome');

    Auth::routes();

    Route::group(['middleware' => ['auth']], function () {
        //Billing
        Route::get('account/billing', [\App\Http\Controllers\BillingController::class, 'index'])->name('account.billing');
        Route::get('account/check-out/{plan:slug}', [\App\Http\Controllers\CheckoutController::class, 'checkOut'])->name('account.check-out');
        Route::post('plan/check-out', [\App\Http\Controllers\CheckoutController::class, 'checkOutProcess'])->name('plan.check-out');
        Route::get('plan/cancel', [\App\Http\Controllers\BillingController::class, 'cancel'])->name('plan.cancel');
        Route::get('plan/resume', [\App\Http\Controllers\BillingController::class, 'resume'])->name('plan.resume');

        Route::get('account/myplan', [\App\Http\Controllers\PaymentMethodController::class, 'index'])->name('account.myplan');
        Route::get('account/add-payment-method', [\App\Http\Controllers\PaymentMethodController::class, 'addPaymentMethod'])->name('account.add-payment-method');
        Route::post('account/store-payment-method', [\App\Http\Controllers\PaymentMethodController::class, 'storePaymentMethod'])->name('account.store-payment-method');
        Route::post('account/mark-default/{paymentId}', [\App\Http\Controllers\PaymentMethodController::class, 'markDefault'])->name('account.mark-default');
    });

    Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth', 'admin']], function () {
        Route::get('/', [\App\Http\Controllers\Admin\HomeController::class, 'index'])->name('dashboard');
        //Permissions
        Route::delete('permissions/destroy', [\App\Http\Controllers\Admin\PermissionsController::class, 'massDestroy'])->name('permissions.massDestroy');
        Route::resource('permissions', \App\Http\Controllers\Admin\PermissionsController::class);

        // Roles
        Route::delete('roles/destroy', [\App\Http\Controllers\Admin\RolesController::class, 'massDestroy'])->name('roles.massDestroy');
        Route::resource('roles', \App\Http\Controllers\Admin\RolesController::class);

        // Users
        Route::delete('users/destroy', [\App\Http\Controllers\Admin\UsersController::class, 'massDestroy'])->name('users.massDestroy');
        Route::resource('users', \App\Http\Controllers\Admin\UsersController::class);

        // Payment
        Route::delete('payments/destroy', [\App\Http\Controllers\Admin\PaymentController::class, 'massDestroy'])->name('payments.massDestroy');
        Route::resource('payments', \App\Http\Controllers\Admin\PaymentController::class);

        // Plan
        Route::delete('plans/destroy', [\App\Http\Controllers\Admin\PlanController::class, 'massDestroy'])->name('plans.massDestroy');
        Route::resource('plans', \App\Http\Controllers\Admin\PlanController::class)->except(['show']);

        // Feature
        Route::delete('features/destroy', [\App\Http\Controllers\Admin\FeatureController::class, 'massDestroy'])->name('features.massDestroy');
        Route::resource('features', \App\Http\Controllers\Admin\FeatureController::class)->except(['show']);

        // My Team
        Route::delete('my-teams/destroy', [\App\Http\Controllers\Admin\MyTeamController::class, 'massDestroy'])->name('my-teams.massDestroy');
        Route::resource('my-teams', \App\Http\Controllers\Admin\MyTeamController::class);

        Route::get('global-search', [\App\Http\Controllers\Admin\GlobalSearchController::class, 'search'])->name('globalSearch');
    });
    Route::group(['prefix' => 'profile', 'as' => 'profile.', 'middleware' => ['auth']],
        function () {
            // Change password
            if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
                Route::get('password', [\App\Http\Controllers\Auth\ChangePasswordController::class, 'edit'])->name('password.edit');
                Route::post('password', [\App\Http\Controllers\Auth\ChangePasswordController::class, 'update'])->name('password.update');
                Route::post('profile', [\App\Http\Controllers\Auth\ChangePasswordController::class, 'updateProfile'])->name('password.updateProfile');
                Route::post('profile/destroy', [\App\Http\Controllers\Auth\ChangePasswordController::class, 'destroy'])->name('password.destroyProfile');
            }
        });

    Route::group(['prefix' => 'dashboard', 'as' => 'customer.', 'middleware' => ['auth', 'paying']], function () {
        Route::get('/home', [\App\Http\Controllers\Customer\HomeController::class, 'index'])->name('home');
        // Product
        Route::delete('products/destroy', [\App\Http\Controllers\Customer\ProductController::class, 'massDestroy'])->name('products.massDestroy');
        Route::resource('products', \App\Http\Controllers\Customer\ProductController::class);

        // Customer
        Route::delete('customers/destroy', [\App\Http\Controllers\Customer\CustomerController::class, 'massDestroy'])->name('customers.massDestroy');
        Route::resource('customers', \App\Http\Controllers\Customer\CustomerController::class)->except(['show']);

        // Invoice
        Route::delete('invoices/destroy', [\App\Http\Controllers\Customer\InvoiceController::class, 'massDestroy'])->name('invoices.massDestroy');
        Route::resource('invoices', \App\Http\Controllers\Customer\InvoiceController::class);

        //Account
        Route::get('account/profile', [\App\Http\Controllers\Customer\ProfileController::class, 'index'])->name('account.index');
        Route::post('account/profile', [\App\Http\Controllers\Customer\ProfileController::class, 'update'])->name('account.update');
        Route::post('account/profile/destroy', [\App\Http\Controllers\Customer\ProfileController::class, 'destroy'])->name('account.destroy');
        Route::post('account/profile/password', [\App\Http\Controllers\Customer\ProfileController::class, 'password'])->name('account.password');
    });
