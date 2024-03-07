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
        $update_status_sql = "update service set status='$status' where id='$id'";
        mysqli_query($conn, $update_status_sql);
    }

    if ($type == 'delete') {
        $id = get_safe_value($conn, $_GET['id']);
        $delete_sql = "delete from service where id='$id'";
        mysqli_query($conn, $delete_sql);
    }
}

$sql = "SELECT * from service";
$res = mysqli_query($conn, $sql);
?>
<div class="content pb-0">
    <div class="orders">
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="box-link">Service </h4>
                        <h4 class="box-title"><a href="manage_service.php">Add Service</a> </h4>
                    </div>
                    <div class="card-body--">
                        <div class="table-stats order-table ov-h">
                            <table class="table ">
                                <thead>
                                    <tr>
                                        <th class="serial">#</th>
                                        <th width="2%">ID</th>
                                        <th width="10%"> Name</th>
                                        <th width="10%">Phone</th>
                                        <th width="20%">Address</th>
                                        <th width="2%">Email</th>
                                        <th width="2%">Warranty</th>
                                        <th width="7%">Remark</th>
                                        <th width="39%"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    while ($row = mysqli_fetch_assoc($res)) { ?>
                                        <tr>
                                            <td class="serial"><?php echo $i ?></td>
                                            <td class="product-add-to-cart"><a href="service_master_detail.php?id=<?php echo $row['id'] ?>"> <?php echo $row['id'] ?></a><br />
                                                <a href="../service_pdf.php?id=<?php echo $row['id'] ?>">PDF</a>
                                            </td>
                                            </td>
                                            <td><?php echo $row['Name'] ?></td>
                                            <td><?php echo $row['Phone'] ?></td>
                                            <td><?php echo $row['addr'] ?></td>
                                            <td><?php echo $row['Email'] ?></td>
                                            <td><?php echo $row['Warranty'] ?>
                                            <td><?php echo $row['Issues'] ?><br />

                                            </td>
                                            <td>
                                                <?php
                                                if ($row['status'] == 1) {
                                                    echo "<span class='badge badge-complete'><a href='?type=status&operation=deactive&id=" . $row['id'] . "'>Active</a></span>&nbsp;";
                                                } else {
                                                    echo "<span class='badge badge-pending'><a href='?type=status&operation=active&id=" . $row['id'] . "'>Deactive</a></span>&nbsp;";
                                                }
                                                echo "<span class='badge badge-edit'><a href='manage_service.php?id=" . $row['id'] . "'>Edit</a></span>&nbsp;";

                                                echo "<span class='badge badge-delete'><a href='?type=delete&id=" . $row['id'] . "'>Delete</a></span>";

                                                ?>
                                            </td>
                                        </tr>
                                    <?php } ?>
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