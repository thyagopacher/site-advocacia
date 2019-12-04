function excluir(codtrabalho){
    if (window.confirm("Deseja realmente excluir esse trabalho?")) {
        if(codtrabalho !== null && codtrabalho !== ""){
            $.ajax({
                url : "../../control/ExcluirTrabalho.php",
                type: "POST",
                data : {codtrabalho: codtrabalho},
                dataType: 'text',
                success: function(data, textStatus, jqXHR){
                    alert(data);
                    location.reload();
                },error: function (jqXHR, textStatus, errorThrown){
                    alert("Erro ocasionado: " + errorThrown);
                }
            });          
        }else{
            alert("Não pode excluir sem escolher o trabalho!");
        }
    }
}

function procurar(){
    $.ajax({
        url : "../../control/ListaTrabalhos.php",
        type: "POST",
        data : $("#ftrabalho").serialize(),
        dataType: 'text',
        success: function(data, textStatus, jqXHR){
           document.getElementById("listagem").innerHTML = data;
        },error: function (jqXHR, textStatus, errorThrown){
            alert("Erro ocasionado: " + errorThrown);
        }
    });
}