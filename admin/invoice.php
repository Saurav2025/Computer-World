<?php
include('vendor/autoload.php');
require('config.php');
require('function.inc.php');
$css = file_get_contents('css/bootstrap.min.css');
$css .= file_get_contents('Saurav.css');

?>

<?php
$html .= '<div class="wishlist-table table-responsive">
<table border="2" width=100% id="tab">
  <thead>
  <tbody>
  <tr>
  <th colspan="2" height="100px">
     <font style="font-size: 32px;"><img src="1.jpeg" width="50" height="50"alt=""> Computer World Service </font>
 </th>
 <th colspan="2" height="90px" style="text-align: left;vertical-align: top;">Authorized Service Center <br>
     Computer World <br>
     Fortune Plaza Brahmagiri,Karkala <br>
     Opposite of Galaxy -574102</th>
</tr>
<tr>
    <td colspan="2">Customer ID:11</td>
 <td colspan="2">Customer Name:Saurav</td>
</tr>
<tr>
 <td>Date/Time:</td>
 <td>Tuesdat </td>
 <td rowspan="3" , colspan="2">Customer Address:Sri Vaishnavi Girls And Working Women Hostel H.No. 3-4-466 Lingampally, Naryanguda, Opposite Reddy Womens College HyderabadTelangana 500027</td>
 </tr>
<tr>
 <td>Brand:</td>
 <td>Monitor</td>
 </tr>
<tr>
 <td>Model:</td>
 <td>SEryeh</td>
</tr>
 <tr>
 <td>Dtae of purchase:</td>
 <td>Moday</td>
 <td rowspan="2" , colspan="2">Customer Remarks:sfgfdsgfsd</td>
</tr>
<tr>
 <td>Set type:Under Warranty(YES/NO)</td>
 <td>YES</td>
</tr>
<tr>
       <td>SL No:</td>
       <td>EKS</td>
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
       <td colspan="2">Compalint type: SFGFGdfgdd</td>
    </tr>

    <tr>
       <td colspan="2" height="50px"></td>
       <td colspan="2" height="50px">Complaint: DHDGHFGDFGD</td>
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
       <td>ANLE</td>
       <td>Repair Code:</td>
       <td>DHDFGHFDGFDGFG</td>
    </tr>

       <tr>
       <td>Delivered Date</td>
       <td>DDDDD</td>
       <td>Defect Part:</td>
       <td>DDDDD</td>
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
    </tr>';
$html .= '</tbody>
</table> 
</div>';
// $mpdf = new \Mpdf\Mpdf();
$mpdf = new \Mpdf\Mpdf(['orientation' => 'L']);
//$mpdf = new \Mpdf\Mpdf(array('A5', '', 0, '', 155, 155, 156, 156, 129, 119, 'L'));
$mpdf->WriteHTML($css, 1);
$mpdf->WriteHTML($html, 2);
$file = time() . '.pdf';
$mpdf->Output($file, 'I');
