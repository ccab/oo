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
}