<?php
$id=$_GET["id"];
$api_url = "http://localhost/APIv3/api/test_api.php?action=fetch_single&id=".$id."";
$client = curl_init($api_url);
curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
$retorno = curl_exec($client);
$obj = json_decode($retorno);
$comiss = $obj->vdComis;
if ($comiss == 0) {
    $comiss = "0,00";
}else{
    $comiss = $obj->vdComis;
    $Valor = $comiss/100;
    $Valor2 = number_format($Valor, 2, ',', '.');
}
?>
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
    print "
    <div class='linhaTpo'>
        <div class='nid'>$obj->vdID</div>
        <div class='nvendedor'>$obj->vdNome</div>
        <div class='nemail'>$obj->vdEmail</div>
        <div class='ncomis'>$comiss</div>
    </div>
    
    ";

    ?>
    <div class="corpoVda">
        <div class="lnVendas">

        <?php
        $url = "http://localhost/APIv3/api/test_api.php?action=fetch_allv&id=".$id."";
        $retorno = file_get_contents($url);
        $json_str=$retorno;
        $jsonObj = json_decode($json_str);
        $valorSoma=0;
        if ($jsonObj !=""){
            foreach ( $jsonObj as $e )
            {
                // $valor=$e->veValor;
                // $Valor = number_format($Valor, 2, ',', '.');
                $Valor = preg_replace ('/[^[:alnum:]_.-]/','',$e->veValor);
                $Valor1 = $Valor/100;
                $Valor2 = number_format($Valor1, 2, ',', '.');
                /*
                */
                
                print "
                <div class='vdaItem'>
                <div class='itmVda'>$e->veProuto</div>
                <div class='itmVdaVal'>$Valor2</div>
                </div>
                "; 
                $valorSoma=$Valor+$valorSoma;
            }
            $valorSoma1 = $valorSoma/100;
            $valorSoma2 = number_format($valorSoma1, 2, ',', '.');
            print "
            <div class='vdaItem'>
            <div class='itmVda'>Total em Vendas</div>
            <div class='itmVdaVal'>$valorSoma2</div>
            </div>
            "; 
        }
        ?>

        
            
        </div>
        <div class="btnVendas">
            <a href="adcVenda.php?id=<?php echo $id?>" class="btnVda">Adicionar nova compra</a>
        </div>
    </div>
</div>

</body>
</html>