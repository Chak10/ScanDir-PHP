<?php
$f = 0;
	for($i=0;$i<50;++$i){
		$t = -microtime(true);
		new dir_scan('../../../');
		$t += microtime(true);
		$f +=$t;
	}
	var_dump($f/$i);
?>
