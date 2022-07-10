@extends('layouts.layout')

@section('content')

<div class="dateBackground">
    <div class="wrapper">
        <div class="date">
            <button class="left"><</button>
            <div>{{$today->format('Y-m-d')}}</div>
            <button class="right">></button>
        </div>

        <table>
            <tr class="tableHeader">
                <th>名前</th>
                <th>勤務開始</th>
                <th>勤務終了</th>
                <th>休憩時間</th>
                <th>勤務時間</th>
            </tr>

            @foreach($timestamps as $timestamp)

            <tr class="tableContent">
                <td>{{$timestamp->user->name}}</td>
                <td>{{$timestamp->start_time}}</td>
                <td>{{$timestamp->end_time}}</td>
                <td>{{$timestamp->rest->start_time}}</td>
                <td>勤務時間</td>
            </tr>

            @endforeach


        </table>
    </div>
    <p>{{ $timestamps->links() }}</p>
</div>

@endsection
Footer
