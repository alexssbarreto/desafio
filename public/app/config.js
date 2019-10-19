$(document).ready(function(){
    // config tooltip
    $('[data-toggle="tooltip"]').tooltip()

    // config inpurmask
    $('.cep').inputmask("99.999-999");
    $('.telefone').inputmask({"mask": "(99) 9999[9]-9999"});

    // config dataTable
    $('.tableCartorios').DataTable({
        "language": {
            "lengthMenu": "Visualizar _MENU_ registros por página",
            "zeroRecords": "Erro - desculpe",
            "info": "Página _PAGE_ de _PAGES_",
            "infoEmpty": "Nenhum registro",
            "search": "Pesquisar",
            "previos": "Anterior",
            "oPaginate": {
                "sNext": "Próximo",
                "sPrevious": "Anterior",
                "sFirst": "Primeiro",
                "sLast": "Último"
            },
            "infoFiltered": "(Pesquisar de _MAX_ total records)"
        }
    });
});