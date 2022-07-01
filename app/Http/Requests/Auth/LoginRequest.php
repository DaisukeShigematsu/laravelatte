<?php

namespace App\Http\Requests\Auth;

use Illuminate\Auth\Events\Lockout;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class LoginRequest extends FormRequest
{
    /**     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
    /**
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string'],
            'password' => ['required', 'string'],
        ];
    }

    /**    *
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function authenticate()
    {
        $this->ensureIsNotRateLimited();
        if (! Auth::attempt($this->only('name', 'password'), $this->boolean('remember'))) {
            RateLimiter::hit($this->throttleKey());
            throw ValidationException::withMessages([
                'name' => trans('auth.failed'),
            ]);
        }
        RateLimiter::clear($this->throttleKey());
    }

    /**
     * @return void
     * @throws \Illuminate\Validation\ValidationException
     */
    public function ensureIsNotRateLimited()
    {
        if (! RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {return;}

        event(new Lockout($this));
        $seconds = RateLimiter::availableIn($this->throttleKey());
        throw ValidationException::withMessages([
            'name' => trans('auth.throttle', [
            'seconds' => $seconds,
            'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }
    /**
     * @return string
     */
    public function throttleKey()
    {
        return Str::lower($this->input('name')).'|'.$this->ip();
    }
}
