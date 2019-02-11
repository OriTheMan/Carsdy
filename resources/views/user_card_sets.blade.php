@extends('layout')
@push('styles')
    <link rel="stylesheet" type="text/css" href={{ URL::asset('css/user_card_sets.css') }}>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
@endpush
@section('content')

<h1 id="username_title"><span style="font-weight:100;">{{$username}}</span>'s card sets</h1>
<hr style="padding:0;margin:0;color:white;">
<div id="master_container">
    @foreach($card_sets as $card_set)

        <div class="set_container">
            <div class="color_cont>">
                <div class="div1"></div>
                <div class="div2"></div>
                <div class="div3"></div>
            </div>

            <div class="set_contents">
                <a class="set_title" href="/user/{{$card_set->user_id}}/set/{{$card_set->id}}">
                    {{ str_limit($card_set->title, $limit = 100, $end = '...')}}
                </a>

                <p class="set_description">{{$card_set->description}}</p>

                <h5 class="set_user_name">
                    By 
                    <a class="set_user_link" href="/user/{{$card_set->user_id}}/card_sets">
                        {{$username}}
                    </a>
            </div>
        </div>
    @endforeach
</div>
@stop