<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vendedores</title>
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Noto+Sans:wght@400;700&display=swap');
    * {
        margin: 0;
        padding: 0;
        color: #fff;
    }

    body {
        background: #212121;
        font-family: 'Noto Sans', sans-serif;
    }
    .quadrado {
        width: 90%;
        margin: 20px auto 0;
    }
    .linha {
        width: 100%;
        padding: 11px;
        box-sizing: border-box;
        margin-bottom: 1px;
        display: flex;
        justify-content: space-between;
    }

    .corCorpo {
        background-color: #009688;
    }

    .corTopo {
        background-color: #005a5f;
    }

    .nTopo {
        width: 100%;
        font-weight: 700;
        font-size: 1.5em;
        text-align: center;
        padding: 10px;
        }

    .nvendedor {
        font-weight: 700;
        font-size: 1.2em;
    }

    .nemail {
        font-weight: 400;
    }
    </style>
</head>
<body>

<div class="quadrado">
    <div class='linha corTopo'>
        <div class='nTopo'>Vendedores</div>
    </div>
    <?php
    $url = "http://localhost/API/api/v1";
    $classe = 'vendedor';
    $metodo = 'mostrar';
    $montar = $url.'/'.$classe.'/'.$metodo;
    $retorno = file_get_contents($montar);
    $json_str=$retorno;
    
    $jsonObj = json_decode($json_str);
    $vendedores = $jsonObj->dados;
    
    foreach ( $vendedores as $e )
    {
        print "
        <div class='linha corCorpo'>
            <div class='nvendedor'>$e->vdNome</div>
            <div class='nemail'>$e->vdEmail</div>
        </div>
        "; 
    }
    ?>

</div>

</body>
</html>