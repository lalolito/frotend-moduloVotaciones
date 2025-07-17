<?php
session_start();

// Usuarios simulados con sus roles
$usuarios = [
    'admin' => ['clave' => '123456', 'rol' => 'admin'],
    'estudiante' => ['clave' => '123456', 'rol' => 'estudiante'],
    'docente' => ['clave' => '123456', 'rol' => 'docente']
];

// Validar que los campos estén presentes
if (!isset($_POST['usuario']) || !isset($_POST['clave']) ||
    trim($_POST['usuario']) === '' || trim($_POST['clave']) === '') {

    header("Location: ../index.php?error=campos");
    exit;
}

$usuario = $_POST['usuario'];
$clave = $_POST['clave'];

// Verificar si el usuario existe y la clave es correcta
if (isset($usuarios[$usuario]) && $usuarios[$usuario]['clave'] === $clave) {
    $_SESSION['usuario'] = $usuario;
    $_SESSION['rol'] = $usuarios[$usuario]['rol'];

    // Redirigir según el rol
    if ($_SESSION['rol'] === 'admin') {
        header("Location: ../views/vista_principal.php");
    } else {
        header("Location: ../views/vista_usuario.php");
    }
    exit;
} else {
    header("Location: ../index.php?error=datos");
    exit;
}
