@extends('layouts.layout')

@section('content')

<div class="stampBackground">
    <p class="message">{{$user}}さんお疲れ様です！</p>

    <div class="container">
        <form class="stamp" method="POST" action="/attendandce/start">
            @csrf
            <button class="stamp">勤務開始</button>
        </form>
        <form class="stamp" method="POST" action="/attendance/end">
            @csrf
            <button class="stamp">勤務終了</button>
        </form>
        <form class="stamp" method="POST" action="/rest/start">
            @csrf
            <button class="stamp">休憩開始</button>
        </form>

        <form class="stamp" method="POST" action="/rest/end">
            @cs                                                                                                         rf
            <button class="stamp">休憩終了</button>
        </form>

    </div>
    <p>{{session('my_status')}}</p>
    <p>{{session('error')}}</p>
</div>