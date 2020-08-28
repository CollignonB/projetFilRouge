let httpRequest = new XMLHttpRequest();

httpRequest.onreadystatechange = function() {
    if (httpRequest.readyState === XMLHttpRequest.DONE){
        if(httpRequest.status === 200){
            let datas = JSON.parse(httpRequest.responseText);
            console.log(datas);
        } else{
            console.log("il y a eu un problème");
        }
    }else{
        console.log("XMLHttpRequest.DONE ne fonction pas");
    }
}
httpRequest.open("GET","https://oc-jswebsrv.herokuapp.com/api/articles", true);
httpRequest.send();