<html>

<head>
    <link rel="stylesheet" href="public/bootstrap-5.1.3-dist/css/bootstrap.css">
    <link rel="stylesheet" href="public/css/styles.css">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <script src="https://kit.fontawesome.com/d1ab37e54e.js" crossorigin="anonymous"></script>
    <script src="public/bootstrap-5.1.3-dist/js/bootstrap.js"></script>
    <title>Recuerdame</title>
</head>

<body>
    <?php include "layout/header.php" ?>
    <?php include "layout/nav.php" ?>
    <?php include "layout/footer.php" ?>
    <?php include "controllers/InformeSeguimientoController.php" ?>

    <div class="container-fluid">
        <?php
            if (!empty($_GET['idInforme'])) {
                $informeSeguimientoController = new InformeSeguimientoController();
                $informeSeguimiento = $informeSeguimientoController->verInformeSeguimiento($_GET['idInforme']);
            }
        ?>

        <div class="pt-4 pb-2">
            <h5 class="text-muted">Datos informe de seguimiento</h5>
            <hr class="lineaTitulo">
        </div>

        <div class="row">
            <label for="fecha" class="form-label col-form-label-sm col-sm-3 col-md-2 col-lg-2">Fecha:</label>
            <div class="col-sm-9 col-md-6 col-lg-2">
                <input disabled type="date" class="form-control form-control-sm" id="fecha" value="<?php echo ($informeSeguimiento['fecha']) ?>">
            </div>
        </div>
        <div class="row">
            <label for="escalas" class="form-label col-form-label-sm col-sm-3 col-md-2 col-lg-2"><b>Escalas:</b></label>
        </div>
        <div class="row">
            <label for="escala" class="form-label col-form-label-sm col-sm-3 col-md-2 col-lg-2"><b>Escala:</b></label>
            <label for="valor" class="form-label col-form-label-sm col-sm-3 col-md-2 col-lg-2"><b>Valor:</b></label>
            <label for="fecha" class="form-label col-form-label-sm col-sm-3 col-md-2 col-lg-2"><b>Fecha:</b></label>
            
        </div>
        <div class="row">
            <label for="GDS" class="form-label col-form-label-sm col-sm-3 col-md-2 col-lg-2">GDS:</label>
            <div class="col-sm-9 col-md-6 col-lg-2">
                 <input type="text" disabled class="form-control form-control-sm" id="valor" value="<?php echo ($informeSeguimiento['gds']) ?>">
            </div>
            <div class="col-sm-9 col-md-6 col-lg-2">
                <input disabled type="date" class="form-control form-control-sm" id="gds_fecha" value="<?php echo ($informeSeguimiento['gds_fecha']) ?>">
            </div>
        </div>
        <div class="row">
            <label for="Mental" class="form-label col-form-label-sm col-sm-3 col-md-2 col-lg-2">Mini mental/MEC de Lobo:</label>
            <div class="col-sm-9 col-md-6 col-lg-2">
                 <input type="text" disabled class="form-control form-control-sm" id="valor" value="<?php echo ($informeSeguimiento['mental']) ?>">
            </div>
            <div class="col-sm-9 col-md-6 col-lg-2">
                <input disabled type="date" class="form-control form-control-sm" id="mental_fecha" value="<?php echo ($informeSeguimiento['mental_fecha']) ?>">
            </div>
        </div>
        <div class="row">
            <label for="CDR" class="form-label col-form-label-sm col-sm-3 col-md-2 col-lg-2">CDR:</label>
            <div class="col-sm-9 col-md-6 col-lg-2">
                 <input type="text" disabled class="form-control form-control-sm" id="valor" value="<?php echo ($informeSeguimiento['cdr']) ?>">
            </div>
            <div class="col-sm-9 col-md-6 col-lg-2">
                <input disabled type="date" class="form-control form-control-sm" id="cdr_fecha" value="<?php echo ($informeSeguimiento['cdr_fecha']) ?>">
            </div>
        </div>
        <?php 
        if(!empty($informeSeguimiento['nombre_escala'])){
        ?>
            <div class="row">
                <label for="Otra_escala" class="form-label col-form-label-sm col-sm-3 col-md-2 col-lg-2"><b>Otra escala:</b></label>
            </div>
            <div class="row">
                <label for="escala" class="form-label col-form-label-sm col-sm-3 col-md-2 col-lg-2"><b>Escala:</b></label>
                <label for="valor" class="form-label col-form-label-sm col-sm-3 col-md-2 col-lg-2"><b>Valor:</b></label>
                <label for="fecha" class="form-label col-form-label-sm col-sm-3 col-md-2 col-lg-2"><b>Fecha:</b></label>
            
            </div>
        
        <div class="row">
            <div class="col-sm-9 col-md-6 col-lg-2">
                 <input type="text" disabled class="form-control form-control-sm" id="nombre" value="<?php echo ($informeSeguimiento['nombre_escala']) ?>">
            </div>
            <div class="col-sm-9 col-md-6 col-lg-2">
                 <input type="text" disabled class="form-control form-control-sm" id="valor" value="<?php echo ($informeSeguimiento['escala']) ?>">
            </div>
            <div class="col-sm-9 col-md-6 col-lg-2">
                <input disabled type="date" class="form-control form-control-sm" id="escala_fecha" value="<?php echo ($informeSeguimiento['fecha_escala']) ?>">
            </div>
        </div>
        <?php 
        }
        ?>
        <div class="mb-3">
            <label for="diagnostico" class="form-label col-form-label-sm">Diagnostico:</label>
            <textarea disabled class="form-control form-control-sm" id="diagnostico" rows="1"><?php echo ($informeSeguimiento['diagnostico']) ?></textarea>
        </div>
        <div class="mb-3">
            <label for="observaciones" class="form-label col-form-label-sm">Observaciones:</label>
            <textarea disabled class="form-control form-control-sm" id="observaciones" rows="1"><?php echo ($informeSeguimiento['observaciones']) ?></textarea>
        </div>

    </div>
</body>