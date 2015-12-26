<?php
/**
 * Description of WorkerBee
 *
 * @author yakob
 */
class WorkerBee extends BeeAbstract {

    /**
     * Amout of hit points loosing when it's hit
     */
    const DECREASE_LIFE_SPAN = 10;

    /**
     * Type of bee
     */    
    const NAME = 'WorkerBee';
    
    /**
     * Default life span
     */      
    const DEFAULT_LIFE_SPAN = 75;
}