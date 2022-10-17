<?php namespace App\classes;

use function Symfony\Component\String\b;

class Character {
    public $name;
    public $race;
    public $realm;
    public $level;
    public $image;
    public $specialization;
    public $playable_class;
    public $average_item_level;
    public $weapons = array();
    public $items = array();
    public $item_level = array();
}
