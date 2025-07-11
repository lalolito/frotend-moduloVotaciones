<?php

header('Content-Type: text/csv');
header('Content-Disposition: attachment;filename="reporte_general.csv"');

// Simular datos de escrutinio general
$datos = [
    ['Plancha', 'Votación', 'Total de Votos'],
    ['Plancha Verde', 'Consejo Académico', 150],
    ['Plancha Renovación', 'Representante Estudiantil', 220],
    ['Plancha Justicia', 'Consejo de Facultad', 180]
];

$output = fopen('php://output', 'w');
foreach ($datos as $fila) {
    fputcsv($output, $fila);
}

fclose($output);
exit();
