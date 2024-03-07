<?php
require('config.php');
require('function.inc.php');
echo '<b>Transaction In Process, Please do not reload</b>';
if (isset($_GET['payment_status']) && isset($_GET['payment_id']) && isset($_GET['payment_request_id'])) {
	$payment_id = $_GET['payment_id'];
	$payment_status = $_GET['payment_status'];
	$payment_request_id = $_GET['payment_request_id'];

	$res = mysqli_query($conn, "SELECT `order`. *,regi.username from `order`,regi where `order`.txnid='$payment_request_id'and `order`.user_id=regi.id");
	if (mysqli_num_rows($res) > 0) {
		$row = mysqli_fetch_assoc($res);
		$oid = $row['id'];
		$user_id = $row['user_id'];
		$_SESSION['USER_LOGIN'] = 'yes';
		$_SESSION['USER_ID'] = $user_id;
		$_SESSION['USER_NAME'] = $row['username'];
		if ($payment_status == 'Credit') {
			$res = mysqli_query($conn, "SELECT * from`order` where taxid='$payment_request_id'");
			mysqli_query($conn, "update `order` set payment_status='complete', mihpayid='$payment_id' where txnid='$payment_request_id'");
			sentInvoice($conn, $oid);
?>
			<script>
				window.location.href = 'thank_you.php';
			</script>
		<?php
		} else {
			mysqli_query($conn, "update `order` set payment_status='failed', mihpayid='$payment_id' where txnid='$payment_request_id'");
		?>
			<script>
				window.location.href = 'payment_fail.php';
			</script>
	<?php
		}
	}
} else {
	?>
	<script>
		window.location.href = 'index.php';
	</script>
<?php
}
?>