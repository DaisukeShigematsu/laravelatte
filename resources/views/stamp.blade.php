@extends('layouts.layout')

@section('content')

<div class="stampBackground">
    <p class="message">{{$user}}さんお疲れ様です！</p>

    <div class="container">
        <form class="stamp" method="POST" action="/timestamp/start">
            @csrf
            <button class="stamp">勤務開始</button>
        </form>

        <form class="stamp" method="POST" action="/timestamp/end">
            @csrf
            <button class="stamp">勤務終了</button>
        </form>

        <form class="stamp" method="POST" action="/rest/start">
            @csrf
            <button class="stamp">休憩開始</button>
        </form>

        <form class="stamp" method="POST" action="/rest/end">
            @csrf
            <button class="stamp">休憩終了</button>
        </form>

    </div>
    <p>{{session('my_status')}}</p>
    <p>{{session('error')}}</p>
</div>