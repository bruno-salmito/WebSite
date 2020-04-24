//Válida o tipo de arquivo enviado no input-file

$('#imagem').change(function () {
    var file = this.files[0];
    var fileType = file.type;
    var match = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif'];
    if (!(fileType == match[0]) || (fileType == match[1]) || (fileType == match[2]) || (fileType == match[3])) {
        //O tipo do arquivo não é permitido
        alert("Desculpe, somente arquivos de imagem são permitidos");
        $('#imagem').val();
        return false;
    }
});
$('#email').change(function () {
    var teste = $('#email').val();
    document.getElementById('login').value = teste;
})

$(document).ready(function () {
    //Envia via Ajax para o arquivo userForm.php
    $('#form').on('submit', function (event) {
        event.preventDefault();
        var include_path = 'http://localhost/danki/back-end/projeto_01.2/ajax/';
        $.ajax({
            beforeSend: function () {
                $('.loader').fadeIn(1000);
            },
            type: 'POST',
            url: include_path + 'userForm.php',
            data: new FormData(this),
            dataType: 'json',
            contentType: false,
            cache: false,
            processData: false,
            success: function (response) {
                if (response.status == 1) {
                    $('.loader').fadeOut();
                    $('.msgSuccess').append(response.message);
                    $('.msgSuccess').fadeIn(1000);
                    setTimeout(() => {
                        $('.msgSuccess').fadeOut();
                        $('.msgSuccess span').remove();
                    }, 5000);
                    //console.log(response);
                } else {
                    $('.loader').fadeOut();
                    $('.msgError').append(response.message);
                    $('.msgError').fadeIn(1000);
                    setTimeout(() => {
                        $('.msgError').fadeOut();
                        $('.msgError span').remove();
                    }, 5000);
                    //console.log(response);
                }

            }
        })
    }) //Fim do submit form
})