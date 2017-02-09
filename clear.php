<?php
// cache clear file
ini_set('memory_limit','1024M');
function wp_login_check(){
	$cacheLoggedIn = false;
	if (count($_COOKIE)>0 && !empty($_COOKIE)) {
		foreach ($_COOKIE as $key => $val) {
			if (preg_match("/wordpress_logged_in/i", $key)) {
				$cacheLoggedIn = true;
			}
		}
	} else {
		$cacheLoggedIn = false;
	}
	return $cacheLoggedIn;
}
if(wp_login_check()){
	if(isset($_POST['delete'])){
		$filez = glob('./cache/*'.$_SERVER['SERVER_NAME']);
		$count = count($filez);
		if($count>0 && !empty($filez)){
			foreach($filez as $f){
				unlink($f);
			}
		}
		echo $count.' file(s) deleted';
		echo '<script>setTimeout(function(){ window.history.back(); },3500); </script>';
	}else{
		echo '
			<h1>'.$_SERVER['SERVER_NAME'].' Dirty File Cache</h1>;
			<form methodt="post">
			<input type="button" name="delete" value="Clear Cache">
			</form>
		';
	}
}
