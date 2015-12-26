<?php

/**
 * Description of BeeGameController
 *
 * @author yakob
 */
class BeeGameController {

    public function indexAction() {
        new View('bee_game/index.php', array());
    }

    public function startAction() {
        $beeModel = new BeeModel();

        $beesList = $beeModel->createBeesList();
        $beeModel->saveBeesInSession($beesList);

        header("location:play");
    }

    public function playAction() {
        $beeModel = new BeeModel();

        //check if list of bee loaded
        if (!$beeModel->isBeeListExist()) {
            header("location:/");
        }

        $beesList = $beeModel->getBeesList();
        $randomBeeId = -1;
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $randomBeeId = $beeModel->getRandomLiveBee();
            
            //Hit the random bee and update beesList
            $randomBee = $beeModel->hitBee($beesList[$randomBeeId]);
            $beesList[$randomBeeId] = $randomBee;
            $beeModel->saveBeesInSession($beesList);
            
            //If the queen dies then start a new round
            if (!$beeModel->isQueenALive()) {
                header("location:start");
            }
            
        }

        new View('bee_game/play.php', array('beesList' => $beesList, 'randomBeeId' => $randomBeeId));
    }
    
    public function endAction() {
        new View('bee_game/end.php', array());
    }

}
