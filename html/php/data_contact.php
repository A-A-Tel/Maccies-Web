<?php

class data_contact
{

    private int $id;
    private string $datetime;
    private string $name;
    private string $email;
    private string $phone;
    private string $message;
    private bool $replied;

    public function __construct(int $id, string $datetime, string $name, string $email, string $phone, string $message, bool $replied)
    {
        $this->id = $id;
        $this->datetime = $datetime;
        $this->name = $name;
        $this->email = $email;
        $this->phone = $phone;
        $this->message = $message;
        $this->replied = $replied;
    }

    public function get_id() : int {
        return $this->id;
    }
    public function get_datetime(): string
    {
        return $this->datetime;
    }
    public function get_name(): string
    {
        return $this->name;
    }
    public function get_email(): string
    {
        return $this->email;
    }
    public function get_phone(): string
    {
        return $this->phone;
    }
    public function get_message(): string
    {
        return $this->message;
    }
    public function is_replied(): bool
    {
        return $this->replied;
    }
}