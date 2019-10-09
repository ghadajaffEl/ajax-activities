$(document).ready(function () {
    $("#formProduct").submit(function (e) {
        e.preventDefault();
        let data = $(this).serialize();

        $.post({
            url: 'addProduct.php',
            data: data,
        })
            .done(function (response) {
               let product= JSON.parse(response);
               let nb= product.nb;
               let name= product.name;
               let price= product.price;
               let id = product.id;
                $('.table').append(' <tr>\n' +
                    '                        <th scope="row">'+nb+'</th>\n' +
                    '                        <td>'+name+'</td>\n' +
                    '                        <td>'+price+'</td>\n' +
                    '                        <td  class="details" id="'+id+'"><i class="fa fa-info"></i></td>\n' +
                    '\n' +
                    '                    </tr>');
                $("#formProduct").trigger('reset');
            })

              .fail(function () {
                  alert('erreur est survenu lors de l\'ajout');
                  $("#formProduct").trigger('reset');

            })
    })

    $(document).delegate('.details','click',function () {
        let productId =$(this).attr('id');

        $.get({
            url: 'getProduct.php?id='+productId,
        })
            .done(function (response) {
                $('.modal-body').html(response)
                $("#exampleModal").modal('show');

            })

            .fail(function () {
                alert('erreur est survenu lors de l\'ajout');

            })
    })



})

