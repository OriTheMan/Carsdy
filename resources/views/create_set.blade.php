@extends('layout')
@section('content')

<div id="container">
    <form action="create_set" method="POST">
        <input id="title_input" type="text" name="set_title" value="My title" maxlength="30"/>

        <table id="main_table">
            <tr>
                <th>Front Side
                <th>Back Side
                <th>Alternative(s)
                <th>Comment
            </tr>
            <tr id="r1">
                <td><input type="text" name="card[card1][front]" maxlength="40"/></td>
                <td><input type="text" name="card[card1][back]" maxlength="40"/></td>
                <td><input type="text" name="card[card1][alt]" maxlength="20"/></td>
                <td><input type="text" name="card[card1][com]" maxlength="30"/></td>
                <td>
                    <button class="rem_row_but" type="button" onclick="remRow(1)">
                        <i class="far fa-times-circle"></i>
                    </button>
                </td>
            </tr>
            <tr>
                <td colspan="4">
                    <button id="add_row_but" type="button" onclick="addRow();">
                        <i class="fas fa-plus-circle"></i> Add Row
                    </button>
                </td>
            </tr>
        </table>

    </form>

</div>
@stop