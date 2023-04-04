<?php
session_start();
session_destroy();
session_unset();
include "constantes.inc";
echo"fim".b."<a href='index.php'>Reiniciar</a>";
?>