$(function () {
    $('[actionBtn=delete]').click(function () {
        var response = confirm("Deseja deletar este registro ?");
        if (response) {
            return true;
        } else {
            return false;
        }
    })
})