@extends('layouts.layout')

@section('content')

<div class="loginBackground">
    <h1 class="loginH1">ログイン</h1>

    <div class="loginFormCard">
        <form method="POST" action="{{ route('login') }}">
            @csrf

        <!-- mail -->
        <div class="formItem">
            <input id="name" placeholder="名前" class="" type="name" name="name" :value="old('name')" required />
        </div>

        <!-- password -->
        <div class="formItem">
            <input id="password" placeholder=" パスワード" class="" type="password" name="password" :value="old('password')" required autocomplete="new-password" />
        </div>

        <!-- button -->
        <div class="formItem">
            <input id="button" type="submit" value="ログイン" class="button">
        </div>

        </form>
    </div>
    <p class="registerMessage">アカウントをお持ちでない方はこちら</p>
    <div class="registerTransition">
        <a href="register">会員登録</a>
    </div>

</div>




@endsection