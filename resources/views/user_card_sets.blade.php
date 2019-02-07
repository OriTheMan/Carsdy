@extends('layout')
@section('content')


@foreach($card_sets as $card_set)

    <h4>{{$card_set->title}}</h4>

@endforeach
@stop