<?php

class RebelShip extends AbstractShip
{
    public function getType()
    {
        return 'Rebel';
    }

    public function isFunctional()
    {
        return true;
    }

    public function getNameAndSpecs($useShortFormat = false)
    {
        return parent::getNameAndSpecs($useShortFormat).' (Rebel)';
    }

    public function getJediFactor() {
        return rand(10, 30);
    }
}