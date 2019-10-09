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
                $('.table').append(' <tr>\n' +
                    '                        <th scope="row">'+nb+'</th>\n' +
                    '                        <td>'+name+'</td>\n' +
                    '                        <td>'+price+'</td>\n' +
                    '\n' +
                    '                    </tr>');
                $("#formProduct").trigger('reset');
            })

              .fail(function () {
                  alert('erreur est survenu lors de l\'ajout');
                  $("#formProduct").trigger('reset');

            })
    })
})

