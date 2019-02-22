@extends('layout')
@push('styles')
    <link rel="stylesheet" type="text/css" href={{ URL::asset('css/create_set.css') }}>
@endpush
@push('scripts')
    <script type="text/javascript" src={{ URL::asset('js/create_set.js') }}></script>
@endpush
@section('content')
<div id="container">
    <form action="create_set" method="POST">
    @csrf

        <input id="title_input" type="text" name="title" value="My title" maxlength="50"/>
        @if ($errors->has('title'))
            <div class="error"><span class="fas fa-times error_icon"></span> {{ $errors->first('title') }}</div>
        @endif

        <table id="main_table">
            <tr>
                <th>Front Side
                <th>Back Side
                <th>Alternative(s)
                <th>Comment
            </tr>
            @if(old('cards') !== null)
                @foreach (old('cards') as $key => $card)
                    <tr id={{'r'.substr($key, -1)}}>
                        <td><input type="text" name="cards[{{$key}}][front]" maxlength="100" value={{old('cards.'.$key.'.front')}}></td>
                        <td><input type="text" name="cards[{{$key}}][back]" maxlength="100" value={{old('cards.'.$key.'.back')}}></td>
                        <td><input type="text" name="cards[{{$key}}][alt]" maxlength="100" value={{old('cards.'.$key.'.alt')}}></td>
                        <td><input type="text" name="cards[{{$key}}][comment]" maxlength="100" value={{old('cards.'.$key.'.comment')}}></td>
                        <td>
                            <button class="rem_row_but" type="button" onclick="remRow({{substr($key, -1)}})">
                                <i class="far fa-times-circle"></i>
                            </button>
                        </td>
                    </tr>
                @endforeach
            @else
            <tr id="r1">
                <td><input type="text" name="cards[card1][front]" maxlength="100" value={{old('cards.card1.front')}}></td>
                <td><input type="text" name="cards[card1][back]" maxlength="100" value={{old('cards.card1.back')}}></td>
                <td><input type="text" name="cards[card1][alt]" maxlength="100" value={{old('cards.card1.alt')}}></td>
                <td><input type="text" name="cards[card1][comment]" maxlength="100" value={{old('cards.card1.comment')}}></td>
                <td>
                    <button class="rem_row_but" type="button" onclick="remRow(1)">
                        <i class="far fa-times-circle"></i>
                    </button>
                </td>
            </tr>
            @endif
            <tr>
                <td colspan="4">
                    <button class="interact_but" type="button" onclick="addRow();">
                        <i class="fas fa-plus-circle"></i> Add Row
                    </button>
                </td>
            </tr>
        </table>
        @if ($errors->has('cards'))
            <div class="error"><span class="fas fa-times error_icon"></span> {{ $errors->first('cards') }}</div>
        @else
            @if ($errors->has('cards.*.front'))
                <div class="error"><span class="fas fa-times error_icon"></span> {{ $errors->first('cards.*.front') }}</div>
            @endif
            @if ($errors->has('cards.*.back'))
                <div class="error"><span class="fas fa-times error_icon"></span> {{ $errors->first('cards.*.back') }}</div>
            @endif
        @endif
        @if ($errors->has('description'))
            <div class="error"><span class="fas fa-times error_icon"></span> {{ $errors->first('description') }}</div>
        @endif
        <div id="options_cont">
            <label for="description" class="option_label">Short Description</label>
            <textarea id="set_desc" name="description" rows="5" maxlength="300" placeholder="description">{{old('description')}}</textarea>  

            <label for="access" class="option_label">Access</label>
            <select id="access_dd" name="access">    
                <option value="public">Public</option>
                <option value="private">Private</option>
            </select>
        </div>

        <button type="submit" class="interact_but"><i class="fas fa-share"></i>  Create</button>
    </form>

</div>
@stop