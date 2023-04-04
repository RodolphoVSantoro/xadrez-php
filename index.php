<?php
session_start();
session_destroy();
session_unset();
session_start();
include "constantes.inc";
for($x = 0;$x < 8;$x++)
{
  for($y = 0;$y < 8;$y++)
  {
    $campo[$x][$y] = 0;
  }
}
for($x = 0;$x < 8;$x++)
{
  $campo[1][$x] = peao2;
  $campo[6][$x] = peao1;
}

//peças do jogador 1
	$campo[7][0] = torre1;
	$campo[7][1] = cavalo1;
	$campo[7][2] = bispo1;
	$campo[7][3] = rei1;
	$campo[7][4] = rainha1;
	$campo[7][5] = bispo1;
	$campo[7][6] = cavalo1;
	$campo[7][7] = torre1;
//

//peças do jogador 2:
	$campo[0][0] = torre2;
	$campo[0][1] = cavalo2;
	$campo[0][2] = bispo2;
	$campo[0][3] = rei2;
	$campo[0][4] = rainha2;
	$campo[0][5] = bispo2;
	$campo[0][6] = cavalo2;	
	$campo[0][7] = torre2;
//
$_SESSION['inicio'] = true;
$_SESSION['campo'] = $campo;
$_SESSION['turno'] = 1; // começa com o jogador 1
header('Location: Peca.php');
?>