<?php

class Receipt
{
    private $id;
    private $userId;
    private $amount;
    private $receiptDate;

    public function __construct($id, $userId, $amount, $receiptDate)
    {
        $this->id = $id;
        $this->userId = $userId;
        $this->amount = $amount;
        $this->receiptDate = $receiptDate;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getUserId()
    {
        return $this->userId;
    }

    public function getAmount()
    {
        return $this->amount;
    }

    public function getReceiptDate()
    {
        return $this->receiptDate;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setUserId($userId)
    {
        $this->userId = $userId;
    }

    public function setAmount($amount)
    {
        $this->amount = $amount;
    }

    public function setReceiptDate($receiptDate)
    {
        $this->receiptDate = $receiptDate;
    }
}
