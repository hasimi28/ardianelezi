@extends('backend.adm_master')

@section('content')

    @foreach($posts as $po)

        {{$po->TextTrans('title')}} <br>

    @endforeach

@endsection