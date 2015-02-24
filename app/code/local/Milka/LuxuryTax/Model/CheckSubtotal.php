<?php class Milka_LuxuryTax_Model_CheckSubtotal extends Mage_Sales_Model_Quote_Address_Total_Abstract{

    private $_active;

    private $amount;

    public function __construct()
    {
        $this->_active = Mage::getStoreConfig('luxurytax/taxcheck/yesno');
    }

    public function collect(Mage_Sales_Model_Quote_Address $address)
    {
        if ($this->_active){
            parent::collect($address);
            if (($address->getAddressType() == 'billing')) {
                return $this;
            }

            $this->amount = Mage::helper('luxurytax')->countingluxurytax($address->getAllItems());

            if ($this->amount) {
                $this->_addAmount($this->amount);
                $this->_addBaseAmount($this->amount);
            }

            return $this;
        }
    }

    public function fetch(Mage_Sales_Model_Quote_Address $address)
    {
        if ($this->_active){
            if (($address->getAddressType() == 'billing')) {
                if ($this->amount != 0) {
                    $address->addTotal(array(
                        'code'  => 'luxurytax',
                        'title' => Mage::helper('luxurytax')->__('Luxury Tax'),
                        'value' => $this->amount
                    ));
                }
            }
        }
        return $this;
    }

}
