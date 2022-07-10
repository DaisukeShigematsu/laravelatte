@extends('layouts.layout')

@section('content')

<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
        <h2>Atte</h2>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- mail -->
            <div>
                <x-label for="name" :value="__('氏名')" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>
            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('パスワード')" />
                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
            </div>

            <div class="flex items-center mt-4">
                <x-button class="block justify-center w-full  mb-4 mt-4">
                    ログイン
                </x-button>
            </div>
            <div class= "block mt-4 w-full text-center mb-4">
                    アカウントお持ちでない方はこちらから
            </div>
            <a class="block w-full text-center mb-4 mt-4" href="{{ route('register') }}">
                    会員登録
            </a>

        </form>
    </x-auth-card>
</x-guest-layout>

@endsection