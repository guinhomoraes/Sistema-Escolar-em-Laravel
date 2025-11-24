$(document).ready(function () {
    

    $(document).on('click','#btn-add-conteudo', function(e)
    {
        e.preventDefault();
        
        let cloneConteudo = $('.conteudo-modelo').clone();
        $('.campos-novos').append(cloneConteudo.html());

        $('.campos-novos').find('[name="titulo[]"]').prop('required',true);
        $('.campos-novos').find('[name="descricao[]"]').prop('required',true);


    });

    $(document).on('click','.btn-remove-conteudo', function(e)
    {
        e.preventDefault();

        if(!confirm("Deseja remover o conteúdo?"))
        {
            return false;
        }

        let elementoIrmaoId = $(this).closest('div')
                                     .siblings('.campo-id')
                                     .children('[name="id[]"]')[0].value;

       
        if(typeof elementoIrmaoId != "undefined" && elementoIrmaoId.length > 0)
        {
            $(this).closest('.card')
                   .css({'background-color': '#f1d2d2'});
            
            $(this).closest('div')
                    .siblings('.campo-id')
                    .children('[name="foi_excluido[]"]')[0].value = 1;

            $(this)
                .addClass('d-none')
                .siblings('.btn-desfazer-remocao')
                .removeClass('d-none');
        }
        else
        {
            $(this).closest('.card').remove();
        }

    });

    $(document).on('click','.btn-desfazer-remocao', function(e)
    {
        e.preventDefault();

        if(!confirm("Deseja desfazer a remoção do conteúdo?"))
        {
            return false;
        }

        $(this).closest('.card')
                .css({'background-color': '#ffff'});
        
        $(this).closest('div')
                .siblings('.campo-id')
                .children('[name="foi_excluido[]"]')[0].value = 0;

        $(this)
        .addClass('d-none')
        .siblings('.btn-remove-conteudo')
        .removeClass('d-none');


    });


    

});