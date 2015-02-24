<?php class Milka_LuxuryTax_Helper_Data extends Mage_Core_Helper_Abstract
{
    private $_valuetax;

    private $_moreprice;

    public function __construct()
    {
        $this->_valuetax = Mage::getStoreConfig('luxurytax/taxcheck/value');
        $this->_moreprice = Mage::getStoreConfig('luxurytax/taxcheck/price');
    }

    public function countingluxurytax($items){
        foreach($items as $item){
            if($item->getData('price')>=$this->_moreprice){
                $count_item=+$item->getData('qty');
            }
        }
        return $this->_valuetax*$count_item;
    }
}
