Dropzone.autoDiscover = false;
var idRecuerdo = document.getElementById('idRecuerdo').value;

$("#mydropzone").dropzone({
  url: "gestor.php?guardarRecuerdo&idRecuerdo=" + idRecuerdo,
  disablePreviews: true,
  success: function (file, response) {
    $('#showMultimedia').append('<div class="col-sm-4 p-2"><div class="img-wrap"><a href="gestor.php?eliminarMultimediaRecuerdo&idRecuerdo=' + idRecuerdo + '&idMultimedia=" class="visualizarImagen"><img src="archivos/' + file.name + '" class="img-responsive-sm card-img-top img-thumbnail multimedia-icon"></a></div></div>');
    this.removeFile(file);
  },
});

$('.visualizarImagen').on('click', function () {
  $('.imagepreview').attr('src', $(this).find('img').attr('src'));
  $('#imagemodal').modal('show');
});