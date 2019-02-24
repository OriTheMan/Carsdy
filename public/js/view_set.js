let index = 0;



function previous(){

    if(index > 0){
        index--;
        showCur();
    }
}

function change(){


}

function next(){
    
    let tableLength = document.getElementsByTagName("tbody")[0].rows.length;
    if(index < tableLength - 1){
        index++;
        showCur();
    }
}

function showCur(){
    let cardWord = document.getElementById("card_word");
    cardWord.innerHTML = getRow(index).cells[0].innerText;
}

function getRow(row){
    let tbody = document.getElementsByTagName("tbody")[0];
    return tbody.rows[row];
}