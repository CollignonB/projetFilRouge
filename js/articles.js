let httpRequest = new XMLHttpRequest();
let cards = document.getElementsByClassName("card");

httpRequest.onreadystatechange = function() {
    if (httpRequest.readyState === XMLHttpRequest.DONE){
        if(httpRequest.status === 200){
            datas = JSON.parse(httpRequest.responseText);
            console.log(cards);
            for (let i = 0; i < cards.length; i ++){
                let cardTitle = cards[i].getElementsByTagName("h5")[0];           
                cardTitle.innerText = datas[i].titre;

                let cardId = cards[i].getElementsByTagName("h6")[0];
                cardId.innerText = datas[i].id;

                let cardContent = cards[i].getElementsByTagName("p")[0];
                cardContent.innerText = datas[i].contenu;
            }
        } else{
            console.log("il y a eu un problème");
        }
    }else{
        console.log("XMLHttpRequest.DONE ne fonction pas");
    }
}
httpRequest.open("GET","https://oc-jswebsrv.herokuapp.com/api/articles", true);
httpRequest.send();




