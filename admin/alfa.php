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
$css = file_get_contents('css/bootstrap.min.css');
$css .= file_get_contents('Saurav.css');

?>
<style>
    .styl {

        border-bottom: 1px solid #c1c1c1;
        border-right: 1px solid #c1c1c1;
        color: #000;
        font-family: Times New Roman;
        font-size: 16px;
        font-weight: 600;
    }
</style>
<?php
if (isset($_SESSION['ADMIN_LOGIN'])) {
    $res = mysqli_query($conn, "SELECT distinct(order_detail.id) ,order_detail.*,product.name,product.image from order_detail,product ,`order` where order_detail.order_id='$order_id' and order_detail.product_id=product.id");
} else {
    $uid = $_SESSION['USER_ID'];
    $res = mysqli_query($conn, "SELECT distinct(order_detail.id) ,order_detail.*,product.name,product.image from order_detail,product ,`order` where order_detail.order_id='$order_id' and `order`.user_id='$uid' and order_detail.product_id=product.id");
}

$total_price = 0;
if (mysqli_num_rows($res) == 0) {
    die();
}
while ($row = mysqli_fetch_assoc($res)) {
    $total_price = $total_price + ($row['qty'] * $row['price']);
    $pp = $row['qty'] * $row['price'];
    $html = '
 <div class="styl" >
<h4 >TAX INVOICE</h4>
<table border="1" width="100%">
      <tr >
         <th style="text-align:left;font-size: 16px;padding-bottom: 15px;padding-left:5px;"rowspan="3" >Computer World<br>III floor Kunil complex Mangaluru-574102 <br><br><font style="font-weight: normal;">Ph: 734884781<br>
         GSTIN:29BNFPC4164A1ZF <br>
         STATE:<br>
         E-mail:</font></th>
         <th style="text-align:center;padding: 10px 8px;" colspan="2" ><font style="font-size: 32px;"><img src="1.jpeg" width="50" height="50"alt=""> Computer World</font></th>
         
      </tr>

   <tr>
   <td style="text-align:left;font-size: 16px;padding-bottom: 10px;padding-left:5px;"><b>Invoice No.</b><br>TI-90</td>
   <td style="text-align:left;font-size: 16px;padding-bottom: 10px;padding-left:5px;"><b>Dated</b><br>24/12/2000</td>
   </tr>

   <tr>
   <td style="text-align:left;font-size: 16px;padding-bottom: 10px;padding-left:5px;"><b>e-way bill no.</b><br>12344577</td>
    <td style="text-align:left;font-size: 16px;padding-bottom: 10px;padding-left:5px;"><b>Mode terms of Payment:</b><br>Credit/Cash</td>
  </tr>

  <tr>
  <td style="text-align:top;font-size: 16px;padding-bottom: 100px;padding-left:5px;" rowspan="4"><b>Customer Address:</b><br Ammerna Illa, Jodukatte, bala BVC, Karkal,Udupi-571420></td>
  <td style="text-align:left;font-size: 16px;padding-bottom: 10px;padding-left:5px;"><b>Suppliers Ref</b><br> 01234567891234</td>
  <td style="text-align:left;font-size: 16px;padding-bottom: 10px;padding-left:5px;"><b>Other Reference</b></td>
  </tr>

  <tr>
  <td style="text-align:left;font-size: 16px;padding-bottom: 10px;padding-left:5px;"><b>Buyers Order No.</b></td>
  <td style="text-align:left;font-size: 16px;padding-bottom: 10px;padding-left:5px;"><b>Dated</b></td>
  </tr>

  <tr>
  <td style="text-align:left;font-size: 16px;padding-bottom: 10px;padding-left:5px;"><b>Despatch Document</b></td>
  <td style="text-align:left;font-size: 16px;padding-bottom: 10px;padding-left:5px;"><b>Delivery Note Date</b></td>
  </tr>
  <tr>
  <td style="text-align:left;font-size: 16px;padding-bottom: 10px;padding-left:5px;"><b>Despatched Through</b></td>
  <td style="text-align:left;font-size: 16px;padding-bottom: 10px;padding-left:5px;"><b>Destination</b></td>
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
   <td style="text-align:center;" height="100px">SERVICE CHARGES-UPS REAPIR CHARGES</td>
   <td style="text-align:center;" height="100px">18.00</td>
   <td style="text-align:center;" height="100px">1.00 Pcs</td>
   <td style="text-align:center;" height="100px">700.00</td>
   <td style="text-align:center;" height="100px">0.00</td>
   <td style="text-align:center;" height="100px">700.00</td>
   </tr>

   <tr>
   <td></td>
   <td><b>Total</b></td>
   <td></td>
   <td></td>
   <td></td>
   <td></td>
   <td style="text-align:center;">826.00</td>
   </tr>

   <tr> 
   <td style="text-align:left;font-size: 16px;padding-bottom: 10px;padding-left:5px;" colspan="9"><b>Amount Chargeable (In Words):</b> Rupees</td>
   </tr>
   </table>

   <table border="1" width="100%">
   <tr>
   <th style="text-align:center;padding:10px;" rowspan="2">HSNCODE</th>
   <th style="text-align:center;padding:10px;" rowspan="2">TAXABLE VALUE</th>
   <th  style="text-align:center" colspan="2">CGST</th>
   <th  style="text-align:center" colspan="2">SGST</th>
   <th  style="text-align:center" colspan="2">IGST</th>
   <th style="text-align:center;padding:10px;" rowspan="2">Total Tax</th>
   </tr>

   <tr>
   <th>Rate</th>
   <th>Amount</th>
   <th>Rate</th>
   <th>Amount</th>
   <th>Rate</th>
   <th>Amount</th>
   </tr>

   <tr>
   <td style="text-align:center;" height="50px" ></td>
   <td style="text-align:center;" height="50px">700.00</td>
   <td style="text-align:center;" height="50px">00.00</td>
   <td style="text-align:center;" height="50px">0.00</td>
   <td style="text-align:center;" height="50px">0.00</td>
   <td style="text-align:center;" height="50px">0.00</td>
   <td style="text-align:center;" height="50px">18.00</td>
   <td style="text-align:center;" height="50px">126.00</td>
   <td style="text-align:center;" height="50px">126.00</td>
   </tr>

   <tr>
   <td height="50px"><b>Total</b></td>
   <td style="text-align:center;" height="50px">700.00</td>
   <td style="text-align:center;" height="50px"></td>
   <td style="text-align:center;" height="50px">0.00</td>
   <td style="text-align:center;" height="50px"></td>
   <td style="text-align:center;" height="50px">0.00</td>
   <td style="text-align:center;" height="50px"></td>
   <td style="text-align:center;" height="50px">126.00</td>
   <td style="text-align:center;" height="50px">126</td>
   </tr>
   </table>

   <table border="1">
   <tr>
   <td style="text-align:top;font-size: 16px;padding-bottom: 100px;padding-left:5px;" rowspan="5"><b>Tax Amount (In Words) </b><br>Rupees Two Hundred Only<br><br>
   <b>Companys GSTIN:29BFNFPC412AMME</b></td>
   <td style="text-align:left;font-size: 16px;padding-bottom: 10px;padding-left:5px;"><b>Date and Time:</b> 22/43/7364</td>
   </tr>

   <tr>
   <td style="text-align:left;font-size: 16px;padding-bottom: 10px;padding-left:5px;"><b>Company Bank Details</b></td>
   </tr>

   <tr>
   <td style="text-align:left;font-size: 16px;padding-bottom: 10px;padding-left:5px;"><b>Bank Name:</b><br>KARNATAKA BANK</td>
   </tr>

   <tr>
   <td style="text-align:left;font-size: 16px;padding-bottom: 10px;padding-left:5px;"><b>Account No:</b><br>016322100532290</td>
   </tr>

   <tr>
   <td style="text-align:left;font-size: 16px;padding-bottom: 10px;padding-left:5px;"><b>Branch & IFSC Code:</b><br>SYNB000455</td>
   </tr>

   <tr>
   <td style="text-align:left;font-size: 16px;padding-bottom: 20px;padding-left:5px;"><b><u>Declarartion:</u></b><br>
   We decalre that this invoice show the actual price of the goods described and that all particulars are true and correct</td>
   <td style="text-align:right; padding-top:100px;"><b>Authorized signatory</b></td>
   </tr>
   </table>
</div>';
}
$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML($css, 1);
$mpdf->WriteHTML($html, 2);
$file = time() . '.pdf';
$mpdf->Output($file, 'I');
