<?php
session_start();
include "constantes.inc";
function botao($imagem,$tipo,$x,$y)
{
	return
	'<form method="POST" action="movimento.php">
	    <input type="hidden" name="tipo" value="'.$tipo.'">
	    <input type="hidden" name="coorx" value="'.$x.'">
	    <input type="hidden" name="coory" value="'.$y.'">
	    <input type="image" src ="imagens/'.$imagem.'" width="'.tamanho.'" height="'.tamanho.'">
	</form>';
}
?>
<html>
  <head>
    <meta charset='UTF-8'>
  </head>
  <body>
    <?php
    echo $_SESSION['turno']."° turno".b;
    echo"<table>";
    echo"<tr>";
    echo"<td>x</td>";
    for($x=0;$x<8;$x++)
    {
    	echo"<td>".$x."</td>";
    }
    echo"</tr>";
    for($x = 0;$x < 8;$x++)
    {
      echo"<tr>
      <td>".$x."</td>";
      for($y = 0;$y < 8;$y++)
      {
      	if(($x + $y) % 2 == 0)
      	{
      		$cor = 'branco';
      	}
      	else
      	{
      		$cor = 'verde';
      	}
		echo"<td>";
		if($_SESSION['turno'] % 2 == 1)
		{
		  switch ($_SESSION['campo'][$x][$y])
		  {
		    case peao1:
		    echo botao("peaoj1".$cor.".jpg",peao1,$x,$y);
		    break;
		    case torre1:
		    echo botao("torrej1".$cor.".jpg",torre1,$x,$y);
		    break;
		    case bispo1:
		    echo botao("bispoj1".$cor.".jpg",bispo1,$x,$y);
		    break;
		    case cavalo1:
		    echo botao("cavaloj1".$cor.".jpg",cavalo1,$x,$y);
		    break;
		    case rei1:
		    echo botao("reij1".$cor.".jpg",rei1,$x,$y);
		    break;
		    case rainha1:
		    echo botao("rainhaj1".$cor.".jpg",rainha1,$x,$y);
		    break;
		    case peao2:
		    echo"<img src='imagens/peaoj2".$cor.".jpg' width='".tamanho."' height='".tamanho."'>";
		    break;
		    case torre2:
		    echo"<img src='imagens/torrej2".$cor.".jpg' width='".tamanho."' height='".tamanho."'>";
		    break;
		    case bispo2:
		    echo"<img src='imagens/bispoj2".$cor.".jpg' width='".tamanho."' height='".tamanho."'>";
		    break;
		    case cavalo2:
		    echo"<img src='imagens/cavaloj2".$cor.".jpg' width='".tamanho."' height='".tamanho."'>";
		    break;
		    case rei2:
		    echo"<img src='imagens/reij2".$cor.".jpg' width='".tamanho."' height='".tamanho."'>";
		    break;
		    case rainha2:
		    echo"<img src='imagens/rainhaj2".$cor.".jpg' width='".tamanho."' height='".tamanho."'>";
		    break;
		    default:
		    echo"<img src='imagens/".$cor.".jpg' width='".tamanho."' height='".tamanho."'>";
		    break;
		  }
		}
		else
		{
		  switch ($_SESSION['campo'][$x][$y])
		  {
		    case peao1:
		    echo"<img src='imagens/peaoj1".$cor.".jpg' width='".tamanho."' height='".tamanho."'>";
		    break;
		    case torre1:
		    echo"<img src='imagens/torrej1".$cor.".jpg' width='".tamanho."' height='".tamanho."'>";
		    break;
		    case bispo1:
		    echo"<img src='imagens/bispoj1".$cor.".jpg' width='".tamanho."' height='".tamanho."'>";
		    break;
		    case cavalo1:
		    echo"<img src='imagens/cavaloj1".$cor.".jpg' width='".tamanho."' height='".tamanho."'>";
		    break;
		    case rei1:
		    echo"<img src='imagens/reij1".$cor.".jpg' width='".tamanho."' height='".tamanho."'>";
		    break;
		    case rainha1:
		    echo"<img src='imagens/rainhaj1".$cor.".jpg' width='".tamanho."' height='".tamanho."'>";
		 	break;
		    case peao2:
		    echo botao("peaoj2".$cor.".jpg",peao2,$x,$y);
		    break;
		    case torre2:
		    echo botao("torrej2".$cor.".jpg",torre2,$x,$y);
		    break;
		    case bispo2:
		    echo botao("bispoj2".$cor.".jpg",bispo2,$x,$y);
		    break;
		    case cavalo2:
		    echo botao("cavaloj2".$cor.".jpg",cavalo2,$x,$y);
		    break;
		    case rei2:
		    echo botao("reij2".$cor.".jpg",rei2,$x,$y);
		    break;
		    case rainha2:
		    echo botao("rainhaj2".$cor.".jpg",rainha2,$x,$y);
		    break;
		    default:
		    echo"<img src='imagens/".$cor.".jpg' width='".tamanho."' height='".tamanho."'>";
		    break;
		  }
		}
		echo "</td>";
      }
      echo"</tr>";
    }
    echo"</table>";
    ?>
    <a href='index.php'>Reiniciar</a>
  </body>
</html>