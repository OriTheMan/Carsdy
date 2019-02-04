@extends('layout')
@section('content')

<div id="container">
    <form action="create_set" method="POST">
        <input id="title_input" type="text" name="title" value="My title" maxlength="30"/>

        <table id="main_table">
            <tr>
                <th>Front Side
                <th>Back Side
                <th>Alternative(s)
                <th>Comment
            </tr>
            <tr id="r1">
                <td><input type="text" name="cards[card1][front]" maxlength="40"/></td>
                <td><input type="text" name="cards[card1][back]" maxlength="40"/></td>
                <td><input type="text" name="cards[card1][alt]" maxlength="20"/></td>
                <td><input type="text" name="cards[card1][com]" maxlength="30"/></td>
                <td>
                    <button class="rem_row_but" type="button" onclick="remRow(1)">
                        <i class="far fa-times-circle"></i>
                    </button>
                </td>
            </tr>
            <tr>
                <td colspan="4">
                    <button class="interact_but" type="button" onclick="addRow();">
                        <i class="fas fa-plus-circle"></i> Add Row
                    </button>
                </td>
            </tr>
        </table>

        <div id="options_cont">
            <label for="description" class="option_label">Short Description</label>
            <textarea id="set_desc" name="description" rows="5"></textarea>  

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