<?php include "controllers/PersonasRelacionadasController.php" ?>

<table class="table table-bordered">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nombre</th>
            <th scope="col">Apellidos</th>
            <th scope="col">Tipo de relación/parentesco</th>
            <th scope="col">Enviar correo electrónico</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        <?php
        $personasRelacionadasController = new PersonasRelacionadasController();
        $lista = $personasRelacionadasController->getListaPersonasRelacionadas();
        $i = 1;
        foreach ($lista as $row) {
        ?>
            <tr>
                <th scope="row"><?php echo $i ?></th>
                <td><a href="verDatosPersonaRelacionada.php?idPersonaRelacionada=<?php echo ($row['idPersonaRelacionada']) ?>"><?php echo ($row['nombre']) ?></a></td>
                <td><?php echo ($row["apellidos"]) ?></td>
                <td><?php echo ($row["nombreTipoRelacion"]) ?></td>
                <td><i class="fa-solid fa-envelope text-black tableIcon"></i></td>
                <td class="tableActions">
                    <a href="verDatosPersonaRelacionada.php?idPersonaRelacionada=<?php echo ($row['idPersonaRelacionada']) ?>"><i class="fa-solid fa-eye text-black tableIcon"></i></a>
                    <a href="modificarDatosPersonaRelacionada.php?idPersonaRelacionada=<?php echo ($row['idPersonaRelacionada']) ?>"><i class="fa-solid fa-pencil text-primary tableIcon"></i></a>
                    <a href="gestor.php?accion=eliminarPersonaRelacionada&idPersonaRelacionada=<?php echo ($row['idPersonaRelacionada']) ?>"><i class="fa-solid fa-trash-can text-danger tableIcon"></i></a>
                </td>
            </tr>
        <?php
            $i++;
        }
        ?>
    </tbody>
</table>