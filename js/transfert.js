let accountChoice = document.getElementById("accountToDebit");
let accountToCredit = document.getElementById("accountToCredit");
let pM = document.getElementById("errorM");
let pT = document.getElementById("errorT");
let amounToTransfert = document.getElementById("amounToTransfert");

accountToCredit.addEventListener("focusout", function(){
    let choice = this.value;
    console.log(accountChoice.value);
    for (let i = 0; i < this.length ; i ++) {

        if (accountChoice.value === choice) {
            this.style.borderColor = "red";
            
            pM.innerText = "Veuillez selectionner un compte différent du premier";
        } else {
            this.style.borderColor = "green";
            pM.innerText = "";
        }     
    }
});

amounToTransfert.addEventListener("focusout", function() {
    console.log(this.value);
    if(this.value === ""){
        this.style.borderColor = "red";     
        pT.innerText = "Veuillez rentrer un montant superieur à 0";

    } else {
        this.style.borderColor = "green";
        pT.innerText = "";
    }
})