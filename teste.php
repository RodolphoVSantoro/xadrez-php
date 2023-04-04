<?php
const b = "<br/>";
for($i=1;$i<=12;$i++)
{
	echo "Com ".$i.":".b;
	$x = 13 + ($i/100);
	$y = round($x - 13 ,2);
	$x = $y * 100;
	echo $x.b.b;
}
?>