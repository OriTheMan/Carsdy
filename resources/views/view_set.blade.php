@extends('layout')
@push('styles')
    <link rel="stylesheet" type="text/css" href={{ URL::asset('css/view_set.css') }}>
@endpush
@push('scripts')
    <script type="text/javascript" src={{ URL::asset('js/view_set.js') }}></script>
@endpush
@section('content')
<h1 id="set_title">
    <span style="font-weight:100;">[{{$username}}] {{$card_set->title}}</span>
    <span style="float:right;margin-right:2em;">{{date('d/m/Y', strtotime($card_set->updated_at))}}</span>
</h1>

<div id="container">
    <div id="main_row">
        <div id="main_card">
            <h4 id="card_word">{{$cards[0]->front}}</h4>
            <div id="card_button_container">
                <button id="b_prev" onclick="previous()"><i class="fas fa-backward"></i></button>
                <button id="b_change" onclick="change()"><i class="fas fa-exchange-alt"></i></button>
                <button id="b_next" onclick="next()"><i class="fas fa-forward"></i></button>
            </div>
        </div>
        <div id="main_description">
            <h4>Set Description</h4>
            <p>{{$card_set->description}}
                <span style="margin-top:2em; display:block;">
                    - Created: {{date('d/m/Y', strtotime($card_set->created_at))}} <br/>
                    - Cards in set: {{count($cards)}}
                </span>
            </p>
        </div>
    </div>


    <div id="cards_cont">
        <table>
            <thead>
                <tr>
                    <th>Front Side</th>
                    <th>Back Side</th>
                    <th>Alt(s)</th>
                    <th>Comment</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cards as $card)
                <tr>
                    <td>{{$card->front}}</td>
                    <td>{{$card->back}}</td>
                    <td>{{$card->alt}}</td>
                    <td>{{$card->comment}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@stop