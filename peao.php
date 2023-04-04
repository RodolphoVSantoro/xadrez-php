<?php
session_start();
include "constantes.inc";
function botao($imagem,$tipo,$x,$y)
{
	return
	'<form method="POST">
	    <input type="hidden" name="promover" value="'.$tipo.'">
	    <input type="hidden" name="corx" value="'.$x.'">
	    <input type="hidden" name="cory" value="'.$y.'">
	    <input type="image" src ="imagens/'.$imagem.'" width="'.tamanho.'" height="'.tamanho.'">
	</form>';
}
if(isset($_POST['promover']))
{
	$x = $_POST['corx'];
	$y = $_POST['cory'];
	$_SESSION['campo'][$x][$y] = $_POST['promover'];
	unset($_SESSION['xpeao']);
	unset($_SESSION['ypeao']);
	unset($_SESSION['peao']);
	header("Location: Peca.php");
}
?>
<html>
 	<head>
    	<meta charset='UTF-8'>
  	</head>
  	<body>
<?php
echo "Selecione uma Peca para promover o peão:".b;

if($_SESSION['peao'] == peao1)
{
	echo botao('torrej1branco.jpg',torre1,$_SESSION['xpeao'],$_SESSION['ypeao']);
	echo botao('cavaloj1branco.jpg',cavalo1,$_SESSION['xpeao'],$_SESSION['ypeao']);
	echo botao('bispoj1branco.jpg',bispo1,$_SESSION['xpeao'],$_SESSION['ypeao']);
	echo botao('rainhaj1branco.jpg',rainha1,$_SESSION['xpeao'],$_SESSION['ypeao']);
}
else
{
	echo botao('torrej2branco.jpg',torre2,$_SESSION['xpeao'],$_SESSION['ypeao']);
	echo botao('cavaloj2branco.jpg',cavalo2,$_SESSION['xpeao'],$_SESSION['ypeao']);
	echo botao('bispoj2branco.jpg',bispo2,$_SESSION['xpeao'],$_SESSION['ypeao']);
	echo botao('rainhaj2branco.jpg',rainha2,$_SESSION['xpeao'],$_SESSION['ypeao']);
}
?>
	</body>
</html>