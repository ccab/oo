<?php

class RebelShip extends Ship
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
}