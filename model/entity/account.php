<?php

class Account
{
    protected int $id;
    protected float $amount;
    protected string $opening_date;
    protected string $account_type;
    protected int $user_id;

    // --

    public function setId(int $id):self {
        $this->id = $id;
        return $this;
    }
    public function getId() {
        return $this->id;
    }

    public function setAmount(float $amount):self {
        $this->amount = $amount;
        return $this;
    }
    public function getAmount() {
        return $this->amount;
    }

    public function setOpening_date(string $opening_date):self {
        $this->opening_date = $opening_date;
        return $this;
    }
    public function getOpening_date() {
        return $this->opening_date;
    }

    public function setAccount_type(string $account_type):self {
        $this->account_type = $account_type;
        return $this;
    }
    public function getAccount_type() {
        return $this->account_type;
    }

    public function setUser_id(int $user_id):self {
        $this->user_id = $user_id;
        return $this;
    }
    public function getUser_id() {
        return $this->user_id;
    }

    private function hydrate(array $data) {
        foreach ($data as $key => $value) {
            $method = "set" . ucfirst($key);
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    public function __construct(array $data = null) {
        if ($data) {
            $this->hydrate($data);
        }
    } 

}