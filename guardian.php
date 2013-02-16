<?php
session_start();
require_once 'connection.php';
require_once 'xss_clean.php';
require_once 'getip.php';
error_reporting(0);

$aut="SELECT `idautentikasi`, `keyautentikasi`, `ipaddress`, `date`, `chmod` FROM `autentikasi` WHERE `ipaddress`='".ip()."'";
$autres=mysql_query($aut);
$rowaut=mysql_num_rows($autres);
if($rowaut==0){
?>
<link rel="icon" href="images/icon.ico" type="image/x-icon" />
<title>juniorriau | guardian project</title>
<link rel="stylesheet" type="text/css" href="style/guardian.css"/>
<body >
<div id="logo"><a href="guardian.aspx"><img src="guardian.png" alt="Junior Guardian" border="0" /></a></div>
<div id="login_container">
<div id="login_msg"><span style="font-size:14px;"><strong>Welcome Back</strong></span><br>Please enter your authentication key below to authenticate your access.</div>  <div id="login">
    <form action="guardian.aspx" method="post" name="frmlogin" id="frmlogin">
      <table width="100%" border="0" cellspacing="0" cellpadding="5">
        <tr>
          <td width="30%" align="right" valign="middle"><strong>Key 1</strong></td>
          <td align="left" valign="middle"><input type="password" name="key1" size="30" class="login_inputs" /></td>
        </tr>
        <tr>
          <td width="30%" align="right" valign="middle"><strong>Key 2</strong></td>
          <td align="left" valign="middle"><input type="password" name="key2" size="30" class="login_inputs" /></td>
        </tr>
        <tr>
          <td width="30%" align="right" valign="middle"><strong>Key 3</strong></td>
          <td align="left" valign="middle"><input type="password" name="key3" size="30" class="login_inputs" /></td>
          <input type="hidden" name="ip" value="<?php echo ip();?>"
         </tr>
        <tr>
          <td width="30%" align="right" valign="middle">&nbsp;</td>
          <td align="left" valign="middle">
            <table width="100%" >
          	<tr>
            	<td><input type="submit" value="Authenticate"/>
                <input type="reset" value="Reset" /></td>
            </tr>
            </table>
          </td>
        </tr>
      </table>
    </form>
  </div>
  <div id="extra_info">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td align="left" valign="middle">IP Logged: <strong><?php echo ip();?></strong></td>
        <td align="right" valign="middle">Powered by <a href="http://www.juniorriau.com/" target="_blank">juniorriau</a></td>
      </tr>
    </table>
  </div>
</div>

</body>
<?php
}
else{
	$rowaut=mysql_fetch_assoc($autres);
	$_SESSION['guardian']=$rowaut['ipaddress'];
	echo "
            <script language='javascript'>
			<!--
			window.location = 'Your Page Admin';
			--></script>
            ";
}

//authprocess

if(isset($_POST['key1']) && isset($_POST['key2']) && isset($_POST['key3'])){
	$authen="SELECT * FROM `keyautentikasi` WHERE key1='".sha1(md5(mysql_real_escape_string(xss_clean($_POST['key1']))))."' and key2='".sha1(md5(mysql_real_escape_string(xss_clean($_POST['key2']))))."' and key3='".sha1(md5(mysql_real_escape_string(xss_clean($_POST['key3']))))."'";
	$authres=mysql_query($authen);
	$rowauth=mysql_num_rows($authres);
	if($rowauth>0){
		$_SESSION['guardian']=ip();
		$rowauth=mysql_fetch_assoc($authres);
		$autdata="INSERT INTO `autentikasi`(`idautentikasi`, `keyautentikasi`, `ipaddress`, `date`) VALUES ('1','".sha1(md5($rowauth['key1'].$rowauth['key2'].$rowauth['key3']))."','".$_SESSION['guardian']."','".date("Y-m-d H:i:s")."')";
		$authres=mysql_query($autdata);
		
		$authlog="INSERT INTO `autentikasilogdetail`(`ipaddresss`, `date`) VALUES ('".ip()."','".date("Y-m-d H:i:s")."')";
		$authreslog=mysql_query($authlog);
		echo "
            <script language='javascript'>
			<!--
			window.location = 'Your Page Admin';
			--></script>
            ";
	}
	else{
		echo "
            <script language='javascript'>
			<!--
			window.location = 'guardian.php';
			--></script>
            ";
	}
}

//locked process

if(isset($_GET['logout'])){
	session_destroy();
	$autdata="DELETE FROM `autentikasi` WHERE `idautentikasi` > 0";
		$authres=mysql_query($autdata);
}
?>
