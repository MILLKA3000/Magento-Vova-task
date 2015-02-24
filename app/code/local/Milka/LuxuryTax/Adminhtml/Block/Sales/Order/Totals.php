<?php class Milka_LuxuryTax_Adminhtml_Block_Sales_Order_Totals extends Mage_Adminhtml_Block_Sales_Order_Totals
{

    protected function _initTotals()
    {
        parent::_initTotals();
        $amount = 10;
        if ($amount) {
            $this->addTotalBefore(new Varien_Object(array(
                'code'      => 'luxurytax',
                'value'     => $amount,
                'base_value'=> $amount,
                'label'     => $this->helper('luxurytax')->__('Luxury Tax'),
            ), array('shipping', 'tax')));
        }

        return $this;
    }

}