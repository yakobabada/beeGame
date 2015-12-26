<?php

/**
 * Description of BeeModel
 *
 * @author yakob
 */
class BeeModel {

    protected $sessionName = 'Bees';

    protected $beesList = array();

    /**
     * Create bees
     *
     * @param string $type   type of bee
     * @param int    $amount amout of bees need to create
     *
     * @return array bees
     */
    public function createBees($type, $amount)
    {
        $bees = array();

        for ($i = 0; $i < $amount; $i++) {
            $bees[] = new $type();
        }

        return $bees;
    }

    /**
     * Create bees list
     *
     * @return array bees list with different type
     */
    public function createBeesList()
    {
        $queenList  = $this->createBees(QueenBee::NAME, AMOUNT_OF_QUEENS);
        $workerList = $this->createBees(WorkerBee::NAME, AMOUNT_OF_WORKERS);
        $droneList  = $this->createBees(DroneBee::NAME, AMOUNT_OF_DRONES);
        $this->beesList = array_merge($queenList, $workerList, $droneList);
        return $this->beesList;
    }

    /**
     * Create bees list
     *
     * @param array $beesList bees list with different type
     */
    public function saveBeesInSession($beesList)
    {
        session_start();
        $_SESSION[$this->sessionName] = $beesList;
    }

    /**
     * get bees list
     *
     * @return array bees list with different type
     */
    public function getBeesList()
    {
        if (empty($this->beesList)) {
            session_start();
            if (isset($_SESSION[$this->sessionName])) {
                $this->beesList = $_SESSION[$this->sessionName];
            }
        }

        return $this->beesList;
    }

    /**
     * Get random live Bee
     *
     * @return int random live bee id
     */
    public function getRandomLiveBee()
    {
        $beesList = $this->getBeesList();
        $liveBeesList = array();
        
        //Fills live bee list
        foreach ($beesList as $key => $bee) {
            if ($bee->getLifeSpan() > 0) {
                $liveBeesList[] = $key;
            }
        }

        return $liveBeesList[array_rand($liveBeesList, 1)];
    }

    /**
     * hit bee
     *
     * @param BeeInterface $bee bee
     *
     * @return BeeInterface bee
     */
    public function hitBee($bee)
    {
        $bee->hit();
        return $bee;
    }

    /**
     * Check if bee list is empty
     *
     * @return boolean status of bee list
     */
    public function isBeeListExist()
    {
       if (!empty($this->getBeesList())) {
           return true;
       }

       return false;
    }

    /**
     * Check if the queen is a live
     *
     * @return boolean status of bee list
     */
    public function isQueenALive()
    {
        $beeList = $this->getBeesList();

        foreach ($beeList as $bee) {
            if ($bee->getBeeType() == QueenBee::NAME && $bee->getLifeSpan() > 0) {
                return true;
            }
        }

        return false;
    }
}
