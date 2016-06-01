<?php
	session_start();	
	if($_SESSION['miSession']['permisos']==1){
?>
<!DOCTYPE html>
<!--[if lt IE 7 ]> <html class="ie6"> <![endif]-->
<!--[if IE 7 ]>    <html class="ie7"> <![endif]-->
<!--[if IE 8 ]>    <html class="ie8"> <![endif]-->
<!--[if IE 9 ]>    <html class="ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html> <!--<![endif]-->
<head>

    <title></title>
	<meta content="" name="description" />
	<meta content="" name="keywords" />
	<meta content="noindex" name="robots" />
    <meta name="viewport" content="width=1210">
    <meta content="" name="csrf-param" />
	<meta content="" name="csrf-token" />

	<!-- REDIRECT - MOBILE-->	
	<script type="text/javascript">
	<!--
		if (screen.width <= 800) {
		window.location = "";
		}
	  //-->
	</script>
    <script src="../assets/shared/lib/html5shiv-40ccfba08f89bafa22c4413cfb8e591c.js" type="text/javascript"></script>
    <link href="../assets/desktop/global/fonts-d6daa009b78ebdd9e7100f184de9e7dc.css" media="screen" rel="stylesheet" type="text/css" />
    <link href="../assets/desktop/global/base-eda575ff8ded5b7374282f805de6e1ad.css" media="screen" rel="stylesheet" type="text/css" />
    <link href="../assets/desktop/profile/base-1d9495a4b5b95cb36f610cba78cd0098.css" media="screen" rel="stylesheet" type="text/css" />

    <!--Start of Zopim Live Chat Script-->
	<script type="text/javascript">
	window.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=
	d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
	_.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute("charset","utf-8");
	$.src="//v2.zopim.com/?3QHttEutJ1CyxQJLP3MYVfd7D2E3Id0T";z.t=+new Date;$.
	type="text/javascript";e.parentNode.insertBefore($,e)})(document,"script");
	</script>
	<!--End of Zopim Live Chat Script-->

	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	  ga('create', 'UA-69094727-1', 'auto');
	  ga('send', 'pageview');

	</script>
