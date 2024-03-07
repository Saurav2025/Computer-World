function send_message() {
    var name = jQuery("#name").val();
    var email = jQuery("#email").val();
    var mobile = jQuery("#mobile").val();
    var message = jQuery("#message").val();

    if (name == "") {
        alert('Please enter name');
    } else if (email == "") {
        alert('Please enter email');
    } else if (mobile == "") {
        alert('Please enter mobile');
    } else if (message == "") {
        alert('Please enter message');
    } else {
        jQuery.ajax({
            url: 'send_message.php',
            type: 'post',
            data: 'name=' + name + '&email=' + email + '&mobile=' + mobile + '&message=' + message,
            success: function(result) {
                alert(result);
            }
        });
    }
}

function manage_cart(pid, type, is_checkout) {
    if (type == 'update') {
        var qty = jQuery("#" + pid + "qty").val();
    } else {
        var qty = jQuery("#qty").val();
    }
    jQuery.ajax({
        url: 'manage_cart.php',
        type: 'post',
        data: 'pid=' + pid + '&qty=' + qty + '&type=' + type,
        success: function(result) {
            result = result.trim();
            if (type == 'update' || type == 'remove') {
                window.location.href = window.location.href;
            }
            if (result == 'not_avaliable') {
                alert('Qty not avaliable');
            } else {
                jQuery('.htc__qua').html(result);
                if (is_checkout == 'yes') {
                    window.location.href = 'checkout.php';
                }
            }
        }
    });
}

function manage_cart_del(pid, type) {
    if (type == 'update') {
        var qty = jQuery("#" + pid + "qty").val();
    } else {
        var qty = jQuery("#qty").val();
    }
    jQuery.ajax({
        url: 'manage_cart_del.php',
        type: 'post',
        data: 'pid=' + pid + '&qty=' + qty + '&type=' + type,
        success: function(result) {
            if (type == 'update' || type == 'remove') {
                window.location.href = window.location.href;
            }
            jQuery('.htc__qua').html(result);
        }
    });
}

function sort_product_drop(cat_id, site_path) {
    var sort_product_id = jQuery('#sort_product_id').val();
    window.location.href = site_path + "categories.php?id=" + cat_id + "&sort=" + sort_product_id;
}