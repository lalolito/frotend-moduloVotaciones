<?php
session_start();

// Simulación de usuarios (normalmente vendría de una base de datos)
$usuarios = [
    '1055912431' => ['clave' => '123456', 'rol' => 'Estudiante', 'facultad_codigo' => 'ING', 'nombre' => 'chuspita'],
    '1234567890' => ['clave' => '123456', 'rol' => 'Docente', 'facultad_codigo' => 'ECO', 'nombre' => 'jaimecito ']
];

$usuario = $_POST['usuario'] ?? '';
$clave = $_POST['clave'] ?? '';

// Validar
if (!isset($usuarios[$usuario]) || $usuarios[$usuario]['clave'] !== $clave) {
    header("Location: ../index.php?error=datos");
    exit;
}

// Guardar en sesión
$_SESSION['usuario'] = $usuario;
$_SESSION['rol'] = $usuarios[$usuario]['rol'];
$_SESSION['facultad_codigo'] = $usuarios[$usuario]['facultad_codigo'];
$_SESSION['nombre'] = $usuarios[$usuario]['nombre'];

// Redirigir a selección
header("Location: seleccion_tipo.php");
exit;
