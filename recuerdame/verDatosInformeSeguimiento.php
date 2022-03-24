<html>

<head>
    <link rel="stylesheet" href="public/bootstrap-5.1.3-dist/css/bootstrap.css">
    <link rel="stylesheet" href="public/css/styles.css">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <script src="https://kit.fontawesome.com/d1ab37e54e.js" crossorigin="anonymous"></script>
    <script src="public/bootstrap-5.1.3-dist/js/bootstrap.js"></script>
    <title>Recuerdame</title>
</head>

<body class="d-flex flex-column min-vh-100">
    <?php include "layout/header.php" ?>
    <?php include "layout/nav.php" ?>
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
                <input disabled type="date" class="form-control form-control-sm" id="fecha" value="<?php echo ($informeSeguimiento->getFecha()) ?>">
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
                 <input type="number" disabled class="form-control form-control-sm" id="gds" name="gds" value="<?php echo ($informeSeguimiento->getGds()) ?>">
            </div>
            <div class="col-sm-9 col-md-6 col-lg-2">
                <input disabled type="date" class="form-control form-control-sm" id="gds_fecha" name="gds_fecha" value="<?php echo ($informeSeguimiento->getFechaGds()) ?>">
            </div>
        </div>
        <div class="row">
            <label for="Mental" class="form-label col-form-label-sm col-sm-3 col-md-2 col-lg-2">Mini mental/MEC de Lobo:</label>
            <div class="col-sm-9 col-md-6 col-lg-2">
                 <input type="number" disabled class="form-control form-control-sm"id="mental" name="mental" value="<?php echo ($informeSeguimiento->getMental()) ?>">
            </div>
            <div class="col-sm-9 col-md-6 col-lg-2">
                <input disabled type="date" class="form-control form-control-sm" id="mental_fecha" name="mental_fecha" value="<?php echo ($informeSeguimiento->getFechaMental()) ?>">
            </div>
        </div>
        <div class="row">
            <label for="CDR" class="form-label col-form-label-sm col-sm-3 col-md-2 col-lg-2">CDR:</label>
            <div class="col-sm-9 col-md-6 col-lg-2">
                 <input type="number" disabled class="form-control form-control-sm" id="cdr" name="cdr" value="<?php echo ($informeSeguimiento->getCdr()) ?>">
            </div>
            <div class="col-sm-9 col-md-6 col-lg-2">
                <input disabled type="date" class="form-control form-control-sm" id="cdr_fecha" name="cdr_fecha" value="<?php echo ($informeSeguimiento->getFechaCdr()) ?>">
            </div>
        </div>
        <?php 
        if(!empty($informeSeguimiento->getNombreEscala())){
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
                 <input type="text" disabled class="form-control form-control-sm" id="nombre_escala" name="nombre_escala" value="<?php echo ($informeSeguimiento->getNombreEscala()) ?>">
            </div>
            <div class="col-sm-9 col-md-6 col-lg-2">
                 <input type="number" disabled class="form-control form-control-sm"id="escala" name="escala" value="<?php echo ($informeSeguimiento->getEscala()) ?>">
            </div>
            <div class="col-sm-9 col-md-6 col-lg-2">
                <input disabled type="date" class="form-control form-control-sm" id="fecha_esacala" name="fecha_escala" value="<?php echo ($informeSeguimiento->getFechaEscala()) ?>">
            </div>
        </div>
        <?php 
        }
        ?>
        <div class="mb-3">
            <label for="diagnostico" class="form-label col-form-label-sm">Diagnostico:</label>
            <textarea disabled class="form-control form-control-sm"id="diagnostico" name="diagnostico" rows="1"><?php echo ($informeSeguimiento->getDiagnostico()) ?></textarea>
        </div>
        <div class="mb-3">
            <label for="observaciones" class="form-label col-form-label-sm">Observaciones:</label>
            <textarea disabled class="form-control form-control-sm" id="observaciones" name="observaciones" rows="1"><?php echo ($informeSeguimiento->getObservaciones()) ?></textarea>
        </div>

        <div>
            <a href="listadoInformesSeguimiento.php"><button type="button" class="btn btn-primary btn-sm">Atr�s</button></a>
            <a href="generarPDFInformeSeguimiento.php?idInforme=<?php echo ($informeSeguimiento->getIdEvaluacion())?>"><button type="button" class="btn btn-primary btn-sm">Generar PDF</button></a>
        </div>

    </div>
    <?php include "layout/footer.php" ?>
</body>