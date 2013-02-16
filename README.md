admindefender
=============

protect admin page from unauthorized access when the password got leak


how to use admindefender :
add this code to your admin login page
<?php
  	
		if(!isset($_SESSION['guardian'])){
			echo "
            <script language='javascript'>
			<!--
			window.location = 'guardian.php';
			--></script>
            ";
		}
		else{
			if($_SESSION['guardian']==""){
				echo "
            <script language='javascript'>
			<!--
			window.location = 'guardian.php';
			--></script>
            ";
			}
			else{
				?>
        example login form
					<div id="loginform">
					<div class="headlogin">
					login area
					</div>
					<div class="listrecent">
					<form action="" method="post" id="loginForm">
					<label for="username">username</label>
					<input type="text" name="username" id="username" class="required input_field" style="width:275px;" />
					<label for="password">password</label>
					<input type="password" name="password" id="password" class="required input_field" style="width:275px;"/><br/>
					<input type="submit" name="login" id="login" value="Masuk" class="submit_btn"/>	<span id="report"></span>
					</form>	
					</div>
					</div>
					<?php
			}
		}
		?>
