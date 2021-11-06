// récuperation des ids des input
let nom_client= document.getElementById('nom_client');
let prenom_client= document.getElementById('prenom_client');
let adresse_client= document.getElementById('adresse_client');
let phone_client= document.getElementById('phone_client');
let confirme_pass= document.getElementById('confirme_pass');
let password_client= document.getElementById('password_client');

// récuperation des id des divs info
let info_prenom= document.getElementById('info-prenom');
let info_nom= document.getElementById('info-nom');
let info_adresse= document.getElementById('info-adresse');
let info_phone= document.getElementById('info-phone');
let info_confirme= document.getElementById('info-confirme_pass');
let info_password= document.getElementById('info-password');

// déclaration tableau des input et tableau des divs info

let input=[];
input[0] = prenom_client;input[1] = nom_client;input[2] = adresse_client;input[3] = phone_client; input[4] = password_client; input[5] = confirme_pass;

let infos=[];
infos[0] = info_prenom;infos[1] = info_nom;infos[2] = info_adresse;infos[3] = info_phone;infos[4] = info_password;infos[5] = info_confirme;

for (let i = 0; i < input.length; i++) {
    input[i].addEventListener('focus',function(){
        for (let j = 0; j < i; j++) {
            if (input[j].value==="") {
                input[j].style.border="1px solid red";
            }
            else{
                input[j].style.border="1px solid green";
            }
        }
    });
    
}
let pointeur =0;
document.getElementById('inscription').addEventListener('submit',function(e){
    e.preventDefault();

    for (let i = 0; i < input.length; i++) {
        if (input[i].value==="") {
            infos[i].classList.add("alert","alert-danger");
            infos[i].innerText="veuiller remplir ce champ";
            input[i].style.border="1px solid red";
            pointeur++;
        }
        
    }
    
    if (pointeur<=0) {
        if (password_client.value != confirme_pass.value ) {
            info_confirme.classList.add("alert","alert-danger");
            info_confirme.innerText="Les mots de passe ne sont pas identiques";
        }
        else{
            document.getElementById('inscription').submit();
        }
    }
});
