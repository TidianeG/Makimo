let prix_pack_pay= document.getElementById('prix_pack_pay');
let prenom_pay = document.getElementById('prenom_pay');
let nom_pay = document.getElementById('nom_pay');
let adresse_pay = document.getElementById('adresses_pay');
let phone_pay = document.getElementById('phone_pay');
let mail_pay = document.getElementById('mail_pay');

let form_pay = document.getElementById('form_pay');

form_pay.addEventListener('click', function(e){
    e.preventDefault();
    this.sendPaymentInfos (1, 'GN7824','XHU0id6iStE4mltSanm5VvHayoOBgmiiTBlfLGL4wzk1vTxJ5U' ,
                                    'maki-immo.com', '/index' ,'/index' ,100 , 'dakar' , 'gaye95cheikh@gmail.com', 'cheikh', 'gaye', '782101857');
})