function addRow(){

    let tableRef = document.getElementById('main_table')
    let realTableLength = tableRef.rows.length -1;

    let rows = document.querySelectorAll('[id^="r"]'); // Get all ids that match r* (r1,r2 etc.)
    let lastIdx = parseInt(rows[rows.length - 1].id[1]); // Grab the last index (e.g if last is r3, then lastidx=3)
    let newIdx = lastIdx+1;

    let newRow = tableRef.insertRow(realTableLength);  // Our new row
    newRow.id = 'r' + newIdx;

    newRow.innerHTML = "<td><input type='text' name='cards[card" + newIdx + "][front]' maxlength='100'/></td> \
    <td><input type='text' name='cards[card" + newIdx + "][back]' maxlength='100'/></td> \
    <td><input type='text' name='cards[card" + newIdx + "][alt]' maxlength='100'/></td> \
    <td><input type='text' name='cards[card" + newIdx + "][comment]' maxlength='100'/></td> \
    <td> \
    <button class='rem_row_but' type='button' onclick='remRow(" + newIdx + ")'> \
        <i class='far fa-times-circle'></i></button></td>";
}

function remRow(idx){
    document.getElementById("r"+idx).remove();
}