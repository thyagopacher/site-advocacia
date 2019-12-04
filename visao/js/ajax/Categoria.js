function inserir(){
    $.ajax({
        url : "../../control/InserirCategoria.php",
        type: "POST",
        data : $("#fcategoria").serialize(),
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
        url : "../../control/AtualizarCategoria.php",
        type: "POST",
        data : $("#fcategoria").serialize(),
        dataType: 'text',
        success: function(data, textStatus, jqXHR){
           alert(data);
           location.reload();
        },error: function (jqXHR, textStatus, errorThrown){
            alert("Erro ocasionado: " + errorThrown);
        }
    });      
}

function setaEditar(codcategoria, nome){
    document.getElementById("codcategoria").value = codcategoria;
    document.getElementById("nome").value = nome;
    document.getElementById("btinserir").style.visibility="hidden";
    document.getElementById("btatualizar").style.visibility="none";
    document.getElementById("btexcluir").style.visibility="none";
}

function excluir(){
    if (window.confirm("Deseja realmente excluir essa categoria?")) {
        if(document.getElementById("codcategoria").value !== null && document.getElementById("codcategoria").value !== ""){
            $.ajax({
                url : "../../control/ExcluirCategoria.php",
                type: "POST",
                data : {codcategoria: codcategoria},
                dataType: 'text',
                success: function(data, textStatus, jqXHR){
                    alert(data);
                    location.reload();
                },error: function (jqXHR, textStatus, errorThrown){
                    alert("Erro ocasionado: " + errorThrown);
                }
            });          
        }else{
            alert("Não pode excluir sem escolher a categoria!");
        }
    }
}

function excluir(codcategoria){
    if (window.confirm("Deseja realmente excluir essa categoria?")) {
        if(codcategoria !== null && codcategoria !== ""){
            $.ajax({
                url : "../../control/ExcluirCategoria.php",
                type: "POST",
                data : {codcategoria: codcategoria},
                dataType: 'text',
                success: function(data, textStatus, jqXHR){
                    alert(data);
                    location.reload();
                },error: function (jqXHR, textStatus, errorThrown){
                    alert("Erro ocasionado: " + errorThrown);
                }
            });          
        }else{
            alert("Não pode excluir sem escolher a categoria!");
        }
    }
}

$.ajax({
    url : "../../control/ListaCategorias.php",
    type: "POST",
    dataType: 'text',
    success: function(data, textStatus, jqXHR){
       document.getElementById("listagem").innerHTML = data;
    },error: function (jqXHR, textStatus, errorThrown){
        alert("Erro ocasionado: " + errorThrown);
    }
});