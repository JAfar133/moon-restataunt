<?php

namespace App\Models;

class MenuItem {
    public $id;
    public $category;
    public $name;
    public $grams;
    public $price;

    public function __construct($id,$category, $name, $grams, $price) {
        $this->category = $category;
        $this->name = $name;
        $this->grams = $grams;
        $this->price = $price;
        $this->id = $id;
    }
}
