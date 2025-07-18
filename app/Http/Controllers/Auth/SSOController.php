<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Validation\ValidationException;
use Laravel\Socialite\Facades\Socialite;

class SSOController extends Controller
{
    public function redirect(Request $request)
    {
        $this->ensureIsNotRateLimited($request, 'sso.redirect');

        return Socialite::driver('authentik')->redirect();
    }

    public function callback(Request $request): RedirectResponse
    {
        $this->ensureIsNotRateLimited($request, 'sso.callback');

        /** @var \SocialiteProviders\Manager\OAuth2\User $authentikUser */
        $authentikUser = Socialite::driver('authentik')->user();

        $user = User::updateOrCreate([
            'email'                   => $authentikUser->email,
        ], [
            'name'                    => $authentikUser->name,
            'authentik_id'            => $authentikUser->id,
            'authentik_token'         => $authentikUser->token,
            'authentik_refresh_token' => $authentikUser->refreshToken,
        ]);

        Auth::login($user);

        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        // Redirect to Authentik's logout endpoint with post-logout redirect
        $authentikLogoutUrl = config('services.authentik.logout_url');
        $postLogoutRedirectUri = url('/');

        return redirect($authentikLogoutUrl . '?post_logout_redirect_uri=' . urlencode($postLogoutRedirectUri));

    }

    protected function ensureIsNotRateLimited(Request $request, string $action): void
    {
        $key = $action . '|' . $request->ip();
        $maxAttempts = $action === 'sso.redirect' ? 10 : 5;

        if (! RateLimiter::tooManyAttempts($key, $maxAttempts)) {
            RateLimiter::hit($key, 60); // 1 minute decay
            return;
        }

        $seconds = RateLimiter::availableIn($key);

        throw ValidationException::withMessages([
            'error' => 'Too many login attempts. Please try again in ' . ceil($seconds / 60) . ' minutes.',
        ]);
    }
}
