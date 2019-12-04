function inserir(){
    $.ajax({
        url : "../../control/InserirPessoa.php",
        type: "POST",
        data : $("#fpessoa").serialize(),
        dataType: 'text',
        success: function(data, textStatus, jqXHR){
           alert(data);
        },error: function (jqXHR, textStatus, errorThrown){
            alert("Erro ocasionado: " + errorThrown);
        }
    });  
}

function atualizar(){
    $.ajax({
        url : "../../control/AtualizarPessoa.php",
        type: "POST",
        data : $("#fpessoa").serialize(),
        dataType: 'text',
        success: function(data, textStatus, jqXHR){
           alert(data);
        },error: function (jqXHR, textStatus, errorThrown){
            alert("Erro ocasionado: " + errorThrown);
        }
    });      
}

function setaEditar(codpessoa, nome, email, senha){
    document.getElementById("codpessoa").value = codpessoa;
    document.getElementById("nome").value = nome;
    document.getElementById("email").value = email;
    document.getElementById("senha").value = senha;
    document.getElementById("btinserir").style.visibility="hidden";
    document.getElementById("btatualizar").style.visibility="none";
    document.getElementById("btexcluir").style.visibility="none";
}

function excluir(){
    if (window.confirm("Deseja realmente excluir esse pessoa?")) {
        if(document.getElementById("codpessoa").value !== null && document.getElementById("codpessoa").value !== ""){
            $.ajax({
                url : "../../control/ExcluirPessoa.php",
                type: "POST",
                data : {codpessoa: codpessoa},
                dataType: 'text',
                success: function(data, textStatus, jqXHR){
                    alert(data);
                    location.reload();
                },error: function (jqXHR, textStatus, errorThrown){
                    alert("Erro ocasionado: " + errorThrown);
                }
            });          
        }else{
            alert("Não pode excluir sem escolher o pessoa!");
        }
    }
}

function excluir(codpessoa){
    if (window.confirm("Deseja realmente excluir esse pessoa?")) {
        if(codpessoa !== null && codpessoa !== ""){
            $.ajax({
                url : "../../control/ExcluirPessoa.php",
                type: "POST",
                data : {codpessoa: codpessoa},
                dataType: 'text',
                success: function(data, textStatus, jqXHR){
                    alert(data);
                    location.reload();
                },error: function (jqXHR, textStatus, errorThrown){
                    alert("Erro ocasionado: " + errorThrown);
                }
            });          
        }else{
            alert("Não pode excluir sem escolher o pessoa!");
        }
    }
}
