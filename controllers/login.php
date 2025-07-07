<?php
// Ubicación: controllers/login.php

session_start();

// Simulación de credenciales válidas
$usuario_valido = "admin";
$clave_valida = "123456";

// Validar que los campos estén presentes
if (!isset($_POST['usuario']) || !isset($_POST['clave']) || 
    trim($_POST['usuario']) === '' || trim($_POST['clave']) === '') {
    
    header("Location: ../index.php?error=campos");
    exit;
}

$usuario = $_POST['usuario'];
$clave = $_POST['clave'];

// Validar usuario y contraseña (simulado)
if ($usuario === $usuario_valido && $clave === $clave_valida) {
    // Guardar sesión (puede expandirse luego)
    $_SESSION['usuario'] = $usuario;

    // Redirigir a la vista principal
    header("Location: vista_principal.php");
    exit;
} else {
    header("Location: ../index.php?error=datos");
    exit;
}
