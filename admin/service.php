<?php
require('top.inc.php');
error_reporting(0);
//if (!isset($_SESSION['USER_LOGIN'])) {
//
?>
<!--  <script>
        window.location.href = '../Computer_world/Login.php';
    </script> -->
<?php
//}
if (isset($_POST['submit'])) {
    $name = get_safe_value($conn, $_POST['name']);
    $email = get_safe_value($conn, $_POST['email']);
    $phone = get_safe_value($conn, $_POST['phone']);
    $addr = get_safe_value($conn, $_POST['addr']);
    $hsname = get_safe_value($conn, $_POST['hsname']);
    $lm = get_safe_value($conn, $_POST['lm']);
    $street = get_safe_value($conn, $_POST['street']);
    $brand = get_safe_value($conn, $_POST['brand']);
    $series = get_safe_value($conn, $_POST['series']);
    $Warranty = get_safe_value($conn, $_POST['Warranty']);
    $dt = get_safe_value($conn, $_POST['dt']);
    $prob = get_safe_value($conn, $_POST['prob']);
    $coustomer_id = $_SESSION['USER_ID'];
    $added_on = date('Y-m-d h:i:s');
    $service_status = '1';
    $uid = $_SESSION['USER_ID'];
    $price = 'Will Notify You Shortly';

    mysqli_query($conn, "INSERT into service(Name,Email,Phone,addr,Brand,Series, Warranty, Date, Issues,coustomer_id,added_on,service_status,Estimate) values('$name','$email','$phone','$addr','$brand','$series','$Warranty','$dt','$prob','$coustomer_id','$added_on','$service_status','$price')");
?>
    <script>
        window.location.href = 'Servicethank_you.php';
    </script>
<?php
    die();
}
?>
<div class="ht__bradcaump__area" style="background: rgba(176, 160,170,190) url(images/ser.jpg) no-repeat scroll center center / cover ;">
    <div class="ht__bradcaump__wrap">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="bradcaump__inner">
                        <nav class="bradcaump-inner">
                            <a class="breadcrumb-item" href="index.html">Home</a>
                            <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                            <span class="breadcrumb-item active">Service</span>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Bradcaump area -->
<!-- cart-main-area start -->
<div class="checkout-wrap ptb--100">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="checkout__inner">
                    <div class="accordion-list">
                        <div class="accordion">
                            <style>
                                #regForm {
                                    background-color: white;
                                    margin: 1px auto;
                                    font-family: Raleway;
                                    padding: 0px;
                                    width: 70%;
                                    min-width: 300px;
                                }

                                h1 {
                                    text-align: center;
                                }

                                input,
                                select,
                                textarea {
                                    padding: 10px;
                                    width: 100%;
                                    font-size: 21px;
                                    font-family: Raleway;
                                    border: 1px solid #aaaaaa;
                                    border-radius: 3px;
                                    background-color: #fdfaeff8;
                                    color: black;
                                }


                                .button {
                                    display: inline-block;
                                    font-weight: 400;
                                    text-align: center;
                                    white-space: nowrap;
                                    vertical-align: middle;
                                    -webkit-transition: all .15s ease-in-out;
                                    transition: all .15s ease-in-out;
                                    border-radius: 3;
                                    cursor: pointer;
                                    color: darkred;
                                }

                                button:hover {
                                    opacity: 0.8;
                                }

                                #prevBtn {
                                    background-color: #bbbbbb;
                                }

                                /* Make circles that indicate the steps of the form: */
                                .step {
                                    height: 2px;
                                    width: 20px;
                                    margin: 0 3px;
                                    background-color: #bbbbbb;
                                    border: none;
                                    display: inline-block;
                                    opacity: 0.5;
                                }

                                option {
                                    color: black;
                                }


                                .file-upload {
                                    border: 1px solid #ccc;
                                    display: inline-block;
                                    padding: 6px 12px;
                                    cursor: pointer;
                                }

                                input[type=file] {
                                    padding: 10px;
                                    background: #2d2d2d;
                                }
                            </style>
                            <form id="regForm" method="POST">
                                <h1>Application</h1>
                                <!-- One "tab" for each step in the form: -->
                                <div class="tab">Name:
                                    <p><input placeholder="Full Name" name="name" required></p>
                                </div>
                                <div class="tab">Contact Info:
                                    <p><input type="email" placeholder="E-mail" name="email" required></p>
                                    <p><input type="number" placeholder="Phone" name="phone" required></p>
                                </div>
                                Please Provide Full Address:
                                <p><textarea rows="5" name="addr" required></textarea>
                                </p>
                                <div class="tab">System Details:
                                    <p><input placeholder="Brand" name="brand" required></p>
                                    <p><input placeholder="Series" name="series" type="series" required></p>
                                </div>

                                <div class="tab">Warranty:
                                    </p> <select name="Warranty" id="language" onChange="update()" required>
                                        <option value="Yes">Yes</option>
                                        <option value="No">No</option>
                                    </select>
                                    <p>
                                        Warranty-Expiry (If expired mention when):
                                    </p>
                                    <input type="text" id="value">
                                    <input type="text" id="text">
                                    <input type="date" id="datepicker">
                                    <input type="date" id="datepick">
                                    
                                    Problems facing in your system:
                                    <p><textarea rows="5" name="prob" required></textarea>
                                    </p>
                                </div>
                                <div style="overflow:auto;">
                                    <button id="payment-button" name="submit" type="submit" class="btn btn-lg btn-info btn-block ">
                                        <span id="payment-button-amount">Submit</span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
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