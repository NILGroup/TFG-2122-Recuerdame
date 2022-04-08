<html>

<head>
    <link rel="stylesheet" href="public/bootstrap-5.1.3-dist/css/bootstrap.css">
    <script src="public/bootstrap-5.1.3-dist/js/bootstrap.js"></script>
    <link href="public/fontawesome6/css/all.css" rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href="public/img/Logo_recuerdame_v2.ico" />
    <link rel="stylesheet" type="text/css" href="public/css/styles.css">
    <script src="public/js/general.js" defer></script>
    <meta charset="utf-8" />
    <title>Recuerdame</title>
</head>

<body class="d-flex flex-column min-vh-100">
    <?php include "layout/header.php" ?>
    <?php include "layout/nav.php" ?>
    <?php include "controllers/RecuerdosController.php" ?>
    <?php include "controllers/ComunesController.php" ?>
    <?php include "controllers/PersonasRelacionadasController.php" ?>

    <div class="container-fluid">
        <?php
        if (isset($_GET['idRecuerdo'])) {
            $recuerdosController = new RecuerdosController();
            $recuerdo = $recuerdosController->verRecuerdo($_GET['idRecuerdo']);
        } else {
            $recuerdo = new Recuerdo();
            $recuerdo->setFecha(date('Y-m-d'));
        }

        $idRecuerdo = null;
        if ($recuerdo->getIdRecuerdo() != null) {
            $idRecuerdo = $recuerdo->getIdRecuerdo();
            $desdeModificar = "modificarDatosRecuerdo.php?idRecuerdo=".$idRecuerdo;
        }
        $comunesController = new ComunesController();
        $listaEstados = $comunesController->getListaEstados();
        $listaEtiquetas = $comunesController->getListaEtiquetas();
        $listaEtapas = $comunesController->getListaEtapas();
        $listaEmociones = $comunesController->getListaEmociones();
        $listaCategorias = $comunesController->getListaCategorias();
        ?>
        <div class="pt-4 pb-2">
            <h5 class="text-muted">Datos del recuerdo</h5>
            <hr class="lineaTitulo">
        </div>

        <form action="gestor.php?idRecuerdo=<?php echo ($recuerdo->getIdRecuerdo()) ?>" method="POST">
            <div>
                <div class="row form-group justify-content-between">
                    <div class="row col-sm-6 col-md-6 col-lg-6">
                        <label for="nombre" class="form-label col-form-label-sm col-sm-3 col-md-2 col-lg-2">Nombre<span class="asterisco">*</span></label>
                        <div class="col-sm-9 col-md-10 col-lg-5">
                            <input required maxlength="50" type="text" class="form-control form-control-sm" id="nombre" name="nombre" value="<?php echo ($recuerdo->getNombre()) ?>">
                        </div>
                    </div>

                    <div class="row col-sm-6 col-md-6 col-lg-6">
                        <label for="estado" class="form-label col-form-label-sm col-sm-3 col-md-2 col-lg-2">Estado</label>
                        <div class="col-sm-9 col-md-6 col-lg-4">
                            <select class="form-select form-select-sm" id="idEstado" name="idEstado">
                                <option></option>
                                <?php
                                foreach ($listaEstados as $row) {
                                ?>
                                    <option value="<?php echo ($row["id_estado"]) ?>" <?php if ($recuerdo->getIdEstado() == $row['id_estado']) echo 'selected="selected" '; ?>><?php echo ($row["nombre"]) ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row justify-content-between">
                    <div class="row col-sm-6 col-md-6 col-lg-6">
                        <label for="fecha" class="form-label col-form-label-sm col-sm-3 col-md-2 col-lg-2">Fecha<span class="asterisco">*</span></label>
                        <div class="col-sm-9 col-md-6 col-lg-4">
                            <input type="date" class="form-control form-control-sm" id="fecha" name="fecha" value="<?php echo ($recuerdo->getFecha()) ?>">
                        </div>
                    </div>
                    <div class="row col-sm-6 col-md-6 col-lg-6">
                        <label for="etiqueta" class="form-label col-form-label-sm col-sm-3 col-md-2 col-lg-2">Etiqueta</label>
                        <div class="col-sm-9 col-md-6 col-lg-4">
                            <select class="form-select form-select-sm" id="idEtiqueta" name="idEtiqueta">
                                <option></option>
                                <?php
                                foreach ($listaEtiquetas as $row) {
                                ?>
                                    <option value="<?php echo ($row["id_etiqueta"]) ?>" <?php if ($recuerdo->getIdEtiqueta() == $row['id_etiqueta']) echo 'selected="selected" '; ?>><?php echo ($row["nombre"]) ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="row col-sm-12 col-md-12 col-lg-12">
                        <label for="puntuacion" class="form-label col-form-label-sm col-sm-2 col-md-2 col-lg-1">Puntuación</label>
                        <div class="col-sm-5 col-md-5 col-lg-2">
                            <input type="range" class="form-range" id="puntuacion" name="puntuacion" min="0" max="5" step="0.5">
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="descripcion" class="form-label col-form-label-sm">Descripción</label>
                    <textarea class="form-control form-control-sm" id="descripcion" name="descripcion" rows="3"><?php echo ($recuerdo->getDescripcion()) ?></textarea>
                </div>

                <div class="row justify-content-between">
                    <div class="row">
                        <label for="etapa" class="form-label col-form-label-sm col-sm-3 col-md-2 col-lg-2">Etapa de la vida<span class="asterisco">*</span></label>
                        <div class="col-sm-3 col-md-3 col-lg-2">
                            <select class="form-select form-select-sm" id="idEtapa" name="idEtapa">
                                <?php
                                foreach ($listaEtapas as $row) {
                                ?>
                                    <option value="<?php echo ($row["id_etapa"]) ?>" <?php if ($recuerdo->getIdEtapa() == $row['id_etapa']) echo 'selected="selected" '; ?>><?php echo ($row["nombre"]) ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>

                        <label for="emocion" class="form-label col-form-label-sm col-sm-2 col-md-12col-lg-1">Emoción</label>
                        <div class="col-sm-3 col-md-3 col-lg-2">
                            <select class="form-select form-select-sm" id="idEmocion" name="idEmocion">
                                <option></option>
                                <?php
                                foreach ($listaEmociones as $row) {
                                ?>
                                    <option value="<?php echo ($row["id_emocion"]) ?>" <?php if ($recuerdo->getIdEmocion() == $row['id_emocion']) echo 'selected="selected" '; ?>><?php echo ($row["nombre"]) ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>

                        <label for="categoria" class="form-label col-form-label-sm col-sm-3 col-md-2 col-lg-1">Categoría</label>
                        <div class="col-sm-3 col-md-3 col-lg-2">
                            <select class="form-select form-select-sm" id="idCategoria" name="idCategoria">
                                <option></option>
                                <?php
                                foreach ($listaCategorias as $row) {
                                ?>
                                    <option value="<?php echo ($row["id_categoria"]) ?>" <?php if ($recuerdo->getIdCategoria() == $row['id_categoria']) echo 'selected="selected" '; ?>><?php echo ($row["nombre"]) ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="localizacion" class="form-label col-form-label-sm">Localización</label>
                    <textarea maxlength="255" class="form-control form-control-sm" id="localizacion" name="localizacion" rows="3"><?php echo ($recuerdo->getLocalizacion()) ?></textarea>
                </div>

                <div class="pt-4 pb-2">
                    <h5 class="text-muted">Listado de personas relacionadas</h5>
                    <hr class="lineaTitulo">
                </div>
                <div class="row">
                    <div class="col-12 justify-content-end d-flex p-2">
                        <a aria-disabled="true" href="modificarDatosPersonaRelacionada.php?ventanaDesde=<?php echo($desdeModificar) ?>" class="pe-2"><button type="button" class="btn btn-success btn-sm" <?php if ($recuerdo->getIdRecuerdo() == null) echo 'disabled '; ?>>+</button></a>
                        <?php
                        if ($recuerdo != null && $recuerdo->getIdRecuerdo() != null) {
                        ?>
                            <a href="listadoPersonasRelacionadasRecuerdo.php?idRecuerdo=<?php echo ($recuerdo->getIdRecuerdo()) ?>" class="pe-2" <?php if ($recuerdo->getIdRecuerdo() == null) echo 'disabled '; ?>><button type="button" class="btn btn-success btn-sm">Añadir existente</button></a>
                        <?php } else { ?>
                            <a href="listadoPersonasRelacionadasRecuerdo.php" class="pe-2"><button type="button" class="btn btn-success btn-sm" <?php if ($recuerdo->getIdRecuerdo() == null) echo 'disabled '; ?>>Añadir existente</button></a>
                        <?php } ?>
                    </div>
                </div>

                <div>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Apellidos</th>
                                <th scope="col">Tipo de relación/parentesco</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $personasRelacionadasController = new PersonasRelacionadasController();
                            $lista = array();
                            if ($recuerdo != null && $recuerdo->getIdRecuerdo() != null) {
                                $lista = $personasRelacionadasController->getListaPersonasRelacionadasRecuerdo($idRecuerdo);
                            }
                            $i = 1;
                            foreach ($lista as $row) {
                            ?>
                                <tr>
                                    <th scope="row"><?php echo $i ?></th>
                                    <td><a href="verDatosPersonaRelacionada.php?idPersonaRelacionada=<?php echo ($row['idPersonaRelacionada'])?>&ventanaDesde=<?php echo($desdeModificar) ?>"><?php echo ($row['nombre']) ?></a></td>
                                    <td><?php echo ($row["apellidos"]) ?></td>
                                    <td><?php echo ($row["nombreTipoRelacion"]) ?></td>
                                    <td class="tableActions">
                                        <a href="verDatosPersonaRelacionada.php?idPersonaRelacionada=<?php echo ($row['idPersonaRelacionada'])?>&ventanaDesde=<?php echo($desdeModificar) ?>"><i class="fa-solid fa-eye text-black tableIcon"></i></a>
                                        <a href="modificarDatosPersonaRelacionada.php?idPersonaRelacionada=<?php echo ($row['idPersonaRelacionada']) ?>&ventanaDesde=<?php echo($desdeModificar) ?>"><i class="fa-solid fa-pencil text-primary tableIcon"></i></a>
                                        <a ref="#" data-href="gestor.php?accion=eliminarPersonaRelacionadaRecuerdo&idPersonaRelacionada=<?php echo ($row['idPersonaRelacionada']) ?>&idRecuerdo=<?php echo ($idRecuerdo) ?>" data-toggle="modal" data-target="#confirm-delete"><i class="fa-solid fa-trash-can text-danger tableIcon"></i></a>
                                    </td>
                                </tr>
                            <?php
                                $i++;
                            }
                            ?>
                        </tbody>
                    </table>
                </div>

                <div class="pt-4 pb-2">
                    <h5 class="text-muted">Material</h5>
                    <hr class="lineaTitulo">
                </div>

                <section class="droparea">
                    <i class="fa-solid fa-cloud-arrow-up"></i>
                    <p><small>Arrastrar y soltar</small></p>
                </section>

                <div>
                    <button type="submit" name="guardarRecuerdo" value="Guardar" class="btn btn-outline-primary btn-sm">Guardar</button>
                    <a href="listadoRecuerdos.php"><button type="button" class="btn btn-primary btn-sm">Atrás</button></a>
                </div>
            </div>
        </form>
    </div>
    <?php include "layout/footer.php" ?>

</body>

</html>