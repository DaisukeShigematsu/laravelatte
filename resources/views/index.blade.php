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
        td table tbody tr td {
      background-color:#EEEEEE !important;
    }
</style>
@section('title', 'user.index.blade.php')

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
      {{$item->getDetail()}}
    </td>
    <td>
    @($item->users!=null)
      <table width="100%">
        @foreach($item->users as $obj)
          <tr>
            <td>{{$obj->getDetail()}}</td>
          </tr>
        @endforeach
      </table>
    @endif
    </td>
  </tr>
  @endforeach
</table>
@endsection