//ajax para tabela trabalho
function inserirTrabalho() {
    $.ajax({
        url: "../../control/InserirTrabalho.php",
        type: "POST",
        data: $("#ftrabalho").serialize(),
        dataType: 'text',
        success: function(data, textStatus, jqXHR) {
            alert(data);
            location.reload();
        }, error: function(jqXHR, textStatus, errorThrown) {
            alert("Erro ocasionado: " + errorThrown);
        }
    });
}

function atualizarTrabalho() {
    $.ajax({
        url: "../../control/AtualizarTrabalho.php",
        type: "POST",
        data: $("#ftrabalho").serialize(),
        dataType: 'text',
        success: function(data, textStatus, jqXHR) {
            alert(data);
            location.reload();
        }, error: function(jqXHR, textStatus, errorThrown) {
            alert("Erro ocasionado: " + errorThrown);
        }
    });
}

function procuraTexto(codtrabalho) {
    $.ajax({
        url: "../../control/ProcuraTextoTrabalho.php",
        type: "POST",
        data: {codtrabalho: codtrabalho},
        dataType: 'text',
        success: function(data, textStatus, jqXHR) {
            document.getElementById("texto").innerHTML = data;
        }, error: function(jqXHR, textStatus, errorThrown) {
            alert("Erro ocasionado ao buscar texto de conteúdo: " + errorThrown);
        }
    });
}

function excluirTrabalho() {
    if (window.confirm("Deseja realmente excluir esse trabalho?")) {
        if (document.getElementById("codtrabalho").value !== null && document.getElementById("codtrabalho").value !== "") {
            $.ajax({
                url: "../../control/ExcluirTrabalho.php",
                type: "POST",
                data: {codtrabalho: codtrabalho},
                dataType: 'text',
                success: function(data, textStatus, jqXHR) {
                    alert(data);
                    location.reload();
                }, error: function(jqXHR, textStatus, errorThrown) {
                    alert("Erro ocasionado: " + errorThrown);
                }
            });
        } else {
            alert("Não pode excluir sem escolher o trabalho!");
        }
    }
}

function excluirTrabalho(codtrabalho) {
    if (window.confirm("Deseja realmente excluir esse trabalho?")) {
        if (codtrabalho !== null && codtrabalho !== "") {
            $.ajax({
                url: "../../control/ExcluirTrabalho.php",
                type: "POST",
                data: {codtrabalho: codtrabalho},
                dataType: 'text',
                success: function(data, textStatus, jqXHR) {
                    alert(data);
                    location.reload();
                }, error: function(jqXHR, textStatus, errorThrown) {
                    alert("Erro ocasionado: " + errorThrown);
                }
            });
        } else {
            alert("Não pode excluir sem escolher o trabalho!");
        }
    }
}

//ajax para tabela observação trabalho
function inserir() {
    $.ajax({
        url: "../../control/InserirObservacaoTrabalho.php",
        type: "POST",
        data: $("#ftrabalho").serialize(),
        dataType: 'text',
        success: function(data, textStatus, jqXHR) {
            alert(data);
        }, error: function(jqXHR, textStatus, errorThrown) {
            alert("Erro ocasionado: " + errorThrown);
        }
    });
}

function atualizar() {
    $.ajax({
        url: "../../control/AtualizarObservacaoTrabalho.php",
        type: "POST",
        data: $("#ftrabalho").serialize(),
        dataType: 'text',
        success: function(data, textStatus, jqXHR) {
            alert(data);
        }, error: function(jqXHR, textStatus, errorThrown) {
            alert("Erro ocasionado: " + errorThrown);
        }
    });
}

function excluir() {
    if (window.confirm("Deseja realmente excluir essa observação de trabalho?")) {
        if (document.getElementById("codobservacao").value !== null && document.getElementById("codobservacao").value !== "") {
            $.ajax({
                url: "../../control/ExcluirObservacaoTrabalho.php",
                type: "POST",
                data: {codobservacao: codobservacao},
                dataType: 'text',
                success: function(data, textStatus, jqXHR) {
                    alert(data);
                    location.reload();
                }, error: function(jqXHR, textStatus, errorThrown) {
                    alert("Erro ocasionado: " + errorThrown);
                }
            });
        } else {
            alert("Não pode excluir sem escolher observação de trabalho!");
        }
    }
}

function excluir(codobservacao) {
    if (window.confirm("Deseja realmente excluir esse trabalho?")) {
        if (codobservacao !== null && codobservacao !== "") {
            $.ajax({
                url: "../../control/ExcluirObservacaoTrabalho.php",
                type: "POST",
                data: {codobservacao: codobservacao},
                dataType: 'text',
                success: function(data, textStatus, jqXHR) {
                    alert(data);
                    location.reload();
                }, error: function(jqXHR, textStatus, errorThrown) {
                    alert("Erro ocasionado: " + errorThrown);
                }
            });
        } else {
            alert("Não pode excluir sem escolher o trabalho!");
        }
    }
}

function setaObservacao(nome, texto, codobservacao, codtrabalho){
    document.getElementById("nome2").value = nome;
    document.getElementById("texto2").value = texto;
    document.getElementById("codobservacao").value = codobservacao;
    document.getElementById("codtrabalho2").value = codtrabalho;
    document.getElementById("btinserir2").style.visibility = "hidden";
    document.getElementById("outrosbt").style.visibility = "initial";
    document.getElementById("outrosbt").style.display = "";
}

function novo(){
    document.getElementById("nome2").value = "";
    document.getElementById("texto2").value = "";
    document.getElementById("codobservacao").value = "";
    document.getElementById("outrosbt").style.display = "none";    
    document.getElementById("btinserir2").style.visibility = "initial";
}

//chamando editor de textos para textarea
tinymce.init({
    selector: ' .textarea',
    language: "pt",
    language_url: '../js/tinymce/langs/pt_BR.js'
});

//chamando painel com abas
$(document).ready(function() {
    $("#content div:nth-child(1)").show();
    $(".abas li:first div").addClass("selected");
    $(".aba").click(function() {
        $(".aba").removeClass("selected");
        $(this).addClass("selected");
        var indice = $(this).parent().index();
        indice++;
        $("#content div").hide();
        $("#content div:nth-child(" + indice + ")").show();
    });

    $(".aba").hover(
            function() {
                $(this).addClass("ativa")
            },
            function() {
                $(this).removeClass("ativa")
            }
    );
});