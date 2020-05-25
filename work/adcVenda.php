<?php
$id=$_GET["id"];
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vendedores</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="css/base.css">
    
</head>
<body>

<div class="quadrado">
    <div class='linha'>
        <div class='nTopo'>Vendas <span class="nTopoMsg" id="mensagem"></span></div>
    </div>
    <div class="corpoAdc">
    <form method="post" id="api_form">
        <div class="ncampo">Produto</div>
        <div class="ncampo">
            <input name="veProuto" id="veProuto" type="text" class="p" >
        </div>
        
        <div class="ncampo">Valor</div>
        <div class="ncampo">
            <input name="veValor" id="veValor" type="text" class="p" >
        </div>

        <div class="nbtn">
            <input type="hidden" name="veIDVendr" id="veIDVendr" value="<?php echo $id?>" />
            <input type="hidden" name="action" id="action" value="insertv" />
            <input type="submit" name="button_action" class="btnEnviar" id="button_action" value="Enviar" />
        </div>
    </form>
    </div>

</div>
<script>
$(document).ready(function(){
    $('#api_form').on('submit', function(event){
		event.preventDefault();
		var form_data = $(this).serialize();
			$.ajax({
				url:"actionv.php",
				method:"POST",
				data:form_data,
                beforeSend: function(){
                    $("#mensagem").html("Enviando dados...");
                },
				success:function(data)
				{
					$('#api_form')[0].reset();
					if(data == 'insert')
					{
						$("#mensagem").html("dados enviados... <a href='index.php'>Voltar</a>");
					}
					if(data == 'update')
					{
						$("#mensagem").html("Erro ao enviar os dados...");
					}
				}
			});
	});
});
</script>
</body>
</html>