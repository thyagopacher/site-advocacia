function enviar(){
    if(document.getElementById("nome").value !== "" && document.getElementById("telefone").value !== ""
            && document.getElementById("mensagem").value !== "" && document.getElementById("email").value !== ""
            && document.getElementById("email").value.indexOf("@") > -1){
        $("#carregando").show();
        $.ajax({
            url : "../../control/enviaEmail.php",
            type: "POST",
            data : $("#contact_form").serialize(),
            dataType: 'text',
            success: function(data, textStatus, jqXHR){
               alert(data);
               $("#carregando").hide(); 
            },error: function (jqXHR, textStatus, errorThrown){
                alert("Erro ocasionado: " + errorThrown);
                $("#carregando").hide(); 
            }
        });  
    }else{
        if(validaEmail(document.getElementById("email").value)){
            alert("E-mail deve conter @ !");
        }else{
            alert("Nome, email, telefone, ou mensagem em branco!");
        }
    }
}

function validaEmail(email){
    if(email.length >= 8 && email.indexOf("@") === -1
            && (email.indexOf(".com") === -1 || email.indexOf(".com.br") === -1 || email.indexOf(".net") === -1)){
        return true;
    }else{
        return false;
    }
}
