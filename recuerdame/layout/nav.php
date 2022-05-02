<html>

<head>
    <link rel="stylesheet" href="public/bootstrap-5.1.3-dist/css/bootstrap.css">
    <link rel="stylesheet" href="public/css/styles.css">
    <link href="public/fontawesome6/css/all.css" rel="stylesheet">
    <script src="public/bootstrap-5.1.3-dist/js/bootstrap.js"></script>
    <title>Recuérdame</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg justify-content-left nav-menu">
        <?php
        if (Session::esTerapeuta()) {
            include "layout/navTerapeuta.php";
        }
        if (Session::esCuidador()) {
            include "layout/navCuidador.php";
        }
        ?>
    </nav>
</body>

</html>