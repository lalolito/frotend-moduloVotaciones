<?php

$facultad = $_GET['facultad'] ?? null;

if (!$facultad) {
    header("Location: reportes.php?error=facultad");
    exit();
}

header('Content-Type: text/csv');
header("Content-Disposition: attachment;filename=reporte_{$facultad}.csv");

// Simular datos por facultad
$datos = [
    ['Plancha', 'Votación', 'Total de Votos']
];

if ($facultad === 'Ingeniería') {
    $datos[] = ['Plancha Verde', 'Consejo Académico', 150];
} elseif ($facultad === 'Derecho') {
    $datos[] = ['Plancha Renovación', 'Representante Estudiantil', 220];
} elseif ($facultad === 'Educación') {
    $datos[] = ['Plancha Futuro', 'Consejo de Facultad', 90];
} elseif ($facultad === 'Arquitectura') {
    $datos[] = ['Plancha Diseño', 'Consejo de Facultad', 75];
} else {
    $datos[] = ['Sin resultados', '-', 0];
}

$output = fopen('php://output', 'w');
foreach ($datos as $fila) {
    fputcsv($output, $fila);
}

fclose($output);
exit();
