$('body').on('submit', 'form', function () {
    var form = $(this);
    var include_path = 'http://localhost/danki/back-end/projeto_01.2/';

    $.ajax({
        beforeSend: function () {
            $('.loader').fadeIn(1000);
        },
        url: include_path + 'ajax/loginSend.php',
        method: 'post',
        dataType: 'json',
        data: form.serialize()
    }).done(function (data) {
        if (data.success) {
            //Tudo certo
            $('.loader').fadeOut();
            window.location.href = include_path + "painel";
        } else {
            //Erro ao logar
            $('.loader').fadeOut();
            $('.msgErro').fadeIn(1000);
            console.log(data.msg);
        }
    });
    return false;
});