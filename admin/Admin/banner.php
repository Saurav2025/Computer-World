<?php
require('top.inc.php');
if (isset($_GET['type']) && $_GET['type'] != '') {
    $type = get_safe_value($conn, $_GET['type']);
    if ($type == 'status') {
        $operation = get_safe_value($conn, $_GET['operation']);
        $id = get_safe_value($conn, $_GET['id']);
        if ($operation == 'active') {
            $status = '1';
        } else {
            $status = '0';
        }
        $update_status_sql = "update banner set status='$status' where id='$id'";
        mysqli_query($conn, $update_status_sql);
    }
    if ($type == 'delete') {
        $id = get_safe_value($conn, $_GET['id']);
        $delete_sql = "delete from banner where id='$id'";
        mysqli_query($conn, $delete_sql);
    }
}

$sql = "select * from banner order by id asc";
$res = mysqli_query($conn, $sql);
?>
<div class="content pb-0">
    <div class="orders">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="box-link">Banner</h4>
                        <h4 class="box-title"><a href="manage_banner.php">Add Banner</a></h4>
                    </div>
                    <div class="card-body--">
                        <div class="table-stats order-table ov-h">
                            <table class="table ">
                                <thead>
                                    <tr>
                                        <th class="serial">#</th>
                                        <th>Heading1</th>
                                        <th>Heading2</th>
                                        <th>Button Text</th>
                                        <th>Button Link</th>
                                        <th>Order Number</th>
                                        <th>Image</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    while ($row = mysqli_fetch_assoc($res)) { ?>
                                        <tr>
                                            <td class="serial"><?php echo $i ?></td>
                                            <td><?php echo $row['heading1'] ?></td>
                                            <td><?php echo $row['heading2'] ?></td>
                                            <td><?php echo $row['btn_text'] ?></td>
                                            <td><?php echo $row['btn_link'] ?></td>
                                            <td><?php echo $row['order_no'] ?></td>
                                            <td>
                                                <?php

                                                echo "<a target='_blank' href='" . BANNER_IMAGE_SITE_PATH . $row['image']  . "'><img width='150px' src='" . BANNER_IMAGE_SITE_PATH . $row['image'] . "'/></a>";
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                if ($row['status'] == 1) {
                                                    echo "<span class='badge badge-complete'><a href='?type=status&operation=deactive&id=" . $row['id'] . "'>Active</a></span>&nbsp;";
                                                } else {
                                                    echo "<span class='badge badge-pending'><a href='?type=status&operation=active&id=" . $row['id'] . "'>Deactive</a></span>&nbsp;";
                                                }
                                                echo "<span class='badge badge-edit'><a href='manage_banner.php?id=" . $row['id'] . "'>Edit</a></span>&nbsp;";
                                                echo "<span class='badge badge-delete'><a href='?type=delete&id=" . $row['id'] . "'>Delete</a></span>&nbsp;";
                                                // echo "&nbsp;<a href='?type=delete&id=" . $row['id'] . "'>Edit</a>";
                                                ?>
                                            </td>
                                        </tr>
                                    <?php  } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
require('footer.inc.php');
?>