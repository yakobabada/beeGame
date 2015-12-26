<?php
/**
 * Description of BeeAbstract
 *
 * @author yakob
 */
class BeeAbstract implements BeeInterface {
    
    protected $lifeSpan;
    
    public function __construct() {
        $this->setLifeSpan(static::DEFAULT_LIFE_SPAN);
    }

    /**
     * {@inheritdoc}
     */
    public function hit()
    {
        $this->setLifeSpan($this->getLifeSpan() - static::DECREASE_LIFE_SPAN);
    }
    
    /**
     * {@inheritdoc}
     */    
    public function getLifeSpan()
    {
        return $this->lifeSpan;
    }

    /**
     * Set life span
     *
     * @param int $lifeSpan
     */    
    protected function setLifeSpan($lifeSpan)
    {
        $this->lifeSpan = $lifeSpan;
    }
 
    /**
     * {@inheritdoc}
     */     
    public function getBeeType()
    {
        return static::NAME;
    }
}
