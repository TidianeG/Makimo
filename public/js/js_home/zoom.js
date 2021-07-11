function agrandir() {
    var myImg = document.getElementById("myImg");
    var width = myImg.clientWidth;
    if (width == 900) {
        alert("Vous avez atteint le niveau de zoom maximal.");
    } else {
        myImg.style.width = (width + 20) + "px";
    }
}
function diminuer() {
    var myImg = document.getElementById("myImg");
    var width = myImg.clientWidth;
    if (width == 100) {
        alert("Vous avez atteint le niveau de zoom minimal.");
    } else {
        myImg.style.width = (width - 20) + "px";
    }
}