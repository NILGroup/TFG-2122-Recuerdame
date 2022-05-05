// Componente para soltar y arrastrar imágenes
Dropzone.autoDiscover = false;
var idRecuerdo = document.getElementById('idRecuerdo').value;

$("#mydropzone").dropzone({
  url: "subirImagen.php?idRecuerdo=" + idRecuerdo,
  disablePreviews: true,
  success: function (file, response, data) {
    var div = '<div class="col-sm-4 p-2">';
    div += '<div class="img-wrap">';
    div += '<a href="gestor.php?eliminarMultimediaRecuerdo&idRecuerdo=' + idRecuerdo + '&idMultimedia=' + response + '" class="clear"><i class="fa-solid fa-circle-xmark text-danger fa-lg"></i></a>';
    div += '<a href="#" class="visualizarImagen"><img src="archivos/' + file.name + '" class="img-responsive-sm card-img-top img-thumbnail multimedia-icon"></a>';
    div += '</div>';
    div += '</div>';
    $('#showMultimedia').append(div);
    this.removeFile(file);
    inicializaImagen();
  },
});

$(document).ready(function () {
  // Inicializa el componente de la puntuación del recuerdo
  inicializaPuntuacion();

  // Inicializar imagen
  inicializaImagen();
});

// Inicializa el componente de puntuación del recuerdo
function inicializaPuntuacion() {
  $('input[type="range"]').rangeslider({
    polyfill: false,
    onInit: function () {
      $("#valorPuntuacion").text(this.$element.val());
    },
    onSlide: function (position, value) {
      $("#valorPuntuacion").text(value);
    }
  });
}

// Inicializa la imagen para poder visualizarla
function inicializaImagen() {
  $('.visualizarImagen').on('click', function () {
    $('.imagepreview').attr('src', $(this).find('img').attr('src'));
    $('#imagemodal').modal('show');
  });
}