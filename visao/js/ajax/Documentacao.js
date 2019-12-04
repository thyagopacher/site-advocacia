function setaEditar(coddocumentacao, imagem, link, descricao){
    document.getElementById("coddocumentacao").value = coddocumentacao;
    document.getElementById("imagem2").innerHTML = "<img src='../arquivos/" + imagem + "' width='100' height='100' alt='Imagem documentacao '/>";
    document.getElementById("link").value = link;
    document.getElementById("descricao").value = descricao;
    document.getElementById("btinserir").style.visibility="hidden";
    document.getElementById("btexcluir").style.visibility="none";
    document.getElementById("btatualizar").style.visibility="none";
}

function atualizar(){
    $.ajax({
        url : "../../control/AtualizarDocumentacao.php",
        type: "POST",
        data : $("#fdocumentacao").serialize(),
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
    if (window.confirm("Deseja realmente excluir esse documentacao?") && document.getElementById("coddocumentacao").value !== "") {
        $.ajax({
            url : "../../control/ExcluirDocumentacao.php",
            type: "POST",
            data : {coddocumentacao: document.getElementById("coddocumentacao").value},
            dataType: 'text',
            success: function(data, textStatus, jqXHR){
                alert(data);
                location.reload();
            },error: function (jqXHR, textStatus, errorThrown){
                alert("Erro ocasionado: " + errorThrown);
            }
        });          
    }else if(document.getElementById("coddocumentacao").value === null || document.getElementById("coddocumentacao").value === ""){
        alert("Deve escolher antes o documentacao!");
    }
}

function excluir(coddocumentacao){
    if (window.confirm("Deseja realmente excluir esse documentacao?") && coddocumentacao !== "") {
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
    }else if(coddocumentacao === null || coddocumentacao === ""){
        alert("Deve escolher antes o documentacao !");
    }
}
