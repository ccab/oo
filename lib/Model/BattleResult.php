<?php

class BattleResult
{
    private $winningShip;
    
    private $losingShip;
    
    private $usedJediPowers;

    public function __construct(AbstractShip $winningShip, AbstractShip $losingShip, $usedJediPowers)
    {
        $this->winningShip = $winningShip;
        $this->losingShip = $losingShip;
        $this->usedJediPowers = $usedJediPowers;
    }

    /**
     * @return Ship
     */
    public function getWinningShip()
    {
        return $this->winningShip;
    }

    /**
     * @return Ship
     */
    public function getLosingShip()
    {
        return $this->losingShip;
    }

    /**
     * @return mixed
     */
    public function wereJediPowersUsed()
    {
        return $this->usedJediPowers;
    }

    public function isThereAWinner()
    {
        return $this->winningShip !== null;
    }

}