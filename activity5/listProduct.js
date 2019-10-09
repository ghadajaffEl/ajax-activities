$(document).ready(function () {

$('.page-item').click(function (e) {
    e.preventDefault();
    let id =$(this).attr('id');
    let offset=0;
    offset=parseInt(id)*10;

$('.next').attr('id',parseInt(id)+1)


    $.get({
        url: 'GetLimitProduct.php?offset='+offset,
    })
        .done(function (response) {
            $('.table').html(response);

        })

        .fail(function () {
            alert('erreur est survenu lors de l\'ajout');

        })
})


})

