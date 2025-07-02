<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

$id = $_GET['id'] ?? null;

if ($id) {
    // Simulación de eliminación (en una app real se borraría de la BD y opcionalmente la imagen del servidor)
    header("Location: planchas.php?mensaje=eliminada");
    exit();
} else {
    header("Location: planchas.php?error=sin_id");
    exit();
}
