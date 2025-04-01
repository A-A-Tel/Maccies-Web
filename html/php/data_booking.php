<?php
class data_booking
{
    private string $date;
    private string $amount;
    private string $name;
    private string $phone;
    private string $email;

    public function __construct(string $date, string $amount, string $name, string $phone, string $email) {
        $this->date = $date;
        $this->amount = $amount;
        $this->name = $name;
        $this->phone = $phone;
        $this->email = $email;
    }

    public function getDate() : string {
        return $this->date;
    }
    public function getAmount() : string {
        return $this->amount;
    }
    public function getName() : string {
        return $this->name;
    }
    public function getPhone() : string {
        return $this->phone;
    }
    public function getEmail() : string {
        return $this->email;
    }
}