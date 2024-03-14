<?php

namespace App\Dao;

require_once __DIR__ . '/../utils/Database.php';
require_once __DIR__ . '/../models/Receipt.php';

use App\Utils\Database;

class ReceiptDAO
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    public function insertReceipt(Receipt $receipt)
    {
        $sql = "INSERT INTO receipts (user_id, amount, receipt_date) VALUES (:user_id, :amount, :receipt_date)";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':user_id', $receipt->getUserId(), PDO::PARAM_INT);
        $stmt->bindValue(':amount', $receipt->getAmount(), PDO::PARAM_STR);
        $stmt->bindValue(':receipt_date', $receipt->getReceiptDate(), PDO::PARAM_STR);
        $stmt->execute();

        return $this->db->lastInsertId();
    }

    public function getReceiptById($id)
    {
        $sql = "SELECT * FROM receipts WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($result) {
            return new Receipt($result['id'], $result['user_id'], $result['amount'], $result['receipt_date']);
            return null;
        }
    }

    public function getAllReceipts()
    {
        $sql = "SELECT * FROM receipts";
        $stmt = $this->db->query($sql);

        $receipts = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $receipts[] = new Receipt($row['id'], $row['user_id'], $row['amount'], $row['receipt_date']);
        }

        return $receipts;
    }
}
