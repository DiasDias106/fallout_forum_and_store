<?php
function selos($euros) {
$str = "";
$euros = intval($euros);
$s3 = 0;
$s5 = 0;

if ($euros >= 8) {
$quoc = intval($euros / 8);
$r = $euros % 8;

switch ($r) {
case 0:
$s3 = $quoc;
$s5 = $quoc;
break;
case 1:
$s3 = $quoc + 2;
$s5 = $quoc - 1;
break;
case 2:
$s3 = $quoc - 1;
$s5 = $quoc + 1;
break;
case 3:
$s3 = $quoc + 1;
$s5 = $quoc;
break;
case 4:
$s3 = $quoc + 3;
$s5 = $quoc - 1;
break;
case 5:
$s3 = $quoc;
$s5 = $quoc + 1;
break;
case 6:
$s3 = $quoc + 2;
$s5 = $quoc;
break;
default:
$s3 = $quoc - 1;
$s5 = $quoc + 2;
break;
}

$str = "Selos de cinco: $s5 :: Selos de três: $s3";
} else {
if ($euros === 3) {
$s5 = 0;
$s3 = 1;
} elseif ($euros === 6) {
$s5 = 0;
$s3 = 2;
} elseif ($euros === 5) {
$s5 = 1;
$s3 = 0;
} else {
$s5 = 0;
$s3 = 0;
$str .= "Devolução dos euros. ";
}

$str .= "Selos de cinco: $s5 :: Selos de três: $s3";
}

return $str;
}
?>
