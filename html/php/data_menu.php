<?php

class data_menu {
    private $id;
    private $name;
    private $description;
    private $price;

    public function __construct($id, $name, $description, $price) {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
    }

    public function get_id() : string {
        return $this->id;
    }

    public function get_name() : string {
        return $this->name;
    }

    public function get_description() : string {
        return $this->description;
    }

    public function get_price() : string {
        return $this->price;
    }
}