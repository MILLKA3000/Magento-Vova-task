<?php class Milka_LuxuryTax_Model_Creditmemo extends Mage_Sales_Model_Order_Creditmemo_Total_Abstract
{
    public function collect(Mage_Sales_Model_Order_Creditmemo $creditmemo)
    {
        $order = $creditmemo->getOrder();
        $this->amount = 10;
        if ($this->amount) {
            $creditmemo->setGrandTotal($creditmemo->getGrandTotal() + $this->amount);
            $creditmemo->setBaseGrandTotal($creditmemo->getBaseGrandTotal() + $this->amount);
        }

        return $this;
    }
}