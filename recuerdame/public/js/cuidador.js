var myModal = new bootstrap.Modal(document.getElementById('myModal'));
 
let frm = document.getElementById("formulario");

var button = document.getElementById("mybutton");


button.onclick = function(){
    myModal.show();
}