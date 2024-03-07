<?php
require('top.inc.php');
$name = '';
$email = '';
$phone = '';
$address = '';
$brand = '';
$series = '';
$warranty = '';
$date    = '';
$issue    = '';
$estimate    = '';
$purshase_date = '';
$comp_type = '';
$compliant = '';
$repair_code = '';
$defect_code = '';
$job_compl_date = '';
$delivery_date = '';
$serial_number = '';


$msg = '';

if (isset($_GET['id']) && $_GET['id'] != '') {
    $id = get_safe_value($conn, $_GET['id']);
    $res = mysqli_query($conn, "SELECT * from service where id='$id'");
    $check = mysqli_num_rows($res);
    if ($check > 0) {
        $row = mysqli_fetch_assoc($res);
        $name = $row['Name'];
        $email = $row['Email'];
        $phone = $row['Phone'];
        $address = $row['addr'];
        $brand = $row['Brand'];
        $series = $row['Series'];
        $warranty = $row['Warranty'];
        $date    = $row['Date'];
        $issue    = $row['Issues'];
        $serial_number = $row['serialno'];
        $estimate    = $row['Estimate'];
        $purshase_date = $row['purshase_date'];
        $comp_type = $row['comp_type'];
        $compliant = $row['comp'];
        $repair_code = $row['repair_code'];
        $defect_code = $row['defect_code'];
        $job_compl_date = $row['job_complete'];
        $delivery_date = $row['delivery_date'];
    } else {
        header('location:service_master.php');
        die();
    }
}

