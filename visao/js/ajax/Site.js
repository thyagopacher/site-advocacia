function inserir(){
    $.ajax({
        url : "../../control/InserirSite.php",
        type: "POST",
        data : $("#fsite").serialize(),
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
        url : "../../control/AtualizarSite.php",
        type: "POST",
        data : $("#fsite").serialize(),
        dataType: 'text',
        success: function(data, textStatus, jqXHR){
           alert(data);
           location.reload();
        },error: function (jqXHR, textStatus, errorThrown){
            alert("Erro ocasionado: " + errorThrown);
        }
    });      
}

function setaEditar(codsite, nome){
    document.getElementById("codsite").value = codsite;
    document.getElementById("nome").value = nome;
    document.getElementById("btinserir").style.visibility="hidden";
    document.getElementById("btatualizar").style.visibility="none";
    document.getElementById("btexcluir").style.visibility="none";
}

function excluir(){
    if (window.confirm("Deseja realmente excluir esse site?")) {
        if(document.getElementById("codsite").value !== null && document.getElementById("codsite").value !== ""){
            $.ajax({
                url : "../../control/ExcluirSite.php",
                type: "POST",
                data : {codsite: codsite},
                dataType: 'text',
                success: function(data, textStatus, jqXHR){
                    alert(data);
                    location.reload();
                },error: function (jqXHR, textStatus, errorThrown){
                    alert("Erro ocasionado: " + errorThrown);
                }
            });          
        }else{
            alert("Não pode excluir sem escolher o site!");
        }
    }
}

function excluir(codsite){
    if (window.confirm("Deseja realmente excluir esse site?")) {
        if(codsite !== null && codsite !== ""){
            $.ajax({
                url : "../../control/ExcluirSite.php",
                type: "POST",
                data : {codsite: codsite},
                dataType: 'text',
                success: function(data, textStatus, jqXHR){
                    alert(data);
                    location.reload();
                },error: function (jqXHR, textStatus, errorThrown){
                    alert("Erro ocasionado: " + errorThrown);
                }
            });          
        }else{
            alert("Não pode excluir sem escolher o site!");
        }
    }
}
