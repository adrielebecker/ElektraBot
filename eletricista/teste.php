<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/estilo.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <?php
        $matriz = ['titulo' => ['camera', 'gravações'],
                    'texto' => ['texto camera', 'texto gravacoes']];

        foreach($matriz as $value){
            foreach($value as $var){
                echo "<div class='row mt-5'>
                        <div class='col-3'>
                            <a href='' class='link'>
                                <div class='card secundario border-success rounded-4'>
                                    <img src='../img/icones/camera.png' alt='camera' width='50%' class='rounded mx-auto d-block'>
                                    <div class='card-body'>
                                        <h5 class='titulo branco text-center'>{$value</h5>
                                        <p class='texto branco text-center sobre-tam mt-3'>
                                            {$var}
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>";

                var_dump($value);
                var_dump($var);
            }
        }
    ?>
</body>
</html>