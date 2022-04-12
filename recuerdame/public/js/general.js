//$(document).ready(function () {
Dropzone.autoDiscover = false;
var idDropzone = document.getElementById('idDropzone');

$("#mydropzone").dropzone({
  url: "upload.php?idRecuerdo=52",
  disablePreviews: true,
  success: function (file, response) {
    $('#showMultimedia').append('<div class="col-sm-4 p-2"><a href="gestor.php?eliminarMultimediaRecuerdo&idRecuerdo=' + idDropzone + '&idMultimedia=" class="visualizarImagen"><img src="archivos/' + file.name + '" class="img-responsive-sm card-img-top img-thumbnail multimedia-icon"></a></div>');
    this.removeFile(file);
  },
});

$('.visualizarImagen').on('click', function () {
  $('.imagepreview').attr('src', $(this).find('img').attr('src'));
  $('#imagemodal').modal('show');
});
  //if (idDropzone != null) {
    //Dropzone.options.dropzoneForm
/*var myDropzone = new Dropzone("mydropzone", {
  url: "upload.php",
});*/
  //}
//});

/*$( document ).ready(function() {
  Dropzone.options.dropzoneForm = {
  autoProcessQueue: false,
  init: function () {
    var submitButton = document.getElementById('submit-all');
    myDropzone = this;
    submitButton.addEventListener("click", function () {
      myDropzone.processQueue();
    });
  }
};
});*/