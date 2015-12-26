<?php

/**
 * Interface for Bee
 *
 * @author yakob
 */
interface BeeInterface {

    /**
     * Hit the bee
     */
    public function hit();
    
    /**
     * get life span
     * 
     * @return int life span
     */      
    public function getLifeSpan();
    
    /**
     * get bee type
     * 
     * @return string bee type
     */       
    public function getBeeType();
}
