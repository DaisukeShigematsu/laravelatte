
@extends('layouts.layout')

@section('content')

<x-guest-layout>


    <x-auth-card>
        <x-slot name="logo">
        <h2>Atte</h2>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('名前')" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('メールアドレス')" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('パスワード')" />
                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('パスワードを再入力')" />
                <x-input id="password_confirmation" class="block mt-4 mb-4 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <x-button class="block justify-center w-full  mb-4 mt-4">
            登録する
            </x-button>
            <div class= "block mt-4 w-full text-center mb-4 ">
                    アカウントお持ちの方はこちらから
            </div>
            <a class="block w-full text-center mb-4 mt-4" href="{{ route('login') }}">
                    ログイン
            </a>


            </div>
        </form>
    </x-auth-card>
</x-guest-layout>


@endsection
