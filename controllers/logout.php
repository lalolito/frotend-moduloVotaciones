<?php
// Ubicación: controllers/logout.php

session_start();

// Destruir todas las variables de sesión
$_SESSION = [];
session_destroy();

// Redirigir al formulario de login
header("Location: index.php");
exit;
