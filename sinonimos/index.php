<?php
require_once __DIR__ .'/../funciones.php';
$link = conectar();
$sql = "SELECT * FROM portales.faq_sinonimos";
$rs = mysqli_query($link,$sql);
$sinonimos = mysqli_fetch_all($rs,MYSQLI_ASSOC);
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <?php include __DIR__.'/partials/head.php' ?>

</head>
<body>
    <?php include __DIR__.'/partials/navbar.php' ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1 class="my-0">Sinonimos</h1>
                <p>Listado de sinonimos y que nutre las FAQs</p>
            </div>
        </div>
        <div class="row">
            <div class="col-12 mb-3">
                <a href="create.php" class="btn btn-sm btn-primary">Nueva Palabra</a>
            </div>
            <div class="col-12">
                <table id="tabla" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Palabras</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($sinonimos as $sinonimo): ?>
                        <tr>
                            <td><?php echo $sinonimo['id'] ?></td>
                            <td><?php echo $sinonimo['palabra'] ?></td>
                            <td class="text-center"><i class="fa fa-plus-circle" aria-hidden="true"></i></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php include __DIR__.'/partials/scripts.php' ?>
    <script>
        $(document).ready(function() {
            $('#tabla').DataTable();
        } );
    </script>
</body>
</html>
