<?php

session_start();/* session_start — Iniciar una nueva sesión o reanudar la existente */
session_unset();/* session_unset — Libera todas las variables de sesión */
session_destroy();/* Destruye toda la información registrada de una sesión */
header('Location: login.php'); /* AQUI Lo Que Hace ES Que Te Manda A Ingreso */

?>