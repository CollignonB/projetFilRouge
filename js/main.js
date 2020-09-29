let main = document.getElementsByTagName("main")[0];
let Blayer = document.createElement("div");
let layer = document.createElement("div");
let closeB = document.createElement("button");


Blayer.style.backgroundColor="grey";
Blayer.style.opacity = "50%";
Blayer.style.width = "100%";
Blayer.style.height = "100vh";
Blayer.style.position = "fixed";
Blayer.style.left = "0";
Blayer.style.top = "0";
Blayer.style.zIndex = "3001";

layer.style.width ="50%";
layer.style.height = "300px";
layer.style.backgroundColor ="cyan";
layer.style.zIndex ="3002";
layer.style.position = "fixed";
layer.style.left = "25%";
layer.style.top = "10vh";

closeB.style.width = "7em";
closeB.style.height ="3em";
closeB.style.position ="fixed";
closeB.innerText ="J'ai compris";


main.appendChild(Blayer);
main.appendChild(layer);



console.log(closeB);


// get layer's text with AJAX request
let httpRequest = new XMLHttpRequest();

httpRequest.onreadystatechange = function() {
    if (httpRequest.readyState === XMLHttpRequest.DONE){
        if(httpRequest.status === 200){
            
            layer.innerText = httpRequest.responseText;
            layer.appendChild(closeB);
        }
    }
}
httpRequest.open("GET", "securityReminder.txt", true);
httpRequest.send();


// function to the button

closeB.addEventListener("click", function(){
    layer.style.display = "none";
    Blayer.style.display = "none";
    this.style.display = "none";
});