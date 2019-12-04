function procurar(){
    $.ajax({
        url : "../../control/ListaPessoas.php",
        type: "POST",
        data : $("#fpessoa").serialize(),
        dataType: 'text',
        success: function(data, textStatus, jqXHR){
           document.getElementById("listagem").innerHTML = data;
        },error: function (jqXHR, textStatus, errorThrown){
            alert("Erro ocasionado: " + errorThrown);
        }
    });  
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
