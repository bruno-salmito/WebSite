/**
 * Script que vai controlar a interação dos formulários com o php
 * via ajax
 * Autor: Bruno Salmito
 * Versão: 0.0.1
 */
$(function () {
    $('body').on('submit', 'form', function () {
        var form = $(this);
        var include_path = 'http://localhost/danki/back-end/projeto_01.2/';
        $.ajax({
            beforeSend: function () {
                $('.loader').fadeIn(1000);
            },
            url: include_path + 'ajax/formSend.php',
            method: 'post',
            dataType: 'json',
            data: form.serialize()
        }).done(function (data) {
            if (data.success) {
                //E-mail enviado com sucesso
                $('.loader').fadeOut();
                $('.warningSuccess').append(data.msg);
                $('.warningSuccess').fadeIn(1000);
                setTimeout(() => {
                    $('.warningSuccess').fadeOut(1000);
                    $('.warningSuccess span').remove();
                }, 5000);


            } else {
                //E-mail não enviado
                $('.loader').fadeOut();
                $('.warningError').append(data.msg);
                $('.warningError').fadeIn(1000);
                setTimeout(() => {
                    $('.warningError').fadeOut(1000);
                    $('.warningError span').remove();
                }, 5000);

            }
        }); //Fim do ajax
        return false;
    });
}); //Fim da função principal