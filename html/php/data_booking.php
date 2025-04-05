<?php
class data_booking
{
    private int $id;
    private string $datetime;
    private string $amount;
    private string $name;
    private string $phone;
    private string $email;
    private bool $accepted;

    public function __construct(int $id, string $datetime, string $amount, string $name, string $phone, string $email, bool $accepted) {
        $this->id = $id;
        $this->datetime = $datetime;
        $this->amount = $amount;
        $this->name = $name;
        $this->phone = $phone;
        $this->email = $email;
        $this->accepted = $accepted;
    }

    public function get_id() : int {
        return $this->id;
    }
    public function get_datetime() : string {
        return $this->datetime;
    }
    public function get_amount() : string {
        return $this->amount;
    }
    public function get_name() : string {
        return $this->name;
    }
    public function get_phone() : string {
        return $this->phone;
    }
    public function get_email() : string {
        return $this->email;
    }
    public function is_accepted() : bool {
        return $this->accepted;
    }
}

