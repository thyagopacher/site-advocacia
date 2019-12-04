function setaEditar(codslide, imagem, link, descricao){
    document.getElementById("codslide").value = codslide;
    document.getElementById("imagem2").innerHTML = "<img src='../arquivos/" + imagem + "' width='100' height='100' alt='Imagem slideshow show'/>";
    document.getElementById("link").value = link;
    document.getElementById("descricao").value = descricao;
    document.getElementById("btinserir").style.visibility="hidden";
    document.getElementById("btexcluir").style.visibility="none";
    document.getElementById("btatualizar").style.visibility="none";
}

function atualizar(){
    $.ajax({
        url : "../../control/AtualizarSlideShow.php",
        type: "POST",
        data : $("#fslideshow").serialize(),
        dataType: 'text',
        success: function(data, textStatus, jqXHR){
            alert(data);
            location.reload();
        },error: function (jqXHR, textStatus, errorThrown){
            alert("Erro ocasionado: " + errorThrown);
        }
    });          
}

function excluir(){
    if (window.confirm("Deseja realmente excluir esse slideshow?") && document.getElementById("codslide").value !== "") {
        $.ajax({
            url : "../../control/ExcluirSlideShow.php",
            type: "POST",
            data : {codslide: document.getElementById("codslide").value},
            dataType: 'text',
            success: function(data, textStatus, jqXHR){
                alert(data);
                location.reload();
            },error: function (jqXHR, textStatus, errorThrown){
                alert("Erro ocasionado: " + errorThrown);
            }
        });          
    }else if(document.getElementById("codslide").value === null || document.getElementById("codslide").value === ""){
        alert("Deve escolher antes o slide show!");
    }
}

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
