<script>
    // add product to cart
    $(document).on('click','button.add-to-cart', function () {
        let thisDiv   = $(this).closest('div');
        let productId = thisDiv.find('.product-id').val();
        let title = thisDiv.find('.product-title').val();
        let price = thisDiv.find('.product-price').val();
        let imageUrl = thisDiv.find('.product-image-url').val();
        let qty       = thisDiv.find('.qty').val();
        if(qty > 10){
            alert('Quantity exceeds maximum number');
            $('.qty').val('');
        }else{
            let url   = '{{ url('add-to-cart') }}';
            let token = '{{ csrf_token() }}';
            $.ajax({
               type:'post',
               dataType: 'json',
               url :url,
               data:{
                   productId: productId,
                   title: title,
                   price: price,
                   imageUrl: imageUrl,
                   qty: qty,
                   _token: token
               },
               success:function (result) {
                   $('.cart-qty').text(result.qty);
               }
            });
        }

    });

    // update cart
    $(document).on('click', '.update-cart', function () {
        let thisRow = $(this).closest('tr');
        let status  = $(this).attr('data-status');
        let rowId   = thisRow.find('.rowId').val();
        let qty     = thisRow.find('.qty').val();

        if(status==='inc'){
            qty = ++qty;
        }else{
            if(qty>1){
                qty = --qty;
            }
        }
        let url   = '{{ url('update-cart') }}'+'/'+rowId;
        let token = '{{ csrf_token() }}';
        $.ajax({
            type:'post',
            url :url,
            data:{
                qty: qty, _token: token
            },
            success:function (data) {
                location.reload();
            }
        });
    });

    // order details by modal
    $(document).on('click','a.modal-link', function () {
        var actionUrl  = $(this).attr('data-action');
        var modalTitle = $(this).attr('data-title');
        $('.modal-title').text(modalTitle);


        $.ajax({
            type:'GET',
            url:actionUrl,
            success:function (data) {
                $('.modal-body').html(data);
            }

        });

    });

    // single shipping method check
    $(document).on('click', '.shipping_method', function () {
        $('.shipping_method').not(this).prop('checked', false);
    });
    $(document).on('click', '.payment_method', function () {
        $('.payment_method').not(this).prop('checked', false);
    });
    // empty cart alert
    /*$(document).on('click', '.cart-empty', function () {
        alert('You have no items in your shopping cart.');
    });*/

    $(document).on('click', '.confirm-order', function () {
        if(!confirm('Are you sure want to submit?')){
            return false;
        }
    });

</script>
