<?php

class ShipLoader
{
    private $pdo;

    /**
     * @return Ship[]
     */
    function getShips()
    {
        $shipsData = $this->queryForShips();
        $ships = array();

        foreach ($shipsData as $shipData) {
            $ships[] = $this->createShipFromData($shipData);
        }

        return $ships;
    }

    /**
     * @param $id
     * @return null|Ship
     */
    public function findOneById($id)
    {
        $pdo = $this->getPDO();
        $statement = $pdo->prepare('SELECT * FROM ship WHERE id = :id');
        $statement->execute(['id' => $id]);
        $shipArray = $statement->fetch(PDO::FETCH_ASSOC);

        if (!$shipArray) {
            return null;
        }

        return $this->createShipFromData($shipArray);
    }

    private function queryForShips()
    {
        $pdo = $this->getPDO();
        $statement = $pdo->prepare('SELECT * FROM ship');
        $statement->execute();
        $shipsArray = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $shipsArray;
    }

    /**
     * @param $shipData
     * @return Ship
     */
    private function createShipFromData($shipData)
    {
        $ship = new Ship($shipData['name']);
        $ship->setId($shipData['id']);
        $ship->setWeaponPower($shipData['weapon_power']);
        $ship->setJediFactor($shipData['jedi_factor']);
        $ship->setStrength($shipData['strength']);
        return $ship;
    }

    private function getPDO()
    {
        if ($this->pdo === null) {
            $pdo = new PDO('mysql:host=localhost;dbname=oo_battle', 'root');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $this->pdo = $pdo;
        }

        return $this->pdo;
    }
}