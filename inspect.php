<?php

require_once 'vendor/autoload.php';

use mikehaertl\pdftk\Pdf;

$pdfPath = './templates/cerfa_16216_01.pdf';

$pdf = new Pdf($pdfPath);
$data = $pdf->getDataFields();

if ($data === false) {
    echo "Error: " . $pdf->getError();
} else {
    echo $data;
    foreach ($data as $field) {
        echo "Field name: " . $field['FieldName'] . "\n";
    }
}
