<?php
session_start();
include "constantes.inc";
$cx =  $_POST['coorx'];
$cy = $_POST['coory'];
$cx_anter = $_POST['coorxa'];
$cy_anter = $_POST['coorya'];
$alvo = $_POST['alvo'];
$peca_movendo = $_POST['movendo'];
$_SESSION['turno'] = $_SESSION['turno'] + 1;
switch ($alvo) {
	case rei1:
		header('Location: fim.php');
	break;
	case rei2:
		header("Location: fim.php");
	break;
	default:
		$_SESSION['campo'][$cx][$cy] = $peca_movendo;
		$_SESSION['campo'][$cx_anter][$cy_anter] = vazio;
		if($cx == 0 && $_SESSION['campo'][$cx][$cy] == peao1)
		{
			$_SESSION['xpeao'] = $cx;
			$_SESSION['ypeao'] = $cy;
			$_SESSION['peao'] = peao1;
			echo "1";
			header('Location: peao.php');
		}
		else
		{
			if($cx == 7 && $_SESSION['campo'][$cx][$cy] == peao2)
			{
				$_SESSION['xpeao'] = $cx;
				$_SESSION['ypeao'] = $cy;
				$_SESSION['peao'] = peao2;
				echo "2";
				header('Location: peao.php');
			}
			else
			{
				header("Location: Peca.php");
			}
		}
	break;
}
?>