if (isset($_POST['submit'])) {
    $name = get_safe_value($conn, $_POST['name']);
    $email = get_safe_value($conn, $_POST['email']);
    $phone = get_safe_value($conn, $_POST['phone']);
    $address = get_safe_value($conn, $_POST['addr']);
    $brand = get_safe_value($conn, $_POST['brand']);
    $series = get_safe_value($conn, $_POST['series']);
    $warranty = get_safe_value($conn, $_POST['warrnty']);
    $date    = get_safe_value($conn, $_POST['dwarranty']);
    $issue    = get_safe_value($conn, $_POST['issue']);
    $serial_number = get_safe_value($conn, $_POST['serial']);
    $estimate    = get_safe_value($conn, $_POST['estimate']);
    $purshase_date = get_safe_value($conn, $_POST['pdate']);
    $comp_type = get_safe_value($conn, $_POST['ctype']);
    $compliant = get_safe_value($conn, $_POST['complaint']);
    $repair_code = get_safe_value($conn, $_POST['rcode']);
    $defect_code = get_safe_value($conn, $_POST['dcode']);
    $job_compl_date = get_safe_value($conn, $_POST['jdate']);
    $delivery_date = get_safe_value($conn, $_POST['ddate']);

    $added_on = date('Y-m-d h:i:s');
    $service_status = '1';
    if ($msg == '') {
        if (isset($_GET['id']) && $_GET['id'] != '') {
            mysqli_query($conn, "UPDATE service set Name='$name',Email='$email',Phone='$phone',addr='$address',Brand='$brand',Series='$series',Warranty='$warranty',Date='$date',Issues='$issue',serialno='$serial_number',Estimate='$estimate',purshase_date='$purshase_date',comp_type='$comp_type',comp='$compliant',repair_code='$repair_code',defect_code='$defect_code',job_complete='$job_compl_date',delivery_date='$delivery_date'where id='$id'");
        } else {
            mysqli_query($conn, "INSERT into service(Name,Email,Phone,addr,Brand,Series, Warranty, Date, Issues,added_on,service_status,serialno,Estimate,purshase_date,comp_type,comp,repair_code,defect_code,job_complete,delivery_date) values('$name','$email','$phone','$address','$brand','$series','$warranty','$date','$issue','$added_on','$service_status','$serial_number','$estimate','$purshase_date','$comp_type','$compliant','$repair_code','$defect_code','$job_compl_date','$delivery_date')");
        }
        header('location:service_master.php');
        die();
    }
}
?>
<div class="conntent pb-0">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header"><strong>Service</strong><small> Form</small></div>
                    <?php
                    if (isset($_GET['id']) && $_GET['id'] != '') {
                        ?>
                    <form method="post" enctype="multipart/form-data">
                        <div class="card-body card-block">
                            <div class="form-group">
                                <label for="categories" class=" form-control-label">Coustomer Name</label>
                                <input type="text" name="name" readonly="readonly" placeholder="Enter coustomer name" class="form-control" required value="<?php echo $name ?>">
                            </div>

                            <div class="form-group">
                                <label for="categories" class=" form-control-label">E-Mail</label>
                                <input type="email" name="email"  readonly="readonly" placeholder="Enter E-Mail" class="form-control" required value="<?php echo $email ?>">
                            </div>
                            <div class="form-group">
                                <label for="categories" class=" form-control-label">Phone</label>
                                <input type="number" name="phone"  readonly="readonly" placeholder="Enter phone number" class="form-control" required value="<?php echo $phone ?>">
                            </div>
                            <div class="form-group">
                                <label for="categories" class=" form-control-label">Address</label>
                                <textarea name="addr" placeholder="Enter address"  readonly="readonly" class="form-control" required> <?php echo $address ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="categories" class=" form-control-label">Brand</label>
                                <input type="text" name="brand" placeholder="Enter brand"  readonly="readonly" class="form-control" required value="<?php echo $brand ?>">
                            </div>
                            <div class="form-group">
                                <label for="categories" class=" form-control-label">Series</label>
                                <input type="text" name="series" placeholder="Enter Series"  readonly="readonly" class="form-control" required value="<?php echo  $series ?>">
                            </div>
                            <div class="form-group">
                                <label for="categories" class=" form-conntrol-label">Warranty</label>
                                <?php echo  $warranty ?>
                                <select  readonly="readonly" class="form-control" name="warrnty" required>
                                   <option> <?php echo  $warranty ?> </option>
                                    <!--<option value="Yes">Yes</option>
                                    <option value="No">No</option> !-->
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="categories" class=" form-control-label">Warranty Date</label>
                                <input type="date"  readonly="readonly" name="dwarranty" placeholder="Enter Warranty Date" class="form-control" required value="<?php echo  $date ?>">
                            </div>

                            <div class="form-group">
                                <label for="categories" class=" form-control-label">Issues</label>
                                <textarea name="issue" readonly="readonly" placeholder="Enter Issue" class="form-control" required> <?php echo $issue ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="categories" class=" form-control-label">Estimation Amount</label>
                                <input type="number" name="estimate" placeholder="Enter Estimation Amount" class="form-control" required value="<?php echo  $estimate ?>">
                            </div>
                            <div class="form-group">
                                <label for="categories" class=" form-control-label">Serial Number</label>
                                <input type="text" name="serial" placeholder="Enter Serial Number" class="form-control" required value="<?php echo  $serial_number ?>">
                            </div>

                            <div class="form-group">
                                <label for="categories" class=" form-control-label">Purshase-Date</label>
                                <input type="date" name="pdate" id="war" placeholder="Enter Purshase Date" class="form-control" required value="<?php echo  $purshase_date ?>">
                            </div>
                            <div class="form-group">
                                <label for="categories" class=" form-control-label">Complaint Type</label>
                                <input type="text" name="ctype" placeholder="Enter Complaint Type" class="form-control" required value="<?php echo  $comp_type ?>">
                            </div>
                            <div class="form-group">
                                <label for="categories" class=" form-control-label">Complaint</label>
                                <input type="text" name="complaint" placeholder="Enter Complaint" class="form-control" required value="<?php echo  $compliant ?>">
                            </div>
                            <div class="form-group">
                                <label for="categories" class=" form-control-label">Repair Code</label>
                                <input type="text" name="rcode" placeholder="Enter Repair Code" class="form-control" required value="<?php echo   $repair_code ?>">
                            </div>
                            <div class="form-group">
                                <label for="categories" class=" form-control-label">Defect Part</label>
                                <input type="text" name="dcode" placeholder="Enter Defect Part" class="form-control" required value="<?php echo   $defect_code ?>">
                            </div>
                          
                            <div class="form-group">
                                <label for="categories" class=" form-control-label">Job Completion Date</label>
                                <input type="date" name="jdate" id="war1" placeholder="Enter Job Completion Date" class="form-control" required value="<?php echo  $job_compl_date ?>">
                            </div>
                            <div class="form-group">
                                <label for="categories" class=" form-control-label">Delivery Date</label>
                                <input type="date" name="ddate" id="war2" placeholder="Enter Delivery Date" class="form-control" required value="<?php echo  $delivery_date ?>">
                            </div>
                            <button id="payment-button" name="submit" type="submit" class="btn btn-lg btn-info btn-block">
                                <span id="payment-button-amount">Submit</span>
                            </button>
                            <div class="field_error"><?php echo $msg ?></div>
                        </div>
                    </form>
                    <?php
                    }else{?>
                      <form method="post" enctype="multipart/form-data">
                        <div class="card-body card-block">
                            <div class="form-group">
                                <label for="categories" class=" form-control-label">Coustomer Name</label>
                                <input type="text" name="name" placeholder="Enter coustomer name" class="form-control" required value="<?php echo $name ?>">
                            </div>

                            <div class="form-group">
                                <label for="categories" class=" form-control-label">E-Mail</label>
                                <input type="email" name="email" placeholder="Enter E-Mail" class="form-control" required value="<?php echo $email ?>">
                            </div>
                            <div class="form-group">
                                <label for="categories" class=" form-control-label">Phone</label>
                                <input type="number" name="phone" placeholder="Enter phone number" class="form-control" required value="<?php echo $phone ?>">
                            </div>
                            <div class="form-group">
                                <label for="categories" class=" form-control-label">Address</label>
                                <textarea name="addr" placeholder="Enter address" class="form-control" required> <?php echo $address ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="categories" class=" form-control-label">Brand</label>
                                <input type="text" name="brand" placeholder="Enter brand" class="form-control" required value="<?php echo $brand ?>">
                            </div>
                            <div class="form-group">
                                <label for="categories" class=" form-control-label">Series</label>
                                <input type="text" name="series" placeholder="Enter Series" class="form-control" required value="<?php echo  $series ?>">
                            </div>
                            <div class="form-group">
                                <label for="categories" class=" form-conntrol-label">Warranty</label>
                                <select class="form-control" id="language" onChange="update()" name="warrnty" required>
                                    <option value="<?php echo  $warranty ?>"></option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                            </div>
                            <div class="form-group">
                           
                            <label for="categories" class="form-control-label">Warranty Date</label>
                                        Warranty-Expiry (If expired mention when):
                                
                                    <input type="text" id="value" name="dwarranty" placeholder="Enter Warranty Date" class="form-control" required value="<?php echo  $date ?>">
                                    <input type="text" id="text"name="dwarranty" placeholder="Enter Warranty Date" class="form-control" required value="<?php echo  $date ?>">
                                    <input type="date" id="datepicker" name="dwarranty" placeholder="Enter Warranty Date" class="form-control" required value="<?php echo  $date ?>">
                                    <input type="date" id="datepick" name="dwarranty" placeholder="Enter Warranty Date" class="form-control" required value="<?php echo  $date ?>">
                            </div>
                            <!--<div class="form-group">
                                <label for="categories" class=" form-control-label">Warranty Date</label>
                                <input type="date" name="dwarranty" placeholder="Enter Warranty Date" class="form-control" required value="<?php echo  $date ?>">
                            </div> !-->

                            <div class="form-group">
                                <label for="categories" class=" form-control-label">Issues</label>
                                <textarea name="issue" placeholder="Enter Issue" class="form-control" required> <?php echo $issue ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="categories" class=" form-control-label">Estimation Amount</label>
                                <input type="number" name="estimate" placeholder="Enter Estimation Amount" class="form-control" required value="<?php echo  $estimate ?>">
                            </div>
                            <div class="form-group">
                                <label for="categories" class=" form-control-label">Serial Number</label>
                                <input type="text" name="serial" placeholder="Enter Serial Number" class="form-control" required value="<?php echo  $serial_number ?>">
                            </div>

                            <div class="form-group">
                                <label for="categories" class=" form-control-label">Purshase-Date</label>
                                <input type="date" name="pdate" id="demo2" placeholder="Enter Purshase Date" class="form-control" required value="<?php echo  $purshase_date ?>">
                            </div>
                            <div class="form-group">
                                <label for="categories" class=" form-control-label">Complaint Type</label>
                                <input type="text" name="ctype" placeholder="Enter Complaint Type" class="form-control" required value="<?php echo  $comp_type ?>">
                            </div>
                            <div class="form-group">
                                <label for="categories" class=" form-control-label">Complaint</label>
                                <input type="text" name="complaint" placeholder="Enter Complaint" class="form-control" required value="<?php echo  $compliant ?>">
                            </div>
                            <div class="form-group">
                                <label for="categories" class=" form-control-label">Repair Code</label>
                                <input type="text" name="rcode" placeholder="Enter Repair Code" class="form-control" required value="<?php echo   $repair_code ?>">
                            </div>
                            <div class="form-group">
                                <label for="categories" class=" form-control-label">Defect Part</label>
                                <input type="text" name="dcode" placeholder="Enter Defect Part" class="form-control" required value="<?php echo   $defect_code ?>">
                            </div>
                            
                            <div class="form-group">
                                <label for="categories" class=" form-control-label">Job Completion Date</label>
                                <input type="date" name="jdate" id="demo1" placeholder="Enter Job Completion Date" class="form-control" required value="<?php echo  $job_compl_date ?>">
                            </div>
                            <div class="form-group">
                                <label for="categories" class=" form-control-label">Delivery Date</label>
                                <input type="date" name="ddate" id="demo" placeholder="Enter Delivery Date" class="form-control" required value="<?php echo  $delivery_date ?>">
                            </div>
                            <button id="payment-button" name="submit" type="submit" class="btn btn-lg btn-info btn-block">
                                <span id="payment-button-amount">Submit</span>
                            </button>
                            <div class="field_error"><?php echo $msg ?></div>
                        </div>
                    </form>
                   <?php }?>
                    
                </div>
            </div>
        </div>
    </div>
