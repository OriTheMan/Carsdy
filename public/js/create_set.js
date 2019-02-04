function addRow(){

    let tableRef = document.getElementById('main_table')
    let realTableLength = tableRef.rows.length -1;
    
    let newRow = tableRef.insertRow(realTableLength); // -1 since the last row contains the button
    let idx = realTableLength;
    newRow.id = 'r' + idx;

    newRow.innerHTML = "<td><input type='text' name='cards[card" + idx + "][front]' maxlength='40'/></td> \
    <td><input type='text' name='cards[card" + idx + "][back]' maxlength='40'/></td> \
    <td><input type='text' name='cards[card" + idx + "][alt]' maxlength='20'/></td> \
    <td><input type='text' name='cards[card" + idx + "][com]' maxlength='30'/></td> \
    <td> \
    <button class='rem_row_but' type='button' onclick='remRow(" + idx + ")'> \
        <i class='far fa-times-circle'></i></button></td>";
}

function remRow(idx){
    document.getElementById("r"+idx).remove();
}