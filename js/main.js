let main = document.getElementsByTagName("main")[0];
let layer = document.createElement("div");

layer.setAttribute("id","layer");
main.appendChild(layer);

let closeB = document.createElement("button");
main.appendChild(closeB);


// make style of div layer
layer.style.width = "90%";
layer.style.height = "300px";
layer.style.backgroundColor = "black";
layer.style.position = "absolute";
layer.style.top = "100px"
layer.style.left = "100px";
layer.style.opacity = "85%";
layer.style.textAlign = "center";
layer.style.color = "red";
layer.style.fontSize = "2rem";

// get layer's text with AJAX request
let httpRequest = new XMLHttpRequest();

httpRequest.onreadystatechange = function() {
    if (httpRequest.readyState === XMLHttpRequest.DONE){
        if(httpRequest.status === 200){

            layer.innerText = httpRequest.responseText;
        }
    }
}
httpRequest.open("GET", "securityReminder.txt", true);
httpRequest.send();


// style of button 
closeB.style.width = "7em";
closeB.style.height = "3em";
closeB.style.backgroundColor = "yellow";
closeB.innerText = "J'ai compris";
closeB.style.position = "relative";
closeB.style.bottom = "475px";
closeB.style.left = "45%";

// function to the button

closeB.addEventListener("click", function(){
    layer.style.display = "none";
    this.style.display = "none";
});