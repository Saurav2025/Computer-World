
<?php
include('vendor/autoload.php');
require('config.php');
require('function.inc.php');
$css = file_get_contents('css/bootstrap.min.css');
$css .= file_get_contents('Saurav.css');
$service_id = get_safe_value($conn, $_GET['id']);

if (isset($_SESSION['ADMIN_LOGIN'])) {
   $res = mysqli_query($conn, "SELECT * FROM service where service.id='$service_id'");
} else {
   $uid = $_SESSION['USER_ID'];
   $res = mysqli_query($conn, "SELECT * FROM service where service.id='$service_id' and service.coustomer_id='$uid'");
}
$total_price = 0;
if (mysqli_num_rows($res) == 0) {
   die();
}
while ($row = mysqli_fetch_assoc($res)) {
   $html = '<div class="wishlist-table table-responsive">
 <table border="2" width=100% id="tab">
   <thead>
   <tbody>
   <tr>
   <th colspan="2" height="100px">
      <font style="font-size: 32px;"><img src="1.jpeg" width="50" height="50"alt=""> Computer World</font>
  </th>
  <th colspan="2" height="90px" style="text-align: left;vertical-align: top;">Authorized Service Center <br>
      Computer World <br>
      Fortune Plaza Brahmagiri,Karkala <br>
      Opposite of Galaxy -574102</th>
</tr>
<tr>
     <td colspan="2">Customer ID:' . $row['coustomer_id'] . '</td>
  <td colspan="2">Customer Name:' . $row['Name'] . '</td>
</tr>
<tr>
  <td>Date/Time:</td>
  <td>' . $row['added_on'] . ' </td>
  <td rowspan="3" , colspan="2">Customer Address:<br>' . $row['addr'] . ' </td>
  </tr>
<tr>
  <td>Brand:</td>
  <td>' . $row['Brand'] . '</td>
  </tr>
<tr>
  <td>Model:</td>
  <td>' . $row['Series'] . '</td>
</tr>
  <tr>
  <td>Dtae of purchase:</td>
  <td>' . $row['purshase_date'] . '</td>
  <td rowspan="2" , colspan="2">Customer Remarks:' . $row['Issues'] . '</td>
</tr>
<tr>
  <td>Set type:Under Warranty(YES/NO)</td>
  <td>' . $row['Warranty'] . '</td>
</tr>
<tr>
        <td>SL No:</td>
        <td>' . $row['serialno'] . '</td>
        <td width=25%>Phone:</td>
        <td colspan="1">8722157983</td>
     </tr>

     <tr>
        <td>Estimate:</td>
        <td>1000</td>
        <td>Mobile:</td>
        <td colspan="1">765654453</td>
     </tr>
     <tr>
        <td colspan="2" style="text-align: center;">Condition of Equipment</td>
        <td colspan="2">Compalint type: ' . $row['comp_type'] . '</td>
     </tr>

     <tr>
        <td colspan="2" height="50px"></td>
        <td colspan="2" height="50px">Complaint:  ' . $row['comp'] . '</td>
     </tr>

      <tr>
        <td colspan="2" style="text-align: center;">Job done</td>
        <td colspan="2" style="text-align: center;">Customer Rating</td>
     </tr>
     <tr>
        <td colspan="2" height="100px"></td>
        <td colspan="2" height="100px" style="text-align: center;vertical-align: top;">Pleaase rate our service experience on <br> the scale of Bad(0-4) Good(5-7) Excellent(8-10) <br>
            <center>
                <table border="2" style="border-collapse:collapse;">
                    <tr>
                        <th>Bad</th>
                        <th>Good</th>
                        <th>Excellent</th>
                    </tr>
                    <tr>
                        <td height="15px"></td>
                        <td height="15px"></td>
                        <td height="15px"></td>
                    </tr>
                </table>
            </center>
        </td>
     </tr>
     <tr>
        <td>Job Completed <br>
            Date</td>
        <td>' . $row['job_complete'] . '</td>
        <td>Repair Code:</td>
        <td>' . $row['repair_code'] . '</td>
     </tr>

        <tr>
        <td>Delivered Date</td>
        <td>' . $row['delivery_date'] . '</td>
        <td>Defect Part:</td>
        <td>' . $row['defect_code'] . '</td>
     </tr><tr>
     <td height="130px" colspan="2" style="vertical-align: top;text-align: center;">CUSTOMER SIGNATURE(WITH DATE/TIME)</td>
     <td height="90px" colspan="2" style="vertical-align: top;text-align: center;">SIGNATURE OF ENG(WITH DATE/TIME)</td>
  </tr>

  <tr>
     <td colspan="2">Defective if recieved by customer(If any): <br>
         (YES/NO)</td>
     <TD colspan="2"></TD>
     </tr>
     
        <tr>
        <td colspan="4" height="130px" style="text-align: center;vertical-align: top;">ENGINEER REMARKS:</td>
     </tr>
     <tr>
        <td colspan="1" height="5px" style="text-align: center;vertical-align: top;">INVOICE ID:<br>' . $row['id'] . '</td>
     </tr>';
   $html .= '</tbody>
</table> 
</div>';
}
// $mpdf = new \Mpdf\Mpdf();
$mpdf = new \Mpdf\Mpdf(['orientation' => 'P']);
//$mpdf = new \Mpdf\Mpdf(array('A5', '', 0, '', 155, 155, 156, 156, 129, 119, 'L'));
$mpdf->WriteHTML($css, 1);
$mpdf->WriteHTML($html, 2);
$file = time() . '.pdf';
$mpdf->Output($file, 'D');
?>