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
        <div class='nTopo'>Vendedores <span class="nTopoMsg" id="mensagem"></span></div>
        <div class='nlink'><a href="adcVendedor.php">Novo venderdor</a></div>
    </div>
    <div class="corpoAdc">
    <form method="post" id="api_form">
        <div class="ncampo">Nome</div>
        <div class="ncampo">
            <input name="vdNome" id="vdNome" type="text" class="p" >
        </div>
        
        <div class="ncampo">email</div>
        <div class="ncampo">
            <input name="vdEmail" id="vdEmail" type="text" class="p" >
        </div>

        <div class="nbtn">
            <input type="hidden" name="action" id="action" value="insert" />
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
				url:"action.php",
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