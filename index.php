<!doctype html>
<!--suppress ALL -->
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <?php include __DIR__ . '/partials/head.php' ?>

</head>
<body>
<?php include __DIR__ . '/partials/navbar.php' ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <h1 class="text-center">Buscador de sinonimos</h1>
            </div>
        </div>
    </div>
    <div class="row mb-3 justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <form action="buscador.php" method="get" id="form-buscador">

                        <div class="form-group">
                            <label for="query">Escriba la consulta y se devolveran los Id de los sinonimos guardados para cada palabra</label>
                            <input type="text" id="query" name="query" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">Buscar Sinonimo</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row" id="content-reponse" style="display: none">
        <div class="col">
            <div class="card m-3">
                <div class="card-body">
                    <h5>Resultado:</h5>
                    <div id="response"></div>
                    <p>Estos IDs podran ser agregados a la consulta por base de datos</p>
                </div>
            </div>
        </div>
    </div>
<?php include __DIR__ .'/partials/scripts.php' ?>
<script>
    var form = $('#form-buscador').submit((e)=>{
        $('content-reponse').hide();
        e.preventDefault();
        let el = $(e.target);
        $.get(el[0].action,el.serialize(),(res) => {
            if (res.status === 'success'){
                $('#content-reponse').show();
                if (res.total > 0){
                    let html = '';
                    for (let li of res.data){
                        html += `<li>${li}</li>`
                    }

                    $('#response').html(
                        `<ul>${html}</ul>`
                    );
                }else{
                    $('#response').html(`No se han encontrado sinonimos`);
                }
            }
        });
    });
</script>
</body>
</html>
