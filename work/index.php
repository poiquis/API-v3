<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vendedores</title>
    <link rel="stylesheet" href="css/base.css">
    
</head>
<body>

<div class="quadrado">
    <div class='linha'>
        <div class='nTopo'>Vendedores</div>
        <div class='nlink'><a href="adcVendedor.php">Novo venderdor</a></div>
    </div>
    <?php
    $url = "http://localhost/APIv3/api/test_api.php?action=fetch_all";
    $retorno = file_get_contents($url);
    $json_str=$retorno;
    $jsonObj = json_decode($json_str);
    foreach ( $jsonObj as $e )
    {
        $comiss = $e->vdComis;
        if ($comiss == 0) {
            $comiss = "0,00";
        }
        print "
        <a href='mosVendedor.php?id=".$e->vdID."' class='linhaLnk'>
            <div class='nid'>$e->vdID</div>
            <div class='nvendedor'>$e->vdNome</div>
            <div class='nemail'>$e->vdEmail</div>
            <div class='ncomis'>$comiss</div>
        </a>
        "; 
    }
    ?>

</div>

</body>
</html>