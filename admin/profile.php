<?php
require('top.inc.php');
if (!isset($_SESSION['USER_LOGIN'])) {
?>
	<script>
		window.location.href = 'index.php';
	</script>
<?php
}
?>
<!-- Start Bradcaump area -->
<div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(images/3.jpg) no-repeat scroll center center / cover ;">
	<div class="ht__bradcaump__wrap">
		<div class="container">
			<div class="row">
				<div class="col-xs-12">
					<div class="bradcaump__inner">
						<nav class="bradcaump-inner">
							<a class="breadcrumb-item" href="index.php">Home</a>
							<span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
							<span class="breadcrumb-item active">Profile</span>
						</nav>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- End Bradcaump area -->

<!-- Start Contact Area -->
<section class="htc__contact__area ptb--100 bg__white">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<div class="contact-form-wrap mt--60">
					<div class="col-xs-12">
						<div class="contact-title">
							<h2 class="title__line--6">Profile</h2>
<!--

							<form class="p-3">
								<div class="form-group">
									<label for="name">Name</label>
									<input type="text" class="form-control" id="name" placeholder="Joe Smith">
								</div>

								<div class="form-group">
									<label for="seeAnotherField">Do You Want To See Another Field?</label>
									<select class="form-control" id="seeAnotherField">
										<option value="no">No Way.</option>
										<option value="yes">Absolutely!</option>
									</select>
								</div>

								<div class="form-group" id="otherFieldDiv">
									<label for="otherField">Here you go!</label>
									<select class="form-control" id="otherField">
										<option>Yay</option>
										<option>Woo</option>
										<option>Hazah</option>
										<option>Yipee</option>
										<option>Hoorah</option>
									</select>
								</div>

								<div class="form-group">
									<label for="seeAnotherFieldGroup">Do You Want To See Another Group of Fields?</label>
									<select class="form-control" id="seeAnotherFieldGroup">
										<option value="no">Not Particularly.</option>
										<option value="yes">I Guess!</option>
									</select>
								</div>

								<div class="form-group" id="otherFieldGroupDiv">
									<div class="row">
										<div class="col-6">
											<label for="otherField1">Group: Heres One!</label>
											<input type="text" class="form-control w-100" id="otherField1">
										</div>
										<div class="col-6">
											<label for="otherField2">Group: Another One!</label>
											<input type="text" class="form-control w-100" id="otherField2">
										</div>
									</div>
								</div>

								<div class="form-group">
									<label for="comments">Comments/Questions</label>
									<textarea class="form-control" id="comments" rows="3" </textarea><button class="btn btn-primary" type="submit">Submit</button>


							<script>
								$("#seeAnotherField").change(function() {
									if ($(this).val() == "yes") {
										$('#otherFieldDiv').show();
										$('#otherField').attr('required', '');
										$('#otherField').attr('data-error', 'This field is required.');
									} else {
										$('#otherFieldDiv').hide();
										$('#otherField').removeAttr('required');
										$('#otherField').removeAttr('data-error');
									}
								});
								$("#seeAnotherField").trigger("change");

								$("#seeAnotherFieldGroup").change(function() {
									if ($(this).val() == "yes") {
										$('#otherFieldGroupDiv').show();
										$('#otherField1').attr('required', '');
										$('#otherField1').attr('data-error', 'This field is required.');
										$('#otherField2').attr('required', '');
										$('#otherField2').attr('data-error', 'This field is required.');
									} else {
										$('#otherFieldGroupDiv').hide();
										$('#otherField1').removeAttr('required');
										$('#otherField1').removeAttr('data-error');
										$('#otherField2').removeAttr('required');
										$('#otherField2').removeAttr('data-error');
									}
								});
								$("#seeAnotherFieldGroup").trigger("change");
							</script> -->



							<!--
							<select name="Warranty" id="" required>
								<option id="yes" onchange="myChangeFunction(this)" value="Yes">Yes</option>
								<option onchange="myCgsghsunction(this)" value="No">No</option>
							</select>

							<div class="form-group">
								<label for="categories" class=" form-control-label">Warranty Date</label>
								<input type="date" id="demo" name="dwarranty" placeholder="Enter Warranty Date" class="form-control" required value="<?php echo  $date ?>">
							</div>




							<input type="text" id="myInput1" //onchange="myChangeFunction(this)" placeholder="type something then tab out" />
							<input type="text" id="myInput2" />

							<script type="text/javascript">
								function myChangeFunction(input1) {
									var yes = document.getElementById('demo');
									input2.value = input1.value;
								}
							</script>


							<script>
								var todayDate = new Date();
								var month = todayDate.getMonth() + 1; //04 - current month
								var year = todayDate.getUTCFullYear(); //2021 - current year
								var tdate = todayDate.getDate(); // 27 - current date 
								if (month < 10) {
									month = "0" + month //'0' + 4 = 04
								}
								if (tdate < 10) {
									tdate = "0" + tdate;
								}
								var maxDate = year + "-" + month + "-" + tdate;
								document.getElementById("demo").setAttribute("max", maxDate);
								document.getElementById("demo1").setAttribute("max", maxDate);
								document.getElementById("demo2").setAttribute("max", maxDate);
								console.log(maxDate);
							</script>


							-->


						</div>
						<div class="wishlist-table">
						</div>
					</div>
					<div class="col-xs-12">
						<form id="login-form" method="post">
							<div class="single-contact-form">
								<div class="contact-box name">
									<input type="text" name="name" id="name" placeholder="Your Name*" style="width:100%" value="<?php echo $_SESSION['USER_NAME'] ?>">
								</div>
								<span class="field_error" id="name_error"></span>
							</div>
							<div class="contact-btn">
								<button type="button" class="fv-btn" onclick="update_profile()" id="btn_submit">Update</button>

							</div>
						</form>
					</div>
				</div>

			</div>


</section>

<script>
	function update_profile() {
		jQuery('.field_error').html('');
		var name = jQuery('#name').val();
		if (name == '') {
			jQuery('#name_error').html('Please enter your name');
		} else {
			jQuery('#btn_submit').html('Please wait...');
			jQuery('#btn_submit').attr('disabled', true);
			jQuery.ajax({
				url: 'update_profile.php',
				type: 'post',
				data: 'name=' + name,
				success: function(result) {
					jQuery('#name_error').html(result);
					jQuery('#btn_submit').html('Update');
					jQuery('#btn_submit').attr('disabled', false);
				}
			})
		}
	}
</script>
<?php
require('footer.inc.php');
?>