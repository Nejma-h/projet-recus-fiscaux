<?php

namespace App\Controllers;

use App\Dao\ReceiptDAO;
use App\Dao\UserDAO;
use App\Models\Receipt;
use mikehaertl\pdftk\Pdf;

class ReceiptController
{
    private $receiptDAO;
    private $userDAO;

    public function __construct()
    {
        $this->receiptDAO = new ReceiptDAO();
        $this->userDAO = new UserDAO();
    }

    public function handleRequest()
    {

        var_dump($_POST);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nomDonateur = filter_input(INPUT_POST, 'nomDonateur', FILTER_SANITIZE_STRING);
            $prenomDonateur = filter_input(INPUT_POST, 'prenomDonateur', FILTER_SANITIZE_STRING);
            $adresseDonateur = filter_input(INPUT_POST, 'adresseDonateur', FILTER_SANITIZE_STRING);
            $montantDon = filter_input(INPUT_POST, 'montantDon', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);


            if (!$nomDonateur || !$prenomDonateur || !$montantDon) {
                echo "Erreur: Données manquantes ou invalides.";
                return;
            }

            $dateDon = date('Y-m-d H:i:s');

            $typeDonateur = filter_input(INPUT_POST, 'typeDonateur', FILTER_SANITIZE_STRING);

            // $userId = $this->userDAO->findOrCreateUser($nomDonateur, $prenomDonateur, $adresseDonateur);

            // // Insert receipt into db
            // $receiptId = $this->receiptDAO->insertReceipt(new Receipt(null, $userId, $montantDon));

            // Prepare data for PDF
            $formDataForPdf = [
                'nomDonateur' => $nomDonateur,
                'prenomDonateur' => $prenomDonateur,
                'adresseDonateur' => $adresseDonateur,
                'montantDon' => sprintf("%.2f", $montantDon),
            ];

            $receiptId = 1;

            // Generate PDF
            try {
                $this->generateReceiptPdf($formDataForPdf, $receiptId, $typeDonateur);
            } catch (\Exception $e) {
                error_log($e->getMessage());
                echo "Caught exception: ", $e->getMessage(), "\n";
            }


            echo "Reçu créé avec succès. <a href='/path/to/generated/pdf'>Télécharger le reçu</a>";
        } else {
            echo "Erruer.";
        }
    }



    private function generateReceiptPdf($formData, $receiptId, $isEnterprise)
    {
        $templatePath = $isEnterprise ? __DIR__ . '/../../templates/cerfa_16216_01.pdf' : __DIR__ . '/../../templates/cerfa_11580_05.pdf';
        $outputPath = __DIR__ . '/../../stored_pdfs/receipt_' . $receiptId . '.pdf';


        var_dump($templatePath);
        var_dump($outputPath);

        $pdf = new Pdf($templatePath);
        $result = $pdf->fillForm($formData)
            ->needAppearances()
            ->saveAs($outputPath);


        if (!$result) {
            throw new \Exception("Erreur lors de la génération du PDF: " . $pdf->getError());
        }
    }
}
