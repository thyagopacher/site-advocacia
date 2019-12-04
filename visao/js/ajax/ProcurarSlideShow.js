function excluir(codslide){
    if (window.confirm("Deseja realmente excluir esse slideshow?") && codslide !== "") {
        $.ajax({
            url : "../../control/ExcluirSlideShow.php",
            type: "POST",
            data : {codslide: codslide},
            dataType: 'text',
            success: function(data, textStatus, jqXHR){
                alert(data);
                location.reload();
            },error: function (jqXHR, textStatus, errorThrown){
                alert("Erro ocasionado: " + errorThrown);
            }
        });          
    }else if(codslide === null || codslide === ""){
        alert("Deve escolher antes o slide show!");
    }
}

function procurar(){
    $.ajax({
        url : "../../control/ListaSlideShow.php",
        type: "POST",
        data : $("#fslideshow").serialize(),
        dataType: 'text',
        success: function(data, textStatus, jqXHR){
           document.getElementById("listagem").innerHTML = data;
        },error: function (jqXHR, textStatus, errorThrown){
            alert("Erro ocasionado: " + errorThrown);
        }
    });
}