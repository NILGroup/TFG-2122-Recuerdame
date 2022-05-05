Dropzone.autoDiscover = false;
var idSesion = document.getElementById('idSesion').value;

$("#mydropzone").dropzone({
  url: "subirImagen.php?idSesion=" + idSesion,
  disablePreviews: true,
  success: function (file, response) {
    var div = '<div class="col-sm-4 p-2">';
    div += '<div class="img-wrap">';
    div += '<a href="gestor.php?eliminarMultimediaSesion&idSesion=' + idSesion + '&idMultimedia=' + response + '" class="clear"><i class="fa-solid fa-circle-xmark text-danger fa-lg"></i></a>';
    div += '<a href="#" class="visualizarImagen"><img src="archivos/' + file.name + '" class="img-responsive-sm card-img-top img-thumbnail multimedia-icon"></a>';
    div += '</div>';
    div += '</div>';
    $('#showMultimedia').append(div);
    this.removeFile(file);
    inicializaImagen();
  },
});

$(document).ready(function () {
  // Inicializar imagen
  inicializaImagen();
});

// Inicializa la imagen para poder visualizarla
function inicializaImagen() {
  $('.visualizarImagen').on('click', function () {
    $('.imagepreview').attr('src', $(this).find('img').attr('src'));
    $('#imagemodal').modal('show');
  });
}