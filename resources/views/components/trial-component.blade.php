<div class="alert alert-warning alert-dismissible">
    <p class="text-center">
        You have {{ now()->diffInDays(auth()->user()->trial_ends_at) }} days of free trial left.
        <a href="{{ route('account.billing')  }}">Choose your plan</a> any time.
    </p>
</div>
