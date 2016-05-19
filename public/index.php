<?php
	if ($_GET['pass'] == 'ok') {
		$aliasedFile = '/protected/example-file.txt'; //this is the nginx alias of the file path
		$realFile = '/var/www/xaccel/files/example-file.txt'; //this is the physical file path
		$filename = 'user-file.txt'; //this is the file name user will get

		header('Cache-Control: public, must-revalidate');
		header('Pragma: no-cache');
		header('Content-Type: application\text');
		header('Content-Length: ' .(string)(filesize($realFile)) );
		header('Content-Disposition: attachment; filename='.$filename.'');
		header('Content-Transfer-Encoding: binary');
		header('X-Accel-Redirect: '. $aliasedFile);
		exit(0);
	} else {
		echo 'Bad password';
	}
