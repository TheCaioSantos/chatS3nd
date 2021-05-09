$(document).ready(function(){
	lista();
})

function lista(){
	$.ajax({
		url:"controller/mensagem.php",
		type: 'POST',
		success: function(textStatus){
			$("#mensagens").html(textStatus); //Mostra o resultado da página lista.php
		}
	})
	setTimeout("lista()", 3000); //Tempo de espera para atualizar novamente
}			
