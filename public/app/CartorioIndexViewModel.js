$(document).ready(function() {

    /**
     * setDefault no formulário
     */
    $('body').on('click', '#btnAdicionar', function(event) {
        event.preventDefault();

        $("#inputId").val('');
        $("#inputNome").val('');
        $("#inputTelefone").val('');
        $("#inputEmail").val('');
    });


    /**
     * Função para submit do formulário
     */
    $('body').on('submit', '#formCartorio', function(event) {
        event.preventDefault();

        var data = $.FormData(this);

        if (data.id) {
            var mensagem = 'Deseja editar este registro?';
            var url = $.ApplicationRootUrl + '/cadastro/formulario/' + data.id;
        } else {
            var mensagem = 'Deseja incluir este registro?';
            var url = $.ApplicationRootUrl + '/cadastro/formulario';
        }

        $.Confirmar(mensagem, function(){}, function(){
            $.Ajax(url, JSON.stringify(data), function (response) {
                if (!response.result) {
                    return $.Alerta(response.message);
                }

                $.Alerta(response.message, undefined, 'success', function(){
                    $("#modalFormularioCartorio").modal('hide');

                    location.reload();

                    //setDefaults
                    $("#inputNome").val('');
                    $("#inputTelefone").val('');
                    $("#inputEmail").val('');
                });
            }, 'POST');
        });
    });

    /**
     * Função de Exclusão
     */
    $('body').on('click', '.btnExcluir', function(event) {
        var self = $(this).parent().parent();

        var id = jQuery(this).attr("data-id");

        $.Confirmar('Confirma excluir este registro?', function(){}, function(){
            $.Ajax($.ApplicationRootUrl + '/cadastro/excluir/' + id, {}, function (response) {
                if (!response.result) {
                    return $.Alerta(response.message);
                }

                $.Alerta(response.message, undefined, 'success', function(){
                    $(self).remove();
                });
            }, 'POST');
        });
    });

    /**
     * Função de Edição
     */
    $('body').on('click', '.btnEditar', function(event) {
        var self = $(this).parent().parent();

        var id = jQuery(this).attr("data-id");

        $.Ajax($.ApplicationRootUrl + '/cadastro/find/' + id, {}, function (response) {
            if (!response.result) {
                return $.Alerta(response.message);
            }

            //setDefaults
            $("#inputId").val(response.data.id);
            $("#inputNome").val(response.data.nome);

            $("#inputRazao").val(response.data.razao);
            $("#inputEndereco").val(response.data.endereco);
            $("#inputBairro").val(response.data.bairro);
            $("#inputCidade").val(response.data.cidade);
            $("#inputUf").val(response.data.uf);
            $("#inputCep").val(response.data.cep);
            $("#inputTabeliao").val(response.data.tabeliao);

            $("#inputTelefone").val(response.data.telefone);
            $("#inputEmail").val(response.data.email);


            $("#modalFormularioCartorio").modal('show');

        }, 'POST');
    });

});