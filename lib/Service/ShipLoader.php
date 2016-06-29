<?php

class ShipLoader
{
    private $shipStorage;

    public function __construct(PdoShipStorage $shipStorage)
    {
        $this->shipStorage = $shipStorage;
    }


    /**
     * @return AbstractShip[]
     */
    function getShips()
    {
        $shipsData = $this->shipStorage->fetchAllShipsData();

        $ships = array();
        foreach ($shipsData as $shipData) {
            $ships[] = $this->createShipFromData($shipData);
        }

        return $ships;
    }

    /**
     * @param $id
     * @return null|AbstractShip
     */
    public function findOneById($id)
    {
        $shipArray = $this->shipStorage->fetchSingleShipData($id);

        return $this->createShipFromData($shipArray);
    }

    /**
     * @param $shipData
     * @return AbstractShip
     */
    private function createShipFromData($shipData)
    {
        if ($shipData['team'] == 'rebel') {
            $ship = new RebelShip($shipData['name']);
        } else {
            $ship = new Ship($shipData['name']);
            $ship->setJediFactor($shipData['jedi_factor']);
        }

        $ship->setId($shipData['id']);
        $ship->setWeaponPower($shipData['weapon_power']);
        $ship->setStrength($shipData['strength']);
        return $ship;
    }
}