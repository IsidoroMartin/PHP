<?php
class Hero {
    private $name;
    private $type;
    private $faction;
    private $rarity;
    private $health;
    private $collectible;
    private $playerclass;
    function __construct($name, $type, $faction, $rarity, $health, $collectible, $playerclass) {
        $this->name = $name;
        $this->type = $type;
        $this->faction = $faction;
        $this->rarity = $rarity;
        $this->health = $health;
        $this->collectible = $collectible;
        $this->playerclass = $playerclass;
    }
    function getName() {
        return $this->name;
    }

    function getType() {
        return $this->type;
    }

    function getFaction() {
        return $this->faction;
    }

    function getRarity() {
        return $this->rarity;
    }

    function getHealth() {
        return $this->health;
    }

    function getCollectible() {
        return $this->collectible;
    }

    function getPlayerclass() {
        return $this->playerclass;
    }

    function setName($name) {
        $this->name = $name;
    }

    function setType($type) {
        $this->type = $type;
    }

    function setFaction($faction) {
        $this->faction = $faction;
    }

    function setRarity($rarity) {
        $this->rarity = $rarity;
    }

    function setHealth($health) {
        $this->health = $health;
    }

    function setCollectible($collectible) {
        $this->collectible = $collectible;
    }

    function setPlayerclass($playerclass) {
        $this->playerclass = $playerclass;
    }


    
    
}