</div>
<script>
      var todayDate = new Date();
      var month = todayDate.getMonth() +1; //04 - current month
      var year = todayDate.getUTCFullYear(); //2021 - current year
      var tdate = todayDate.getDate(); // 27 - current date 
      if(month < 10){
        month = "0" + month //'0' + 4 = 04
      }
      if(tdate < 10){
        tdate = "0" + tdate;
      }
      var maxDate = year + "-" + month + "-" + tdate;
      document.getElementById("demo").setAttribute("max", maxDate);
      document.getElementById("demo1").setAttribute("max", maxDate);
      document.getElementById("demo2").setAttribute("max", maxDate);
      console.log(maxDate);
    </script>

<script>
      var todayDate = new Date();
      var month = todayDate.getMonth() +1; //04 - current month
      var year = todayDate.getUTCFullYear(); //2021 - current year
      var tdate = todayDate.getDate(); // 27 - current date 
      if(month < 10){
        month = "0" + month //'0' + 4 = 04
      }
      if(tdate < 10){
        tdate = "0" + tdate;
      }
      var maxDate = year + "-" + month + "-" + tdate;
      document.getElementById("war").setAttribute("max", maxDate);
      document.getElementById("war1").setAttribute("max", maxDate);
      document.getElementById("war2").setAttribute("max", maxDate);
      console.log(maxDate);
    </script>
    <script type="text/javascript">
    document.getElementById('value').style.display = "none";
    document.getElementById('text').style.display = "none";

    function update() {
        var select = document.getElementById('language');
        var option = select.options[select.selectedIndex];
        document.getElementById('value').value = option.value;
        document.getElementById('text').value = option.text;
        let DateToday = new Date();
        let month = DateToday.getMonth() + 1;
        let day = DateToday.getDate();
        let year = DateToday.getFullYear();
        if (month < 10)
            month = '0' + month.toString();
        if (day < 10)
            day = '0' + day.toString();
        let Today = year + '-' + month + '-' + day;
        let maxdate = year + 1 + '-' + month + '-' + day;
        if (document.getElementById('value').value == "Yes") {
            document.getElementById('datepicker').style.display = "block";
            document.getElementById('datepicker').setAttribute("min", Today);
            document.getElementById('datepick').style.display = "none";

        } else {
            document.getElementById('datepick').style.display = "block";
            document.getElementById('datepick').setAttribute("max", Today);
            document.getElementById('datepicker').style.display = "none";
        }
    }
    update();
</script>
<?php
require('footer.inc.php');
?>