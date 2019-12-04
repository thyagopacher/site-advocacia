function procurar(){
    $.ajax({
        url : "../../control/ListaConteudos.php",
        type: "POST",
        data : $("#fconteudo").serialize(),
        dataType: 'text',
        success: function(data, textStatus, jqXHR){
           document.getElementById("listagem").innerHTML = data;
        },error: function (jqXHR, textStatus, errorThrown){
            alert("Erro ocasionado: " + errorThrown);
        }
    });  
}

function excluir(codconteudo){
    if (window.confirm("Deseja realmente excluir esse conteúdo?")) {
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
            alert("Não pode excluir sem escolher o conteúdo!");
        }
    }
}
