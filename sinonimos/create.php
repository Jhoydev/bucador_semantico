<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <?php include __DIR__ . '/../partials/head.php' ?>

</head>
<body>
<?php include __DIR__ . '/../partials/navbar.php' ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <h1 class="my-0">Crear Palabra</h1>
            <p>Sinonima</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-5">
            <div class="card">
                <div class="card-body">
                    <form action="store.php">
                        <label for="sinonimo">Palabra</label>
                        <input type="text" class="form-control">
                        <button type="submit" class="btn- btn-sm btn-primary btn-block my-3">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
