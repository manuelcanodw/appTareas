<?php

include_once "conetion.php";

$estados = ["darkred"=>"urgente", "darkblue"=>"pendiente", "darkgreen"=>"ejecutandose", "orange"=>"finalizada"];

$select = "SELECT * FROM tareas";

$select_prepare = $conn->prepare($select);
$select_prepare->execute();

$resultado_select = $select_prepare->fetchAll();

// print_r($resultado_select);


?>



<!DOCTYPE html>
<html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>gestor_de_tareas</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">
    </head>

    <body>

        <header>
            <h1 class="text-center">GESTOR DE TAREAS</h1>
        </header>

        <main class="container my-5">

            <div class="row gx-5">
                <section class="col-sm-6 section1">
                    <?php foreach ($resultado_select as $row): ?>
                        <div class="row alert" style='color: white; background-color: <?= $row["color"] ?>'>
                        <!-- <?php echo $row["usuario"] . " : " . $row["color"] ?> -->
                        <div class="col-sm-9">
                            <?= $row["titulo"] . " : " . $row["descripcion"] . " : " . $row["estado"]?>
                        </div>
                        <div class="col-sm-3 text-end">
                            <a href="index.php?id=<?= $row["id_tarea"] ?>&titulo=<?=$row["titulo"] ?>&descripcion=<?= $row["descripcion"] ?>">✏️</a>
                            <a href="delete.php?id=<?= $row["id"] ?>">🗑️</a>

                        </div>

                    </div>

                <?php endforeach ?>

                </section>

                <section class="sol-sm-6 section2">

                <form method="GET" action="">
                    <fieldset>
                        <legend>NUEVA TAREA</legend>
                    <hr>
                        <div class="mb-3">
                            <label for="titulo" class="form-label">Titulo:</label>
                            <input type="text" name="titulo" class="form-control" id="titulo" aria-describedby="introduce el titulo de la nueva tarea">
                        </div>

                        <div class="mb-3">
                            <label for="descripcion" class="form-label">Descripcion</label>
                            <input type="text" name="descripcion" class="form-control" id="descripcion" aria-describedby="descripcion de la tarea">
                        </div>

                        <div class="mb-3">
                            <label for="color" class="form-label">Estado de la tarea:</label>
                            <select name="estado" id="estado">
                                        <option value="darkred">urgente</option>
                                        <option value="darkblue" selected>pendiente</option>                                   
                                        <option value="darkgreen">ejecutandose</option>
                                        <option value="orange">finalizada</option>
                            </select>
                        </div>

                        <div class="row gap-3">
                            <button type="submit" name="insertar" class="col btn btn-primary">Submit</button>
                            <button type="reset" class="col btn btn-danger">Reset</button>
                        </div>

                    </fieldset>
                </form>
                </section>
                
            </div>

            <?php 
            if(isset($_GET['insertar'])){
                $titulo = $_GET['titulo'];
            
                echo "$titulo";
            }
            
            ?>

        </main>



    </body>

</html>