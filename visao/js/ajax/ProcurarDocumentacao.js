function procurar(){
    $.ajax({
        url : "../../control/ListaDocumentacao.php",
        type: "POST",
        data : $("#fdocumentacao").serialize(),
        dataType: 'text',
        success: function(data, textStatus, jqXHR){
           document.getElementById("listagem").innerHTML = data;
        },error: function (jqXHR, textStatus, errorThrown){
            alert("Erro ocasionado: " + errorThrown);
        }
    });  
}

function excluir(coddocumentacao){
    if (window.confirm("Deseja realmente excluir esse documentação?")) {
        if(coddocumentacao !== null && coddocumentacao !== ""){
            $.ajax({
                url : "../../control/ExcluirDocumentacao.php",
                type: "POST",
                data : {coddocumentacao: coddocumentacao},
                dataType: 'text',
                success: function(data, textStatus, jqXHR){
                    alert(data);
                    location.reload();
                },error: function (jqXHR, textStatus, errorThrown){
                    alert("Erro ocasionado: " + errorThrown);
                }
            });          
        }else{
            alert("Não pode excluir sem escolher a documentação!");
        }
    }
}
