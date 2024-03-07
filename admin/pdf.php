<?php
include('vendor/autoload.php');
require('config.php');
require('function.inc.php');

if (!$_SESSION['ADMIN_LOGIN']) {
    if (!isset($_SESSION['USER_ID'])) {
        die();
    }
}

$order_id = get_safe_value($conn, $_GET['id']);

$coupon_details = mysqli_fetch_assoc(mysqli_query($conn, "SELECT coupon_value from `order` where id='$order_id'"));
$coupon_value = $coupon_details['coupon_value'];

if (isset($_SESSION['ADMIN_LOGIN'])) {
    $res = mysqli_query($conn, "SELECT distinct(order_detail.id) ,order_detail.*,product.name,product.image from order_detail,product ,`order` where order_detail.order_id='$order_id' and order_detail.product_id=product.id");
} else {
    $uid = $_SESSION['USER_ID'];
    $res = mysqli_query($conn, "SELECT distinct(order_detail.id) ,order_detail.*,product.name,product.image from order_detail,product ,`order` where order_detail.order_id='$order_id' and `order`.user_id='$uid' and order_detail.product_id=product.id");
}

$total_price = 0;

$total_price = $total_price - $coupon_value;



$css = file_get_contents('css/bootstrap.min.css');
$css .= file_get_contents('Saurav.css');


if (mysqli_num_rows($res) == 0) {
    die();
}
while ($row = mysqli_fetch_assoc($res)) {
    $gst = $row['price'] * 0.18;
    $rate = $row['price'] - $gst;
    $total_price = $total_price + ($row['qty'] * $row['price']);
    $finaltotal = $gst + $rate + $coupon_value;
    $pp = $row['qty'] * $row['price'];
    $html .= '<table border="1" width="100%">
<tr >
   <th style="text-align:left;font-size: 14px;padding-bottom: 15px;padding-left:5px;"rowspan="3" >Computer World<br>City Tower,Opp.Glaxy Hall,
   Salmar,Main Road,Karkala-574104<br><br><font style="font-weight: normal;">Ph: 9880032319<br>
   STATE:Karnataka<br>
   E-mail:computerworldkarkala@gmail.comz</font></th>
   <th style="text-align:center;padding: 10px 8px;" colspan="2" ><font style="font-size: 32px;"><img src="1.jpeg" width="50" height="50"alt=""> Computer World</font></th>
   
</tr>

<tr>
<td style="text-align:left;font-size: 14px;padding-bottom: 10px;padding-left:5px;"><b>Invoice No.</b><br>TI-90</td>
<td style="text-align:left;font-size: 14px;padding-bottom: 10px;padding-left:5px;"><b>Dated</b><br>24/12/2000</td>
</tr>

<tr>
<td style="text-align:left;font-size: 14px;padding-bottom: 10px;padding-left:5px;"><b>e-way bill no.</b><br>12344577</td>
<td style="text-align:left;font-size: 14px;padding-bottom: 10px;padding-left:5px;"><b>Mode terms of Payment:</b><br>Credit/Cash</td>
</tr>

<tr>
<td style="text-align:top;font-size: 14px;padding-bottom: 10px;padding-left:5px;" rowspan="4"><b>Customer Address:</b><br Ammerna Illa, Jodukatte, bala BVC, Karkal,Udupi-571420></td>
</tr>

<tr>
<td style="text-align:left;font-size: 14px;padding-bottom: 10px;padding-left:5px;"><b>Buyers Order No.</b></td>
<td style="text-align:left;font-size: 14px;padding-bottom: 10px;padding-left:5px;"><b>Dated</b></td>
</tr>

</table>

<table border="1" width="100%" >
<tr>
<th style="text-align:center;padding:10px;">SI No</th>
<th style="text-align:center;padding:10px;">Description of goods</th>
<th style="text-align:center;padding:10px;">GST Rate</th>
<th style="text-align:center;padding:10px;">Quantity</th>
<th style="text-align:center;padding:10px;">Rate</th>
<th style="text-align:center;padding:10px;">Disc %</th>
<th style="text-align:center;padding:10px;">Amount</th>
</tr>

<tr>
<td style="text-align:center;" height="100px">1</td>
<td style="text-align:center;" height="100px">' . $row['name'] . '</td>
<td style="text-align:center;" height="100px">' . $gst . '</td>
<td style="text-align:center;" height="100px">' . $row['qty'] . '</td>
<td style="text-align:center;" height="100px">' . $rate . '</td>
<td style="text-align:center;" height="100px">' . $coupon_value . '</td>
<td style="text-align:center;" height="100px">' . $finaltotal . '</td>
</tr>

<tr>
<td></td>
<td><b>Total</b></td>
<td></td>
<td></td>
<td></td>
<td></td>
<td style="text-align:center;">' . $finaltotal . '</td>
</tr>
</table>
<table border="1">
<tr>
<td style="text-align:left;font-size: 14px;padding-bottom: 20px;padding-left:5px;"><b><u>Declarartion:</u></b><br>
We decalre that this invoice show the actual price of the goods described and that all particulars are true and correct</td>
<td style="text-align:bottom; padding-top:10px;"><b>Authorized signatory</b></td>
</tr>
</table>';
}
$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML($css, 1);
$mpdf->WriteHTML($html, 2);
$file = time() . '.pdf';
$mpdf->Output($file, 'D');
?>