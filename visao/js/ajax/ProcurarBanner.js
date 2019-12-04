function excluir(codbanner){
    if (window.confirm("Deseja realmente excluir esse banner?") && codbanner !== "") {
        $.ajax({
            url : "../../control/ExcluirBanner.php",
            type: "POST",
            data : {codbanner: codbanner},
            dataType: 'text',
            success: function(data, textStatus, jqXHR){
                alert(data);
                location.reload();
            },error: function (jqXHR, textStatus, errorThrown){
                alert("Erro ocasionado: " + errorThrown);
            }
        });          
    }else if(codbanner === null || codbanner === ""){
        alert("Deve escolher antes o banner!");
    }
}

function procurar(){
    $.ajax({
        url : "../../control/ListaBanner.php",
        type: "POST",
        data : $("#fbanner").serialize(),
        dataType: 'text',
        success: function(data, textStatus, jqXHR){
           document.getElementById("listagem").innerHTML = data;
        },error: function (jqXHR, textStatus, errorThrown){
            alert("Erro ocasionado: " + errorThrown);
        }
    });
}