<?php
error_reporting(0);
require('top.inc.php');
$categories_id = '';
$sub_categories_id = '';
$name = '';
$mrp = '';
$price = '';
$qty = '';
$image = '';
$short_desc    = '';
$description    = '';
$meta_title    = '';
$meta_desc    = '';
$meta_keyword = '';
$best_seller = '';
$multipleImageArr = [];
$msg = '';
$image_required = 'required';

if (isset($_GET['pi']) && $_GET['pi'] > 0) {
    $pi = get_safe_value($conn, $_GET['pi']);
    $delete_sql = "DELETE from product_images where id='$pi'";
    mysqli_query($conn, $delete_sql);
}

if (isset($_GET['id']) && $_GET['id'] != '') {
    $image_required = '';
    $id = get_safe_value($conn, $_GET['id']);
    $res = mysqli_query($conn, "SELECT * from product where id='$id'");
    $check = mysqli_num_rows($res);
    if ($check > 0) {
        $row = mysqli_fetch_assoc($res);
        $categories_id = $row['categories_id'];
        $sub_categories_id = $row['sub_categories_id'];
        $name = $row['name'];
        $mrp = $row['mrp'];
        $price = $row['price'];
        $qty = $row['qty'];
        $short_desc = $row['short_desc'];
        $description = $row['description'];
        $meta_title = $row['meta_title'];
        $meta_desc = $row['meta_desc'];
        $meta_keyword = $row['meta_keyword'];
        $best_seller = $row['best_seller'];
        $image = $row['image'];

        $resMultipleImage = mysqli_query($conn, "SELECT id,product_images FROM product_images where product_id='$id'");
        if (mysqli_num_rows($resMultipleImage) > 0) {
            $jj = 0;
            while ($rowMultipleImage = mysqli_fetch_assoc($resMultipleImage)) {
                $multipleImageArr[$jj]['product_images'] = $rowMultipleImage['product_images'];
                $multipleImageArr[$jj]['id'] = $rowMultipleImage['id'];
                $jj++;
            }
        }
    } else {
        header('location:product.php');
        die();
    }
}
if (isset($_POST['submit'])) {

    $categories_id = get_safe_value($conn, $_POST['categories_id']);
    $sub_categories_id = get_safe_value($conn, $_POST['sub_categories_id']);
    $name = get_safe_value($conn, $_POST['name']);
    $mrp = get_safe_value($conn, $_POST['mrp']);
    $price = get_safe_value($conn, $_POST['price']);
    $qty = get_safe_value($conn, $_POST['qty']);
    $short_desc = get_safe_value($conn, $_POST['short_desc']);
    $description = get_safe_value($conn, $_POST['description']);
    $meta_title = get_safe_value($conn, $_POST['meta_title']);
    $meta_desc = get_safe_value($conn, $_POST['meta_desc']);
    $meta_keyword = get_safe_value($conn, $_POST['meta_keyword']);
    $best_seller = get_safe_value($conn, $_POST['best_seller']);


    $res = mysqli_query($conn, "SELECT * from product where name='$name'");
    $check = mysqli_num_rows($res);
    if ($check > 0) {
        if (isset($_GET['id']) && $_GET['id'] != '') {
            $getData = mysqli_fetch_assoc($res);
            if ($id == $getData['id']) {
            } else {
                $msg = "Product already exist";
            }
        } else {
            $msg = "Product already exist";
        }
    } else {
        if ($_FILES['image']['type'] != '') {
            if ($_FILES['image']['type'] != 'image/png' && $_FILES['image']['type'] != 'image/jpg' && $_FILES['image']['type'] != 'image/jpeg') {
                $msg = "Please select only png,jpg and jpeg image formate";
                if ($_GET['id'] == 0) {
                    if ($_FILES['image']['type'] != 'image/png' && $_FILES['image']['type'] != 'image/jpg' && $_FILES['image']['type'] != 'image/jpeg') {
                        $msg = "Please select only png,jpg and jpeg image formate";
                    }
                }
            }
        }
    }

    if (isset($_FILES['product_images'])) {
        foreach ($_FILES['product_images']['type'] as $key => $val) {
            if ($_FILES['product_images']['type'][$key] != '') {
                if ($_FILES['product_images']['type'][$key] != 'image/png' && $_FILES['product_images']['type'][$key] != 'image/jpg' && $_FILES['product_images']['type'][$key] != 'image/jpeg') {
                    $msg = "Please select only png,jpg and jpeg image formate";
                }
            }
        }
    }



    if ($msg == '') {
        if (isset($_GET['id']) && $_GET['id'] != '') {
            if ($_FILES['image']['name'] != '') {
                $image = rand(111111111, 999999999) . '_' . $_FILES['image']['name'];
                move_uploaded_file($_FILES['image']['tmp_name'], PRODUCT_IMAGE_SERVER_PATH . $image);
                $update_sql = "update product set categories_id='$categories_id',name='$name',mrp='$mrp',price='$price',qty='$qty',short_desc='$short_desc',description='$description',meta_title='$meta_title',meta_desc='$meta_desc',meta_keyword='$meta_keyword',image='$image',best_seller='$best_seller',sub_categories_id='$sub_categories_id' where id='$id'";
            } else {
                $update_sql = "update product set categories_id='$categories_id',name='$name',mrp='$mrp',price='$price',qty='$qty',short_desc='$short_desc',description='$description',meta_title='$meta_title',meta_desc='$meta_desc',meta_keyword='$meta_keyword',best_seller='$best_seller',sub_categories_id='$sub_categories_id' where id='$id'";
            }
            mysqli_query($conn, $update_sql);
        } else {
            $image = rand(111111111, 999999999) . '_' . $_FILES['image']['name'];
            move_uploaded_file($_FILES['image']['tmp_name'], PRODUCT_IMAGE_SERVER_PATH . $image);
            mysqli_query($conn, "INSERT into product(categories_id,name,mrp,price,qty,short_desc,description,meta_title,meta_desc,meta_keyword,status,image,best_seller,sub_categories_id) values('$categories_id','$name','$mrp','$price','$qty','$short_desc','$description','$meta_title','$meta_desc','$meta_keyword',1,'$image','$best_seller','$sub_categories_id')");
            $id = mysqli_insert_id($conn);
        }
        //MULTIPLE IMAGE SECTION
        if (isset($_GET['id']) && $_GET['id'] != '') {
            foreach ($_FILES['product_images']['name'] as $key => $val) {
                if ($_FILES['product_images']['name'][$key] != '') {
                    if (isset($_POST['product_images_id'][$key])) {
                        $image = rand(111111111, 999999999) . '_' . $_FILES['product_images']['name'][$key];
                        move_uploaded_file($_FILES['product_images']['tmp_name'][$key], PRODUCT_MULTIPLE_IMAGE_SERVER_PATH . $image);
                        mysqli_query($conn, "UPDATE product_images SET product_images='$image'where id='" . $_POST['product_images_id'][$key] . "'");
                    } else {
                        $image = rand(111111111, 999999999) . '_' . $_FILES['product_images']['name'][$key];
                        move_uploaded_file($_FILES['product_images']['tmp_name'][$key], PRODUCT_MULTIPLE_IMAGE_SERVER_PATH . $image);
                        mysqli_query($conn, "INSERT into product_images(product_id,product_images) values('$id','$image')");
                    }
                }
            }
        } else {
            if (isset($_FILES['product_images']['name'])) {
                foreach ($_FILES['product_images']['name'] as $key => $val) {
                    //$_FILES['product_images']['type'][$key]
                    $image = rand(111111111, 999999999) . '_' . $_FILES['product_images']['name'][$key];
                    move_uploaded_file($_FILES['product_images']['tmp_name'][$key], PRODUCT_MULTIPLE_IMAGE_SERVER_PATH . $image);
                    mysqli_query($conn, "INSERT into product_images(product_id,product_images) values('$id','$image')");
                }
            }
        }

        header('location:product.php');
        die();
    }
}
?>
<div class="conntent pb-0">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header"><strong>Product</strong><small> Form</small></div>
                    <form method="post" enctype="multipart/form-data">
                        <div class="card-body card-block">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label for="categories" class=" form-conntrol-label">Categories</label>
                                        <select class="form-control" name="categories_id" id="categories_id" onchange="get_sub_cat('')" required>
                                            <option>Select Category</option>
                                            <?php
                                            $res = mysqli_query($conn, "select id,categories from categories order by categories asc");
                                            while ($row = mysqli_fetch_assoc($res)) {
                                                if ($row['id'] == $categories_id) {
                                                    echo "<option selected value=" . $row['id'] . ">" . $row['categories'] . "</option>";
                                                } else {
                                                    echo "<option value=" . $row['id'] . ">" . $row['categories'] . "</option>";
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="categories" class=" form-control-label">Sub Categories</label>
                                        <select class="form-control" name="sub_categories_id" id="sub_categories_id">
                                            <option>Select Sub Category</option>
                                        </select>
                                    </div>
                                </div>
                            </div>


                            <div class="form-group">

                                <label for="categories" class=" form-control-label">Product Name</label>
                                <input type="text" name="name" placeholder="Enter product name" class="form-control" required value="<?php echo $name ?>">
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-3">

                                        <label for="categories" class=" form-control-label">Best Seller</label>
                                        <select class="form-control" name="best_seller" required>
                                            <option value=''>Select</option>
                                            <?php
                                            if ($best_seller == 1) {
                                                echo '<option value="1" selected>Yes</option>
												<option value="0">No</option>';
                                            } elseif ($best_seller == 0) {
                                                echo '<option value="1">Yes</option>
												<option value="0" selected>No</option>';
                                            } else {
                                                echo '<option value="1">Yes</option>
												<option value="0">No</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col-lg-3">
                                        <label for="categories" class=" form-control-label">MRP</label>
                                        <input type="text" name="mrp" placeholder="Enter product mrp" class="form-control" required value="<?php echo $mrp ?>">
                                    </div>
                                    <div class="col-lg-3">
                                        <label for="categories" class=" form-control-label">PRICE</label>
                                        <input type="text" name="price" placeholder="Enter product price" class="form-control" required value="<?php echo $price ?>">
                                    </div>
                                    <div class="col-lg-3">
                                        <label for="categories" class=" form-control-label">QTY</label>
                                        <input type="text" name="qty" placeholder="Enter product qty" class="form-control" required value="<?php echo $qty ?>">
                                    </div>
                                </div>

                            </div>
                            <div class="form-group">
                                <div class="row" id="image_box">
                                    <div class="col-lg-10">
                                        <label for="categories" class=" form-control-label">IMAGE</label>
                                        <input type="file" name="image" class="form-control" <?php echo $image_required ?>>
                                        <?php
                                        if ($image != '') {
                                            echo "<a target='_blank' href='" . PRODUCT_IMAGE_SITE_PATH . $image . "'><img width='150px' src='" . PRODUCT_IMAGE_SITE_PATH . $image . "'/></a>";
                                        }
                                        ?>
                                    </div>
                                    <div class="col-lg-2">
                                        <label for="categories" class=" form-control-label"></label>
                                        <button id="" type="button" class="btn btn-lg btn-info btn-block" onclick="add_more_images()">
                                            <span id="payment-button-amount">ADD IMAGE</span>
                                        </button>
                                    </div>
                                    <?php
                                    if (isset($multipleImageArr[0])) {
                                        foreach ($multipleImageArr as $list) {
                                            echo '<div class="col-lg-6" style="margin-top:20px;"id="add_image_box_' . $list['id'] . '"> <label for = "categories"class = " form-control-label" > IMAGE </label> <input type = "file"name = "product_images[]"class = "form-control"><button type ="button"class ="btn btn-lg btn-danger btn-block"><span id ="payment-button-amount"> <a href="manage_product.php?id=' . $id . '&pi=' . $list['id'] . '"style="color:white;">Remove</a></span></button >';
                                            echo "<a target='_blank' href='" . PRODUCT_MULTIPLE_IMAGE_SITE_PATH . $list['product_images'] . "'><img width='150px' src='" . PRODUCT_MULTIPLE_IMAGE_SITE_PATH . $list['product_images'] . "'/></a>";
                                            echo ' <input type="hidden" name="product_images_id[]" value="' . $list['id'] . '" /></div>';
                                        }
                                    }
                                    ?>
                                </div>

                            </div>
                            <div class="form-group">
                                <label for="categories" class=" form-control-label">SHORT DESCRIPTION</label>
                                <textarea name="short_desc" placeholder="Enter product short description" class="form-control" required> <?php echo $short_desc ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="categories" class=" form-control-label">DESCRIPTION</label>
                                <textarea name="description" placeholder="Enter product description" class="form-control" required> <?php echo $description ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="categories" class=" form-control-label">META TITLE</label>
                                <textarea name="meta_title" class="form-control"> <?php echo $meta_title ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="categories" class=" form-conntrol-label">META DESCRIPTION</label>
                                <textarea name="meta_desc" class="form-control"><?php echo $meta_desc ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="categories" class=" form-control-label">META KEYWORD</label>
                                <textarea name="meta_keyword" placeholder="Enter product meta keyword" class="form-control"> <?php echo $meta_keyword ?></textarea>
                            </div>
                            <button id="payment-button" name="submit" type="submit" class="btn btn-lg btn-info btn-block">
                                <span id="payment-button-amount">Submit</span>
                            </button>
                            <div class="field_error"><?php echo $msg ?></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function get_sub_cat(sub_cat_id) {
        var categories_id = jQuery('#categories_id').val();
        jQuery.ajax({
            url: 'get_sub_cat.php',
            type: 'post',
            data: 'categories_id=' + categories_id + '&sub_cat_id=' + sub_cat_id,
            success: function(result) {
                jQuery('#sub_categories_id').html(result);
            }
        });
    }
    var total_image = 1;

    function add_more_images() {
        total_image++;
        var html = '<div class="col-lg-6" style="margin-top:20px;"id="add_image_box_' + total_image + '"> <label for = "categories"class = " form-control-label" > IMAGE </label> <input type = "file"name = "product_images[]"class = "form-control"required><button type ="button"class ="btn btn-lg btn-danger btn-block"onclick=remove_image("' + total_image + '")><span id ="payment-button-amount"> Remove </span></button ></div>';
        jQuery('#image_box').append(html);
    }

    function remove_image(id) {
        jQuery('#add_image_box_' + id).remove();
    }
</script>

<?php
require('footer.inc.php');
?>
<script>
    <?php
    if (isset($_GET['id'])) {
    ?>
        get_sub_cat('<?php echo $sub_categories_id ?>');
    <?php } ?>
</script>
<script>
    CKEDITOR.replace('description');
    CKEDITOR.replace('short_desc');
</script>