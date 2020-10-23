<?php

Class User {

    protected int $id;
    protected string $lastname;
    protected string $firstname;
    protected string $email;
    protected int $city;
    protected int $city_code;
    protected string $adress;
    protected string $sex;
    protected string $password;
    protected string $birth_date;

    const SEX = ["f","h"];

    // --

    public function setId(int $id):self {
        $this->id = $id;
        return $this;
    }
    public function getId() {
        return $this->id;
    }

    public function setLastname(string $lastname):self {
        $this->lastname = $lastname;
        return $this;
    }
    public function getLastname() {
        return $this->lastname;
    }

    public function setEmail(string $email):self {
        $this->email = $email;
        return $this;
    }
    public function getEmail() {
        return $this->email;
    }

    public function setCity(string $City):self {
        $this->city = $city;
        return $this;
    }
    public function getCity() {
        return $this->city;
    }

    public function setCity_code():self {
        $this->city_code = $city_code;
        return $this;
    }
    public function getCity_code() {
        return- $this->city_code;
    }

    public function setAdress(string $adress):self {
        $this->adress = $adress;
        return $this;
    }
    public function getAdress() {
        return $this->adress;
    }

    public function setSex(string $sex):self {
        if (in_array($sex, self::SEX)) {
            $this->sex = $sex;
        }
        return $this;
    }
    public function getSex() {
        return $this->sex;
    }

    public function setPassword(string $password):self {
        $this->password = $password;
        return $this;
    }
    public function getPassword() {
        return $this->password;
    }

    public function setBirth_date(string $birth_date):self {
        $this->birth_date = $birth_date;
        return $this;
    }
    public function getBirth_date() {
        return $this->birth_date;
    }

    private function hydrate(array $data) {
        foreach ($data as $key => $value) {
            $method = "set" . ucfirst($key);
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    public function __construct(array $data) {
        $this->hydrate($data);
    }
}