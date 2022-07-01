@extends('layouts.default')
<style>
    th {
      background-color: #289ADC;
      color: black;
      padding: 5px 40px;
    }
    tr:nth-child(odd) td{
      background-color: #FFFFFF;
    }
    td {
      padding: 25px 40px;
      background-color: #EEEEEE;
      text-align: center;
    }
</style>
@section('title', 'index.blade.php')

@section('content')
<table>
  <tr>
    <th>id</th>
    <th>name</th>
    <th>eail</th>
    <th>created_at</th>
  </tr>

  @foreach ($items as $item)
  <tr>
    <td>
      {{$item->id}}
    </td>
    <td>
      {{$item->name}}
    </td>
    <td>
      {{$item->email}}
    </td>
    <td>
      {{$item->created_at}}
    </td>
  </tr>
  @endforeach
</table>
@endsection