function inserir(){
    $.ajax({
        url : "../../control/InserirConteudo.php",
        type: "POST",
        data : $("#fconteudo").serialize(),
        dataType: 'text',
        success: function(data, textStatus, jqXHR){
           alert(data);
           location.reload();
        },error: function (jqXHR, textStatus, errorThrown){
            alert("Erro ocasionado: " + errorThrown);
        }
    });  
}

function atualizar(){
    $.ajax({
        url : "../../control/AtualizarConteudo.php",
        type: "POST",
        data : $("#fconteudo").serialize(),
        dataType: 'text',
        success: function(data, textStatus, jqXHR){
           alert(data);
           location.reload();
        },error: function (jqXHR, textStatus, errorThrown){
            alert("Erro ocasionado: " + errorThrown);
        }
    });      
}

function setaEditar(codconteudo, nome){
    document.getElementById("codconteudo").value = codconteudo;
    document.getElementById("nome").value = nome;
    document.getElementById("btinserir").style.visibility="hidden";
    document.getElementById("btatualizar").style.visibility="none";
    document.getElementById("btexcluir").style.visibility="none"; 
    procuraTexto(codconteudo);
}

function procuraTexto(codconteudo){
    $.ajax({
        url : "../../control/ProcuraTextoConteudo.php",
        type: "POST",
        data : {codconteudo: codconteudo},
        dataType: 'text',
        success: function(data, textStatus, jqXHR){
            document.getElementById("texto").innerHTML = data;
        },error: function (jqXHR, textStatus, errorThrown){
            alert("Erro ocasionado ao buscar texto de conteúdo: " + errorThrown);
        }
    });    
}

function excluir(){
    if (window.confirm("Deseja realmente excluir esse conteudo?")) {
        if(document.getElementById("codconteudo").value !== null && document.getElementById("codconteudo").value !== ""){
            $.ajax({
                url : "../../control/ExcluirConteudo.php",
                type: "POST",
                data : {codconteudo: codconteudo},
                dataType: 'text',
                success: function(data, textStatus, jqXHR){
                    alert(data);
                    location.reload();
                },error: function (jqXHR, textStatus, errorThrown){
                    alert("Erro ocasionado: " + errorThrown);
                }
            });          
        }else{
            alert("Não pode excluir sem escolher o conteudo!");
        }
    }
}

function excluir(codconteudo){
    if (window.confirm("Deseja realmente excluir esse conteudo?")) {
        if(codconteudo !== null && codconteudo !== ""){
            $.ajax({
                url : "../../control/ExcluirConteudo.php",
                type: "POST",
                data : {codconteudo: codconteudo},
                dataType: 'text',
                success: function(data, textStatus, jqXHR){
                    alert(data);
                    location.reload();
                },error: function (jqXHR, textStatus, errorThrown){
                    alert("Erro ocasionado: " + errorThrown);
                }
            });          
        }else{
            alert("Não pode excluir sem escolher o conteudo!");
        }
    }
}

