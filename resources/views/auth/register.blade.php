
@extends('layouts.layout')

@section('content')

<div class="registerBackground">
    <h1 class="registerH1">会員登録</h1>

    <div class="errorMessage">
        @foreach($errors->all() as $error)
            <p>{{$error}}</p>
        @endforeach
    </div>

    <div class="registerFormCard">
        <form method="POST" action="register">
            @csrf

        <!-- name -->
        <div class="formItem">
            <input id="name" placeholder=" 名前" class="" type="text" name="name" value="{{old('name')}}" autofocus />
        </div>

        <!-- mail -->
        <div class="formItem">
            <input id="email" placeholder=" メールアドレス" class="" type="email" name="email" :value="old('email')" />
        </div>

        <!-- password -->
        <div class="formItem">
            <input id="password" placeholder=" パスワード" class="" type="password" name="password" :value="old('password')" autocomplete="new-password" />
        </div>

        <!-- password confirmation -->
        <div class="formItem">
            <input id="password_confirmation" placeholder=" 確認用パスワード" class="" type="password" name="password_confirmation" :value="old('password_confirmation')" />
        </div>

        <!-- button -->
        <div class="formItem">
            <input id="button" type="submit" value="会員登録" class="button">
        </div>

        </form>
    </div>
    <p class="loginMessage">アカウントをお持ちの方はこちら</p>
    <div class="loginTransition">
        <a href="login">ログイン</a>
    </div>

</div>




@endsection