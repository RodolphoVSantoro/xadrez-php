<?php
// No 1° índice - vai para cima e + para baixo (cx = vertical)
// No 2° índice - vai para a esquerda e + vai para a direita (cy = horizontal)
if(isset($_POST['cancelar']))
{
	header("Location: Peca.php");
}
session_start();
include "constantes.inc";
$tipo_m = $_POST['tipo'];
define("cx",$_POST['coorx']);
define("cy",$_POST['coory']);
$cx = $_POST['coorx'];
$cy = $_POST['coory'];
$marcado = false;
echo $_SESSION['turno']."° turno".b;
function botao($imagem,$tipo,$x,$y)
{
	return
	"<form method='POST' action='jogada.php'>
	    <input type='hidden' value=".$tipo." name='alvo'>
	    <input type='hidden' name='coorx' value=".$x.">
	    <input type='hidden' name='coory' value=".$y.">
	    <input type='hidden' name='coorxa' value=".cx.">
	    <input type='hidden' name='coorya' value=".cy.">
	    <input type='hidden' name='movendo' value=".$_POST['tipo'].">
	    <input type='image' src ='imagens/".$imagem."' width='".tamanho."' height='".tamanho."'>
	</form>";
}

$campo = $_SESSION['campo'];
switch ($tipo_m) {
	case peao1:
		if($cy > 0)
		{
			$cima = $cx - 1;
			$esquerda = $cy - 1;
			$cima_esquerda = $campo[$cima][$esquerda];
			if($cima_esquerda != vazio && $cima_esquerda > 6)
			{
				$campo[$cima][$esquerda] = matar + (($campo[$cima][$esquerda])/100);
				$marcado = true;
			}
		}

		if($cy < 7)
		{
			$cima = $cx - 1;
			$direita = $cy + 1;
			$cima_direita = $campo[$cima][$direita];
			if($cima_direita != vazio && $cima_direita > 6)
			{
				$marcado = true;
				$campo[$cima][$direita] = matar + (($campo[$cima][$direita])/100);
			}
		}

		if($cx == 6)
		{
			$x = 5;
			while($campo[$x][$cy] == vazio && $x >= 4)
			{
				$marcado = true;
				$campo[$x][$cy] = movimento;
				$x -= 1;
			}
		}
		else
		{
			$cima = $cx - 1;
			if($campo[$cima][$cy] == vazio)
			{
				$marcado = true;
				$campo[$cima][$cy] = movimento;
			}
		}
	break;
	case peao2:
		if($cy < 7)
		{
			$baixo = $cx + 1;
			$direita = $cy + 1;
			$baixo_direita = $campo[$baixo][$direita];
			if($baixo_direita != vazio && $baixo_direita < 7)
			{
				$marcado = true;
				$campo[$baixo][$direita] = matar + (($campo[$baixo][$direita])/100);
			}
		}

		if($cy > 0)
		{
			$baixo = $cx + 1;
			$esquerda = $cy - 1;
			$baixo_esquerda = $campo[$baixo][$esquerda];
			if($baixo_esquerda != vazio && $baixo_esquerda < 7)
			{
				$marcado = true;
				$campo[$baixo][$esquerda] = matar + (($campo[$baixo][$esquerda])/100);
			}
		}

		if($cx == 1)
		{
			$x = 2;
			while($campo[$x][$cy] == vazio && $x <= 3)
			{
				$marcado = true;
				$campo[$x][$cy] = movimento;
				$x++;
			}
		}
		else
		{
			$baixo = $cx + 1;
			if($campo[$baixo][$cy] == vazio)
			{
				$marcado = true;
				$campo[$baixo][$cy] = movimento;
			}
		}
	break;
	
	case rei1:
		if($cy > 0)
		{
			$esquerda = $cy - 1;
			if($campo[$cx][$esquerda] == vazio)
			{
				$marcado = true;
				$campo[$cx][$esquerda] = movimento;
			}
			else
			{
				if($campo[$cx][$esquerda] > 6)
				{
					$marcado = true;
					$campo[$cx][$esquerda] = matar + (($campo[$cx][$esquerda])/100);
				}
			}
		}
		if($cy < 7)
		{
			$direita = $cy + 1;
			if($campo[$cx][$direita] == vazio)
			{
				$marcado = true;
				$campo[$cx][$direita] = movimento;
			}
			else
			{
				if($campo[$cx][$direita] >6)
				{
					$marcado = true;
					$campo[$cx][$direita] = matar + (($campo[$cx][$direita])/100);
				}
			}
		}
		if($cx < 7)
		{
			$baixo = $cx + 1;
			if($campo[$baixo][$cy] == vazio)
			{
				$marcado = true;
				$campo[$baixo][$cy] = movimento;
			}
			else
			{
				if($campo[$baixo][$cy] > 6)
				{
					$marcado = true;
					$campo[$baixo][$cy] = matar + (($campo[$baixo][$cy])/100);
				}
			}

			if($cy < 7)
			{	
				if($campo[$baixo][$direita] == vazio)
				{
					$marcado = true;
					$campo[$baixo][$direita] = movimento;
				}
				else
				{
					if($campo[$baixo][$direita] > 6)
					{
						$marcado = true;
						$campo[$baixo][$direita] = matar + (($campo[$baixo][$direita])/100);
					}
				}
			}

			if($cy > 0)
			{
				if($campo[$baixo][$esquerda] == vazio)
				{
					$marcado = true;
					$campo[$baixo][$esquerda] = movimento;
				}
				else
				{
					if($campo[$baixo][$esquerda] > 6)
					{
						$marcado = true;
						$campo[$baixo][$esquerda] = matar + (($campo[$baixo][$esquerda])/100);
					}
				}
			}
		}

		if($cx > 0)
		{
			$cima = $cx - 1;
			if($campo[$cima][$cy] == vazio)
			{
				$marcado = true;
				$campo[$cima][$cy] = movimento;
			}
			else
			{
				if($campo[$cima][$cy] > 6)
				{
					$marcado = true;
					$campo[$cima][$cy] = matar + (($campo[$cima][$cy])/100);
				}
			}
			if($cy < 7)
			{	
				if($campo[$cima][$direita] == vazio)
				{
					$marcado = true;
					$campo[$cima][$direita] = movimento;
				}
				else
				{
					if($campo[$cima][$direita] > 6)
					{
						$marcado = true;
						$campo[$cima][$direita] = matar + (($campo[$cima][$direita])/100);
					}
				}
			}

			if($cy > 0)
			{
				if($campo[$cima][$esquerda] == vazio)
				{
					$marcado = true;
					$campo[$cima][$esquerda] = movimento;
				}
				else
				{
					if($campo[$cima][$esquerda] > 6)
					{
						$marcado = true;
						$campo[$cima][$esquerda] = matar + (($campo[$cima][$esquerda])/100);
					}
				}
			}
		}
	break;
	case rei2:
		if($cy > 0)
		{
			$esquerda = $cy - 1;
			if($campo[$cx][$esquerda] == vazio)
			{
				$marcado = true;
				$campo[$cx][$esquerda] = movimento;
			}
			else
			{
				if($campo[$cx][$esquerda] < 7)
				{
					$marcado = true;
					$campo[$cx][$esquerda] = matar + (($campo[$cx][$esquerda])/100);
				}
			}
		}
		if($cy < 7)
		{
			$direita = $cy + 1;
			if($campo[$cx][$direita] == vazio)
			{
				$marcado = true;
				$campo[$cx][$direita] = movimento;
			}
			else
			{
				if($campo[$cx][$direita] < 7)
				{
					$marcado = true;
					$campo[$cx][$direita] = matar + (($campo[$cx][$direita])/100);
				}
			}
		}
		if($cx < 7)
		{
			$baixo = $cx + 1;
			if($campo[$baixo][$cy] == vazio)
			{
				$marcado = true;
				$campo[$baixo][$cy] = movimento;
			}
			else
			{
				if($campo[$baixo][$cy] < 7)
				{
					$marcado = true;
					$campo[$baixo][$cy] = matar + (($campo[$baixo][$cy])/100);
				}
			}

			if($cy < 7)
			{	
				if($campo[$baixo][$direita] == vazio)
				{
					$marcado = true;
					$campo[$baixo][$direita] = movimento;
				}
				else
				{
					if($campo[$baixo][$direita] < 7)
					{
						$marcado = true;
						$campo[$baixo][$direita] = matar + (($campo[$baixo][$direita])/100);
					}
				}
			}

			if($cy > 0)
			{
				if($campo[$baixo][$esquerda] == vazio)
				{
					$marcado = true;
					$campo[$baixo][$esquerda] = movimento;
				}
				else
				{
					if($campo[$baixo][$esquerda] < 7)
					{
						$marcado = true;
						$campo[$baixo][$esquerda] = matar + (($campo[$baixo][$esquerda])/100);
					}
				}
			}
		}

		if($cx > 0)
		{
			$cima = $cx - 1;
			if($campo[$cima][$cy] == vazio)
			{
				$marcado = true;
				$campo[$cima][$cy] = movimento;
			}
			else
			{
				if($campo[$cima][$cy] < 7)
				{
					$marcado = true;
					$campo[$cima][$cy] = matar + (($campo[$cima][$cy])/100);
				}
			}
			if($cy < 7)
			{	
				if($campo[$cima][$direita] == vazio)
				{
					$marcado = true;
					$campo[$cima][$direita] = movimento;
				}
				else
				{
					if($campo[$cima][$direita] < 7)
					{
						$marcado = true;
						$campo[$cima][$direita] = matar + (($campo[$cima][$direita])/100);
					}
				}
			}

			if($cy > 0)
			{
				if($campo[$cima][$esquerda] == vazio)
				{
					$marcado = true;
					$campo[$cima][$esquerda] = movimento;
				}
				else
				{
					if($campo[$cima][$esquerda] < 7)
					{
						$marcado = true;
						$campo[$cima][$esquerda] = matar + (($campo[$cima][$esquerda])/100);
					}
				}
			}
		}
	break;
	
	case rainha1:
		#esquerda
		$y = $cy - 1;
		while($y >= 0)
		{
			if($campo[$cx][$y] != vazio)
			{
				if($campo[$cx][$y] > 6)
				{
					$marcado = true;
					$campo[$cx][$y] = matar + (($campo[$cx][$y])/100);
				}
					break;
			}
			else
			{
				$marcado = true;
				$campo[$cx][$y] = movimento;
			}
			$y-= 1;
		}
		#direita
		$y = $cy + 1;
		while($y <= 7)
		{
			if($campo[$cx][$y] != vazio)
			{
				if($campo[$cx][$y] > 6)
				{
					$marcado = true;
					$campo[$cx][$y] = matar + (($campo[$cx][$y])/100);
				}
				break;
			}
			else
			{
				$marcado = true;
				$campo[$cx][$y] = movimento;
			}
			$y++;
		}
		#cima
		$x = $cx - 1;
		while($x >= 0)
		{
			if($campo[$x][$cy] != vazio)
			{
				if($campo[$x][$cy] > 6)
				{
					$marcado = true;
					$campo[$x][$cy] = matar + (($campo[$x][$cy])/100);
				}
				break;
			}
			else
			{
				$marcado = true;
				$campo[$x][$cy] = movimento;
			}
			$x--;
		}
		#baixo
		$x = $cx + 1;
		while($x <= 7)
		{
			if($campo[$x][$cy] != vazio)
			{
				if($campo[$x][$cy] > 6)
				{
					$marcado = true;
					$campo[$x][$cy] = matar + (($campo[$x][$cy])/100);
				}
				break;
			}
			else
			{
				$marcado = true;
				$campo[$x][$cy] = movimento;
			}
			$x++;
		}
		#cima esquerda
		$x = $cx - 1;
		$y = $cy - 1;
		while($x >= 0 && $y >= 0)
		{
			if($campo[$x][$y] != vazio)
			{
				if($campo[$x][$y] > 6)
				{
					$marcado = true;
					$campo[$x][$y] = matar + (($campo[$x][$y])/100);
				}
				break;
			}
			else
			{
				$marcado = true;
				$campo[$x][$y] = movimento;
			}
			$x--;
			$y--;
		}
		#cima direita
		$x = $cx - 1;
		$y = $cy + 1;
		while($x >= 0 && $y <=7)
		{
			if($campo[$x][$y] != vazio)
			{
				if($campo[$x][$y] > 6)
				{
					$marcado = true;
					$campo[$x][$y] = matar + (($campo[$x][$y])/100);
				}
				break;
			}
			else
			{
				$marcado = true;
				$campo[$x][$y] = movimento;
			}
			$x--;
			$y++;
		}
		#baixo esquerda
		$x = $cx + 1;
		$y = $cy - 1;
		while($x <= 7 && $y >= 0)
		{
			if($campo[$x][$y] != vazio)
				{
					if($campo[$x][$y] > 6)
					{
						$marcado = true;
						$campo[$x][$y] = matar + (($campo[$x][$y])/100);
					}
					break;
				}
				else
				{
					$marcado = true;
					$campo[$x][$y] = movimento;
				}
				$x++;
				$y--;
			}
		#baixo direita
		$x = $cx + 1;
		$y = $cy + 1;
		while($x <= 7 && $y <=7)
		{
			if($campo[$x][$y] != vazio)
			{
				if($campo[$x][$y] > 6)
				{
					$marcado = true;
					$campo[$x][$y] = matar + (($campo[$x][$y])/100);
				}
				break;
			}
			else
			{
				$marcado = true;
				$campo[$x][$y] = movimento;
			}
			$x++;
			$y++;
		}
	break;
	case rainha2:
		#esquerda
		$y = $cy - 1;
		while($y >= 0)
		{
			if($campo[$cx][$y] != vazio)
			{
				if($campo[$cx][$y] < 7)
				{
					$marcado = true;
					$campo[$cx][$y] = matar + (($campo[$cx][$y])/100);
				}
				break;
			}
			else
			{
				$marcado = true;
				$campo[$cx][$y] = movimento;
			}
			$y-= 1;
		}
		#direita
		$y = $cy + 1;
		while($y <= 7)
		{
			if($campo[$cx][$y] != vazio)
			{
				if($campo[$cx][$y] < 7)
				{
					$marcado = true;
					$campo[$cx][$y] = matar + (($campo[$cx][$y])/100);
				}
				break;
			}
			else
			{
				$marcado = true;
				$campo[$cx][$y] = movimento;
			}
			$y++;
		}
		#cima
		$x = $cx - 1;
		while($x >= 0)
		{
			if($campo[$x][$cy] != vazio)
			{
				if($campo[$x][$cy] < 7)
				{
					$marcado = true;
					$campo[$x][$cy] = matar + (($campo[$x][$cy])/100);
				}
				break;
			}
			else
			{
				$marcado = true;
				$campo[$x][$cy] = movimento;
			}
			$x--;
		}
		#baixo
		$x = $cx + 1;
		while($x <= 7)
		{
			if($campo[$x][$cy] != vazio)
			{
				if($campo[$x][$cy] < 7)
				{
					$marcado = true;
					$campo[$x][$cy] = matar + (($campo[$x][$cy])/100);
				}
				break;
			}
			else
			{
				$marcado = true;
				$campo[$x][$cy] = movimento;
			}
			$x++;
		}
		#cima esquerda
		$x = $cx - 1;
		$y = $cy - 1;
		while($x >= 0 && $y >= 0)
		{
			if($campo[$x][$y] != vazio)
			{
				if($campo[$x][$y] < 7)
				{
					$marcado = true;
					$campo[$x][$y] = matar + (($campo[$x][$y])/100);
				}
				break;
			}
			else
			{
				$marcado = true;
				$campo[$x][$y] = movimento;
			}
			$x--;
			$y--;
		}
		#cima direita
		$x = $cx - 1;
		$y = $cy + 1;
		while($x >= 0 && $y <=7)
		{
			if($campo[$x][$y] != vazio)
			{
				if($campo[$x][$y] < 7)
				{
					$marcado = true;
					$campo[$x][$y] = matar + (($campo[$x][$y])/100);
				}
				break;
			}
			else
			{
				$marcado = true;
				$campo[$x][$y] = movimento;
			}
			$x--;
			$y++;
		}
		#baixo esquerda
		$x = $cx + 1;
		$y = $cy - 1;
		while($x <= 7 && $y >= 0)
		{
			if($campo[$x][$y] != vazio)
			{
				if($campo[$x][$y] < 7)
				{
					$marcado = true;
					$campo[$x][$y] = matar + (($campo[$x][$y])/100);
				}
				break;
			}
			else
			{
				$marcado = true;
				$campo[$x][$y] = movimento;
			}
			$x++;
			$y--;
		}
		#baixo direita
		$x = $cx + 1;
		$y = $cy + 1;
		while($x <=7 && $y <=7)
		{
			if($campo[$x][$y] != vazio)
			{
				if($campo[$x][$y] < 7)
				{
					$marcado = true;
					$campo[$x][$y] = matar + (($campo[$x][$y])/100);
				}
				break;
			}
			else
			{
				$marcado = true;
				$campo[$x][$y] = movimento;
			}
			$x++;
			$y++;
		}	
	break;
	
	case torre1:
		#esquerda
		$y = $cy - 1;
		while($y >= 0)
		{
			if($campo[$cx][$y] != vazio)
			{
				if($campo[$cx][$y] > 6)
				{
					$marcado = true;
					$campo[$cx][$y] = matar + (($campo[$cx][$y])/100);
				}
					break;
			}
			else
			{
				$marcado = true;
				$campo[$cx][$y] = movimento;
			}
			$y-= 1;
		}
		#direita
		$y = $cy + 1;
		while($y <= 7)
		{
			if($campo[$cx][$y] != vazio)
			{
				if($campo[$cx][$y] > 6)
				{
					$marcado = true;
					$campo[$cx][$y] = matar + (($campo[$cx][$y])/100);
				}
				break;
			}
			else
			{
				$marcado = true;
				$campo[$cx][$y] = movimento;
			}
			$y++;
		}
		#cima
		$x = $cx - 1;
		while($x >= 0)
		{
			if($campo[$x][$cy] != vazio)
			{
				if($campo[$x][$cy] > 6)
				{
					$marcado = true;
					$campo[$x][$cy] = matar + (($campo[$x][$cy])/100);
				}
				break;
			}
			else
			{
				$marcado = true;
				$campo[$x][$cy] = movimento;
			}
			$x--;
		}
		#baixo
		$x = $cx + 1;
		while($x <= 7)
		{
			if($campo[$x][$cy] != vazio)
			{
				if($campo[$x][$cy] > 6)
				{
					$marcado = true;
					$campo[$x][$cy] = matar + (($campo[$x][$cy])/100);
				}
				break;
			}
			else
			{
				$marcado = true;
				$campo[$x][$cy] = movimento;
			}
			$x++;
		}
	break;
	case torre2:
		#esquerda
		$y = $cy - 1;
		while($y >= 0)
		{
			if($campo[$cx][$y] != vazio)
			{
				if($campo[$cx][$y] < 7)
				{
					$marcado = true;
					$campo[$cx][$y] = matar + (($campo[$cx][$y])/100);
				}
				break;
			}
			else
			{
				$marcado = true;
				$campo[$cx][$y] = movimento;
			}
			$y-= 1;
		}
		#direita
		$y = $cy + 1;
		while($y <= 7)
		{
			if($campo[$cx][$y] != vazio)
			{
				if($campo[$cx][$y] < 7)
				{
					$marcado = true;
					$campo[$cx][$y] = matar + (($campo[$cx][$y])/100);
				}
				break;
			}
			else
			{
				$marcado = true;
				$campo[$cx][$y] = movimento;
			}
			$y++;
		}
		#cima
		$x = $cx - 1;
		while($x >= 0)
		{
			if($campo[$x][$cy] != vazio)
			{
				if($campo[$x][$cy] < 7)
				{
					$marcado = true;
					$campo[$x][$cy] = matar + (($campo[$x][$cy])/100);
				}
				break;
			}
			else
			{
				$marcado = true;
				$campo[$x][$cy] = movimento;
			}
			$x--;
		}
		#baixo
		$x = $cx + 1;
		while($x <= 7)
		{
			if($campo[$x][$cy] != vazio)
			{
				if($campo[$x][$cy] < 7)
				{
					$marcado = true;
					$campo[$x][$cy] = matar + (($campo[$x][$cy])/100);
				}
				break;
			}
			else
			{
				$marcado = true;
				$campo[$x][$cy] = movimento;
			}
			$x++;
		}
	break;
	
	case bispo1:
		#cima esquerda
		$x = $cx - 1;
		$y = $cy - 1;
		while($x >= 0 && $y >= 0)
		{
			if($campo[$x][$y] != vazio)
			{
				if($campo[$x][$y] > 6)
				{
					$marcado = true;
					$campo[$x][$y] = matar + (($campo[$x][$y])/100);
				}
				break;
			}
			else
			{
				$marcado = true;
				$campo[$x][$y] = movimento;
			}
			$x--;
			$y--;
		}
		#cima direita
		$x = $cx - 1;
		$y = $cy + 1;
		while($x >= 0 && $y <=7)
		{
			if($campo[$x][$y] != vazio)
			{
				if($campo[$x][$y] > 6)
				{
					$marcado = true;
					$campo[$x][$y] = matar + (($campo[$x][$y])/100);
				}
				break;
			}
			else
			{
				$marcado = true;
				$campo[$x][$y] = movimento;
			}
			$x--;
			$y++;
		}
		#baixo esquerda
		$x = $cx + 1;
		$y = $cy - 1;
		while($x <= 7 && $y >= 0)
		{
			if($campo[$x][$y] != vazio)
				{
					if($campo[$x][$y] > 6)
					{
						$marcado = true;
						$campo[$x][$y] = matar + (($campo[$x][$y])/100);
					}
					break;
				}
				else
				{
					$marcado = true;
					$campo[$x][$y] = movimento;
				}
				$x++;
				$y--;
			}
		#baixo direita
		$x = $cx + 1;
		$y = $cy + 1;
		while($x <= 7 && $y <=7)
		{
			if($campo[$x][$y] != vazio)
			{
				if($campo[$x][$y] > 6)
				{
					$marcado = true;
					$campo[$x][$y] = matar + (($campo[$x][$y])/100);
				}
				break;
			}
			else
			{
				$marcado = true;
				$campo[$x][$y] = movimento;
			}
			$x++;
			$y++;
		}
	break;
	case bispo2:
		#cima esquerda
		$x = $cx - 1;
		$y = $cy - 1;
		while($x >= 0 && $y >= 0)
		{
			if($campo[$x][$y] != vazio)
			{
				if($campo[$x][$y] < 7)
				{
					$marcado = true;
					$campo[$x][$y] = matar + (($campo[$x][$y])/100);
				}
				break;
			}
			else
			{
				$marcado = true;
				$campo[$x][$y] = movimento;
			}
			$x--;
			$y--;
		}
		#cima direita
		$x = $cx - 1;
		$y = $cy + 1;
		while($x >= 0 && $y <=7)
		{
			if($campo[$x][$y] != vazio)
			{
				if($campo[$x][$y] < 7)
				{
					$marcado = true;
					$campo[$x][$y] = matar + (($campo[$x][$y])/100);
				}
				break;
			}
			else
			{
				$marcado = true;
				$campo[$x][$y] = movimento;
			}
			$x--;
			$y++;
		}
		#baixo esquerda
		$x = $cx + 1;
		$y = $cy - 1;
		while($x <= 7 && $y >= 0)
		{
			if($campo[$x][$y] != vazio)
			{
				if($campo[$x][$y] < 7)
				{
					$marcado = true;
					$campo[$x][$y] = matar + (($campo[$x][$y])/100);
				}
				break;
			}
			else
			{
				$marcado = true;
				$campo[$x][$y] = movimento;
			}
			$x++;
			$y--;
		}
		#baixo direita
		$x = $cx + 1;
		$y = $cy + 1;
		while($x <=7 && $y <=7)
		{
			if($campo[$x][$y] != vazio)
			{
				if($campo[$x][$y] < 7)
				{
					$marcado = true;
					$campo[$x][$y] = matar + (($campo[$x][$y])/100);
				}
				break;
			}
			else
			{
				$marcado = true;
				$campo[$x][$y] = movimento;
			}
			$x++;
			$y++;
		}
	break;

	case cavalo1:
		if($cx >= 2)
		{
			$vertical = $cx - 2;
			if($cy < 7)
			{
				$horizontal = $cy + 1;
				if($campo[$vertical][$horizontal] == vazio)
				{
					$marcado = true;
					$campo[$vertical][$horizontal] = movimento;
				}
				else
				{
					if($campo[$vertical][$horizontal] > 6)
					{
						$marcado = true;
						$campo[$vertical][$horizontal] = matar + (($campo[$vertical][$horizontal])/100);
					}
				}
			}
			if($cy > 0)
			{
				$horizontal = $cy - 1;
				if($campo[$vertical][$horizontal] == vazio)
				{
					$marcado = true;
					$campo[$vertical][$horizontal] = movimento;
				}
				else
				{
					if($campo[$vertical][$horizontal] > 6)
					{
						$marcado = true;
						$campo[$vertical][$horizontal] = matar + (($campo[$vertical][$horizontal])/100);
					}
				}
			}
		}
		if($cx <= 5)
		{
			$vertical = $cx + 2;
			if($cy < 7)
			{
				$horizontal = $cy + 1;
				if($campo[$vertical][$horizontal] == vazio)
				{
					$marcado = true;
					$campo[$vertical][$horizontal] = movimento;
				}
				else
				{
					if($campo[$vertical][$horizontal] > 6)
					{
						$marcado = true;
						$campo[$vertical][$horizontal] = matar + (($campo[$vertical][$horizontal])/100);
					}
				}
			}
			if($cy > 0)
			{
				$horizontal = $cy - 1;
				if($campo[$vertical][$horizontal] == vazio)
				{
					$marcado = true;
					$campo[$vertical][$horizontal] = movimento;
				}
				else
				{
					if($campo[$vertical][$horizontal] > 6)
					{
						$marcado = true;
						$campo[$vertical][$horizontal] = matar + (($campo[$vertical][$horizontal])/100);
					}
				}
			}
		}
		if($cy >= 2)
		{
			$horizontal = $cy - 2;
			if($cx < 7)
			{
				$vertical = $cx + 1;
				if($campo[$vertical][$horizontal] == vazio)
				{
					$marcado = true;
					$campo[$vertical][$horizontal] = movimento;
				}
				else
				{
					if($campo[$vertical][$horizontal] > 6)
					{
						$marcado = true;
						$campo[$vertical][$horizontal] = matar + (($campo[$vertical][$horizontal])/100);
					}
				}
			}
			if($cx > 0)
			{
				$vertical = $cx - 1;
				if($campo[$vertical][$horizontal] == vazio)
				{
					$marcado = true;
					$campo[$vertical][$horizontal] = movimento;
				}
				else
				{
					if($campo[$vertical][$horizontal] > 6)
					{
						$marcado = true;
						$campo[$vertical][$horizontal] = matar + (($campo[$vertical][$horizontal])/100);
					}
				}
			}
		}
		if($cy <= 5)
		{
			$horizontal = $cy + 2;
			if($cx < 7)
			{
				$vertical = $cx + 1;
				if($campo[$vertical][$horizontal] == vazio)
				{
					$marcado = true;
					$campo[$vertical][$horizontal] = movimento;
				}
				else
				{
					if($campo[$vertical][$horizontal] > 6)
					{
						$marcado = true;
						$campo[$vertical][$horizontal] = matar + (($campo[$vertical][$horizontal])/100);
					}
				}
			}
			if($cx > 0)
			{
				$vertical = $cx - 1;
				if($campo[$vertical][$horizontal] == vazio)
				{
					$marcado = true;
					$campo[$vertical][$horizontal] = movimento;
				}
				else
				{
					if($campo[$vertical][$horizontal] > 6)
					{
						$marcado = true;
						$campo[$vertical][$horizontal] = matar + (($campo[$vertical][$horizontal])/100);
					}
				}
			}
		}
	break;
	case cavalo2:
		if($cx >= 2)
		{
			$vertical = $cx - 2;
			if($cy < 7)
			{
				$horizontal = $cy + 1;
				if($campo[$vertical][$horizontal] == vazio)
				{
					$marcado = true;
					$campo[$vertical][$horizontal] = movimento;
				}
				else
				{
					if($campo[$vertical][$horizontal] < 7)
					{
						$marcado = true;
						$campo[$vertical][$horizontal] = matar + (($campo[$vertical][$horizontal])/100);
					}
				}
			}
			if($cy > 0)
			{
				$horizontal = $cy - 1;
				if($campo[$vertical][$horizontal] == vazio)
				{
					$marcado = true;
					$campo[$vertical][$horizontal] = movimento;
				}
				else
				{
					if($campo[$vertical][$horizontal] < 7)
					{
						$marcado = true;
						$campo[$vertical][$horizontal] = matar + (($campo[$vertical][$horizontal])/100);
					}
				}
			}
		}
		if($cx <= 5)
		{
			$vertical = $cx + 2;
			if($cy < 7)
			{
				$horizontal = $cy + 1;
				if($campo[$vertical][$horizontal] == vazio)
				{
					$marcado = true;
					$campo[$vertical][$horizontal] = movimento;
				}
				else
				{
					if($campo[$vertical][$horizontal] < 7)
					{
						$marcado = true;
						$campo[$vertical][$horizontal] = matar + (($campo[$vertical][$horizontal])/100);
					}
				}
			}
			if($cy > 0)
			{
				$horizontal = $cy - 1;
				if($campo[$vertical][$horizontal] == vazio)
				{
					$marcado = true;
					$campo[$vertical][$horizontal] = movimento;
				}
				else
				{
					if($campo[$vertical][$horizontal] < 7)
					{
						$marcado = true;
						$campo[$vertical][$horizontal] = matar + (($campo[$vertical][$horizontal])/100);
					}
				}
			}
		}
		if($cy >= 2)
		{
			$horizontal = $cy - 2;
			if($cx < 7)
			{
				$vertical = $cx + 1;
				if($campo[$vertical][$horizontal] == vazio)
				{
					$marcado = true;
					$campo[$vertical][$horizontal] = movimento;
				}
				else
				{
					if($campo[$vertical][$horizontal] < 7)
					{
						$marcado = true;
						$campo[$vertical][$horizontal] = matar + (($campo[$vertical][$horizontal])/100);
					}
				}
			}
			if($cx > 0)
			{
				$vertical = $cx - 1;
				if($campo[$vertical][$horizontal] == vazio)
				{
					$marcado = true;
					$campo[$vertical][$horizontal] = movimento;
				}
				else
				{
					if($campo[$vertical][$horizontal] < 7)
					{
						$marcado = true;
						$campo[$vertical][$horizontal] = matar + (($campo[$vertical][$horizontal])/100);
					}
				}
			}
		}
		if($cy <= 5)
		{
			$horizontal = $cy + 2;
			if($cx < 7)
			{
				$vertical = $cx + 1;
				if($campo[$vertical][$horizontal] == vazio)
				{
					$marcado = true;
					$campo[$vertical][$horizontal] = movimento;
				}
				else
				{
					if($campo[$vertical][$horizontal] < 7)
					{
						$marcado = true;
						$campo[$vertical][$horizontal] = matar + (($campo[$vertical][$horizontal])/100);
					}
				}
			}
			if($cx > 0)
			{
				$vertical = $cx - 1;
				if($campo[$vertical][$horizontal] == vazio)
				{
					$marcado = true;
					$campo[$vertical][$horizontal] = movimento;
				}
				else
				{
					if($campo[$vertical][$horizontal] < 7)
					{
						$marcado = true;
						$campo[$vertical][$horizontal] = matar + (($campo[$vertical][$horizontal])/100);
					}
				}
			}
		}
	break;
}

if($marcado == false)
{
	header('Location: Peca.php');
}
?>
<html>
  <head>
    <meta charset='UTF-8'>
  </head>
  <body>
  <?php

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
      	switch (intval($campo[$x][$y]))
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
		    case movimento:
		    	echo botao($cor.".jpg",movimento,$x,$y);
		    break;
		    case matar:
		    	$peca = $campo[$x][$y] - intval($campo[$x][$y]);
		    	$peca = round(($peca * 100),2);
		    	switch ($peca) {
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
		    	}
		    break;
		    default:
		    echo"<img src='imagens/".$cor.".jpg' width='".tamanho."' height='".tamanho."'>";
		    break;
		}
		echo"</td>";
  }
  echo "</tr>";
}
  echo "</table>";
  echo b."<a href='index.php'>Reiniciar</a>";
  echo b."
  <form method='post'>
  	<input type='submit' name='cancelar' value='cancelar'>
  </form>
  ";
  ?>
  </body>
</html>