<?php
	function ukuran_file($path) {

	 $bytes = filesize($path);
	 $decimals = 2;
	  $sz = 'BKMGTP';
	  $factor = floor((strlen($bytes) - 1) / 3);
	  return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) . @$sz[$factor]."B";
	}

	// function ukuran_file($bytes, $decimals) {
	//   $sz = 'BKMGTP';
	//   $factor = floor((strlen($bytes) - 1) / 3);
	//   return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) . @$sz[$factor];
	// }
?>