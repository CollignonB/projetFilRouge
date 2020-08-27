let httpRequest = new XMLHttpRequest();
let tab = document.getElementsByTagName("table")[0];


httpRequest.onreadystatechange = function() {
    if (httpRequest.readyState === XMLHttpRequest.DONE){
        if(httpRequest.status === 200){
            let datas = JSON.parse(httpRequest.responseText);
            addJSONData(datas);
        }
    }
}
httpRequest.open("GET", "stats.JSON", true);
httpRequest.send();

function addJSONData (datas){

    for (const key of datas) {
        trs = tab.insertRow(-1);
        
        for (const data in key) {
            let statsCell = trs.insertCell(-1);
            statsCell.innerText = key[data];
            
        }
    }
}