</head>
<body> 
    <div class='global-wrapper'>
        <div id="flashes">
        </div>
		<?php require_once("../instancias/header2.php"); ?>        
		<div class="center wrap-1240 rel">
			<?php require_once("../instancias/menu-perfil.php"); ?> 
		<div class="wrap-650 center details page" data-name="details" style="display: block">
			<h1>Your Details</h1>
			<section id="details_name">
				<div class="form view grid" style="display: block;">
					<h2>Usuario</h2>
					<div class="field col-1-2 pad-r">
						<label for="first_name" class="for-ie">First Name</label>
						<input type="text" name="first_name" placeholder="First Name" value="">
					</div>
					<div class="field col-1-2 pad-l">
						<label for="last_name" class="for-ie">Last Name</label>
						<input type="text" name="last_name" placeholder="Last Name" value="">
					</div>
					<button class="blue medium">Save Changes</button>
					<div class="right">
						<span class="link cancel">Cancel</span>
					</div>
				</div>
			</section>
			<section id="details_email">
				<div class="form view" style="display: block;">
					<h2>Email / Password</h2>

					<div class="field">
						<label for="email" class="for-ie">Email</label>
						<input type="email" name="email" placeholder="Email" value="daniel_moralesp@hotmail.com">
					</div>
					<div class="field">
						<label for="new_password" class="for-ie">New Password (Optional)</label>
						<input type="password" name="password" placeholder="New Password (Optional)" data-required="false">
					</div>
					<div class="field">
						<label for="current_password" class="for-ie">Current Password</label>
						<input type="password" name="current_password" placeholder="Current Password">
					</div>

					<button class="blue medium">Save Changes</button>

					<div class="right">
						<span class="link cancel">Cancel</span>
					</div>
				</div>
			</section>
			<section id="details_shipping">
				<div class="form view" style="display: none;">
					<h2>Shipping Information</h2>        
					<div class="form address shipping_new grid" style="display: block">
						<div class="toggle country col-1-1">
							<div>
								<input type="radio" name="shipping_new[country]" value="US" id="shipping_new_country_us" checked>
								<label for="shipping_new_country_us" class="us"><span class="img"></span> United States</label>
							</div>
							<div>
								<input type="radio" name="shipping_new[country]" value="CA" id="shipping_new_country_ca" >
								<label for="shipping_new_country_ca" class="ca"><span class="img"></span> Canada</label>
							</div>
						</div>
						<div class="col-1-1">
							<label for="shipping_new_name" class="for-ie">Name</label>
							<input id="shipping_new_name" type="text" placeholder="Name" name="shipping_new[name]" class="name" maxlength="100" value="">
						</div>
						<div class="col-1-1">
							<label for="shipping_new_address_line_1" class="for-ie">Address Line 1</label>
							<input id="shipping_new_address_line_1" type="text" placeholder="Address" name="shipping_new[address_line_1]" class="address_line_1" maxlength="30" value="">
						</div>
						<div class="col-1-1">
							<label for="shipping_new_address_line_2" class="for-ie">Address Line 2</label>
							<input id="shipping_new_address_line_2" type="text" placeholder="Apt / Suite #" name="shipping_new[address_line_2]" class="address_line_2" maxlength="255" value="">
						</div>
						<div class="col-1-1">
							<label for="shipping_new_city" class="for-ie">City</label>
							<input id="shipping_new_city" type="text" placeholder="City" name="shipping_new[city]" class="city" maxlength="255" value="">
						</div>
						<div class="col-1-2 pad-r">
							<label for="shipping_new_state" class="for-ie">State</label>
							<select id="shipping_new_state" name="shipping_new[state]" class="state">
								<option value="" disabled selected>State</option>
									<option value="AL" >AL</option>
									<option value="AK" >AK</option>
									<option value="AZ" >AZ</option>
									<option value="AR" >AR</option>
									<option value="CA" >CA</option>
									<option value="CO" >CO</option>
									<option value="CT" >CT</option>
									<option value="DE" >DE</option>
									<option value="DC" >DC</option>
									<option value="FL" >FL</option>
									<option value="GA" >GA</option>
									<option value="HI" >HI</option>
									<option value="ID" >ID</option>
									<option value="IL" >IL</option>
									<option value="IN" >IN</option>
									<option value="IA" >IA</option>
									<option value="KS" >KS</option>
									<option value="KY" >KY</option>
									<option value="LA" >LA</option>
									<option value="ME" >ME</option>
									<option value="MD" >MD</option>
									<option value="MA" >MA</option>
									<option value="MI" >MI</option>
									<option value="MN" >MN</option>
									<option value="MS" >MS</option>
									<option value="MO" >MO</option>
									<option value="MT" >MT</option>
									<option value="NE" >NE</option>
									<option value="NV" >NV</option>
									<option value="NH" >NH</option>
									<option value="NJ" >NJ</option>
									<option value="NM" >NM</option>
									<option value="NY" >NY</option>
									<option value="NC" >NC</option>
									<option value="ND" >ND</option>
									<option value="OH" >OH</option>
									<option value="OK" >OK</option>
									<option value="OR" >OR</option>
									<option value="PA" >PA</option>
									<option value="PR" >PR</option>
									<option value="RI" >RI</option>
									<option value="SC" >SC</option>
									<option value="SD" >SD</option>
									<option value="TN" >TN</option>
									<option value="TX" >TX</option>
									<option value="UT" >UT</option>
									<option value="VT" >VT</option>
									<option value="VA" >VA</option>
									<option value="WA" >WA</option>
									<option value="WV" >WV</option>
									<option value="WI" >WI</option>
									<option value="WY" >WY</option>
									<option value="GU" >GU</option>
									<option value="AS" >AS</option>
									<option value="MP" >MP</option>
									<option value="VI" >VI</option>
									<option value="AA" >AA</option>
									<option value="AE" >AE</option>
									<option value="AP" >AP</option>
							</select>
						</div>
						<div class="col-1-2 pad-l">
							<label for="shipping_new_zip" class="for-ie">Zip/Postal</label>
							<input id="shipping_new_zip" type="text" value="" placeholder="Zip Code" pattern="\d*" name="shipping_new[zip]" class="zip" maxlength="11">
						</div>
						<div class="col-1-1">
								<label for="shipping_new_telephone" class="for-ie">Telephone</label>
								<input id="shipping_new_telephone" type="tel" value="" placeholder="Telephone" name="shipping_new[telephone]" class="telephone last-input" maxlength="20" >
						</div>
							<button class="blue medium">Create New Address</button>
					</div>
					<div class="disabled-address"></div>
							<div class="right">
								<span class="link cancel">Cancel</span>
							</div>
						</div>
						<ul>
						</ul>
			</section>
			<section id="details_billing">
				<div class="show view">
					<h2>Billing Profiles</h2>
					<div class="right table"><div class="middle">
						<span class="link edit add">Add</span>
					</div></div>
				</div>
				<div class="form view" style="display: none;">
					<h2>Add Billing Profile</h2>					
					<div class="form payment billing_new grid" style="display: block">
						<div class="col-1-1">
							<p class="h6 black-blue">Credit / Debit Card Number</p>
							<label for="billing_new_card_number" style="display: none;">Card Number</label>
							<input id="billing_new_card_number" type="text" name="billing_new[card_number]" placeholder="Card Number" class="card_number" value="">
						</div>
						<div class="col-2-3 grid pad-r">
							<p class="h6 black-blue col-1-1">Expiration Date</p>
							<div class="col-1-2 pad-r">
								<label for="billing_new_month" style="display: none;">Month</label>
								<select class="month" id="billing_new_month" name="billing_new[month]">
									<option value="1">01</option>
									<option value="2">02</option>
									<option value="3">03</option>
									<option value="4">04</option>
									<option value="5">05</option>
									<option selected="selected" value="6">06</option>
									<option value="7">07</option>
									<option value="8">08</option>
									<option value="9">09</option>
									<option value="10">10</option>
									<option value="11">11</option>
									<option value="12">12</option>
								</select>
							</div>
							<div class="col-1-2 pad-l">
								<label for="billing_new_year" style="display: none;">Year</label>
								<select class="year" id="billing_new_year" name="billing_new[year]">
									<option selected="selected" value="2015">2015</option>
									<option value="2016">2016</option>
									<option value="2017">2017</option>
									<option value="2018">2018</option>
									<option value="2019">2019</option>
									<option value="2020">2020</option>
									<option value="2021">2021</option>
									<option value="2022">2022</option>
									<option value="2023">2023</option>
									<option value="2024">2024</option>
									<option value="2025">2025</option>
								</select>
							</div>
						</div>
						<div class="col-1-3 pad-l">
							<p class="h6 black-blue">Security Code</p>
							<label for="billing_new_ccv" style="display: none;">CCV</label>
							<input id="billing_new_ccv" type="text" class="ccv" name="billing_new[ccv]" placeholder="CCV" value="">
						</div>
					</div>					
					<div class="form address billing_new grid" style="display: block">
						<div class="toggle country col-1-1">
							<div>
								<input type="radio" name="billing_new[country]" value="US" id="billing_new_country_us" checked>
								<label for="billing_new_country_us" class="us"><span class="img"></span> United States</label>
							</div>
							<div>
								<input type="radio" name="billing_new[country]" value="CA" id="billing_new_country_ca" >
								<label for="billing_new_country_ca" class="ca"><span class="img"></span> Canada</label>
							</div>
						</div>
						<div class="col-1-1">
							<label for="billing_new_name" class="for-ie">Name</label>
							<input id="billing_new_name" type="text" placeholder="Name" name="billing_new[name]" class="name" maxlength="100" value="">
						</div>
						<div class="col-1-1">
							<label for="billing_new_address_line_1" class="for-ie">Address Line 1</label>
							<input id="billing_new_address_line_1" type="text" placeholder="Address" name="billing_new[address_line_1]" class="address_line_1" maxlength="30" value="">
						</div>
						<div class="col-1-1">
							<label for="billing_new_address_line_2" class="for-ie">Address Line 2</label>
							<input id="billing_new_address_line_2" type="text" placeholder="Apt / Suite #" name="billing_new[address_line_2]" class="address_line_2" maxlength="255" value="">
						</div>
						<div class="col-1-1">
							<label for="billing_new_city" class="for-ie">City</label>
							<input id="billing_new_city" type="text" placeholder="City" name="billing_new[city]" class="city" maxlength="255" value="">
						</div>
						<div class="col-1-2 pad-r">
							<label for="billing_new_state" class="for-ie">State</label>
							<select id="billing_new_state" name="billing_new[state]" class="state">
								<option value="" disabled selected>State</option>
									<option value="AL" >AL</option>
									<option value="AK" >AK</option>
									<option value="AZ" >AZ</option>
									<option value="AR" >AR</option>
									<option value="CA" >CA</option>
									<option value="CO" >CO</option>
									<option value="CT" >CT</option>
									<option value="DE" >DE</option>
									<option value="DC" >DC</option>
									<option value="FL" >FL</option>
									<option value="GA" >GA</option>
									<option value="HI" >HI</option>
									<option value="ID" >ID</option>
									<option value="IL" >IL</option>
									<option value="IN" >IN</option>
									<option value="IA" >IA</option>
									<option value="KS" >KS</option>
									<option value="KY" >KY</option>
									<option value="LA" >LA</option>
									<option value="ME" >ME</option>
									<option value="MD" >MD</option>
									<option value="MA" >MA</option>
									<option value="MI" >MI</option>
									<option value="MN" >MN</option>
									<option value="MS" >MS</option>
									<option value="MO" >MO</option>
									<option value="MT" >MT</option>
									<option value="NE" >NE</option>
									<option value="NV" >NV</option>
									<option value="NH" >NH</option>
									<option value="NJ" >NJ</option>
									<option value="NM" >NM</option>
									<option value="NY" >NY</option>
									<option value="NC" >NC</option>
									<option value="ND" >ND</option>
									<option value="OH" >OH</option>
									<option value="OK" >OK</option>
									<option value="OR" >OR</option>
									<option value="PA" >PA</option>
									<option value="PR" >PR</option>
									<option value="RI" >RI</option>
									<option value="SC" >SC</option>
									<option value="SD" >SD</option>
									<option value="TN" >TN</option>
									<option value="TX" >TX</option>
									<option value="UT" >UT</option>
									<option value="VT" >VT</option>
									<option value="VA" >VA</option>
									<option value="WA" >WA</option>
									<option value="WV" >WV</option>
									<option value="WI" >WI</option>
									<option value="WY" >WY</option>
									<option value="GU" >GU</option>
									<option value="AS" >AS</option>
									<option value="MP" >MP</option>
									<option value="VI" >VI</option>
									<option value="AA" >AA</option>
									<option value="AE" >AE</option>
									<option value="AP" >AP</option>
							</select>
						</div>
						<div class="col-1-2 pad-l">
							<label for="billing_new_zip" class="for-ie">Zip/Postal</label>
							<input id="billing_new_zip" type="text" value="" placeholder="Zip Code" pattern="\d*" name="billing_new[zip]" class="zip" maxlength="11">
						</div>
						<button class="blue medium">Create New Profile</button>
					</div>
					<div class="disabled-address"></div>
					<div class="right">
						<span class="link cancel">Cancel</span>
					</div>
				</div>
				<ul>
				</ul>
			</section>
		</div>
		<div class="wrap-650 center shave-plan page" data-name="shave_plan" style="display: none">
			<h1>Your Shave Plan</h1>
			<ul class="plans">
					<li class="empty">
						<span>You haven't set up a shave plan yet.</span>
						<a href="/auto-refill" class="button blue medium">View Shave Plans</a>
					</li>
			</ul>
		</div>
		<div class="wrap-650 center history page" data-name="history" style="display: none">
			<h1>Order History</h1>
			<ul>
					<li class="empty">
						<span>You haven't placed any orders yet.</span>
						<a href="/products" class="button blue medium">Shop Harry's</a>
					</li>
			</ul>
		</div>
		<div class="wrap-650 center invites page" data-name="invites" data-available-invites-count="0" style="display: none">
        <h1>Give Harry's to Your Friends</h1>
    <!-- If a user does not have invites to send... -->
    <section id="invite_empty" style="display: block;">
        <div class="text-center">
                <p class="title">A friend of yours is a friend of ours.</p>
                <p class="subtitle">You have submitted all available invites.</p>
                <img alt="Truman" src="assets/profile/truman-da875739f3744d29d8dcfa5b82940994.jpg" />
        </div>
    </section>
    <!-- If a user has invites to send... -->
    <section id="invite_create" style="display: none;">
         <div class="text-center">
                <p class="title">A friend of yours is a friend of ours.</p>
                <p class="subtitle">Simply enter their info below, and we'll send them a razor on us.</p>
                <p class="subtitle">You have <span id="invite_counter" class="counter">0 invites</span> available.</p>
                <img alt="Truman" src="assets/profile/truman-da875739f3744d29d8dcfa5b82940994.jpg" />
            </div>
        <div class="form view grid">
            <div class="field col-1-2 pad-r">
                <label for="invitee_first_name" class="for-ie">Invitee First Name</label>
                <input type="text" name="invitee_first_name" placeholder="Invitee First Name">
            </div>
            <div class="field col-1-2 pad-l">
                <label for="invitee_last_name" class="for-ie">Invitee Last Name</label>
                <input type="text" name="invitee_last_name" placeholder="Invitee Last Name">
            </div>
            <div class="field col-1-1">
                <label for="invitee_email" class="for-ie">Invitee Email</label>
                <input type="email" name="invitee_email" placeholder="Invitee Email">
            </div>
                <div class="field col-1-2 pad-r">
                    <label for="referrer_first_name" class="for-ie">Your First Name</label>
                    <input type="text" name="referrer_first_name" placeholder="Your First Name">
                </div>
                <div class="field col-1-2 pad-l">
                    <label for="referrer_last_name" class="for-ie">Your Last Name</label>
                    <input type="text" name="referrer_last_name" placeholder="Your Last Name">
                </div>
            <button class="blue medium">Send Invite</button>
        </div>
    </section>
    <!-- If a user has invites that have been sent... -->
    <section id="invite_list" class="list" style="display: block;">
        <h2>Your Sent Invites</h2>
        <table>
            <tbody>
            </tbody>
        </table>
    </section>
</div>
</div>
        <div id='back_to_top'></div>
        <div class='push'></div>
    </div>

    <?php require_once("../instancias/footer.php"); ?>  

    <script src="../assets/desktop/global/init-f4172392de5a94d426c0cff014321f77.js" type="text/javascript"></script>    
    <script src="https://js.stripe.com/v2/stripe-dss3.js" type="text/javascript"></script>
    <script src="../assets/shared/profile/init-5e33ebcac817e3cc2bb026a631e3d439.js" type="text/javascript"></script>
</body>
</html>

<?php

}else{
		echo "<script type='text/javascript'>
				alert('El usuario ".$_POST["user"]." no tiene permisos de ingreso');
				window.location='login';
			  </script>";
		?>
		<htm>
			<meta http-equiv="refresh" content="0; url=login">
		</html>
		<?php
	}

?>
