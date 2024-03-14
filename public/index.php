<?php
require_once __DIR__ . '/../src/controllers/ReceiptController.php';
require_once __DIR__ . '/../src/controllers/UserController.php';
require_once __DIR__ . '/../src/dao/UserDAO.php';
require_once __DIR__ . '/../src/dao/ReceiptDAO.php';
require_once __DIR__ . '/../src/models/Receipt.php';
require_once __DIR__ . '/../src/models/User.php';
require_once __DIR__ . '/../vendor/autoload.php';

use App\Controllers\ReceiptController;




// if (class_exists('mikehaertl\pdftk\Pdf')) {
//     echo 'La classe Pdf est disponible.';
// } else {
//     echo 'La classe Pdf n\'est pas disponible';
// }



$request = str_replace('public/', '', $_GET['url'] ?? '/');
$route = explode('/', trim($request, '/'));


switch ($route[0]) {
    case '':
    case 'home':
        require __DIR__ . '/../src/views/home.php';
        break;
    case 'formParticulier':
        include __DIR__ . '/../src/views/formParticulier.php';
        break;
    case 'formEntreprise':
        include __DIR__ . '/../src/views/formEntreprise.php';
        break;
    case 'choixTypeDonateur':
        include __DIR__ . '/../src/views/choixTypeDonateur.php';
        break;
    case 'submitDonation':
        $controller = new ReceiptController();
        $controller->handleRequest();
        break;

    default:
        http_response_code(404);
        echo "404 Not Found";
        break;
}

echo "URL demandée : " . $request;
