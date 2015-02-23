<?php class Milka_Referrals_Model_Observer {
    public function __construct()
    {
    }

	function check_subtotal($observer){
	    
		$result = $observer->getCustomer();
		$post = Mage::app()->getRequest()->getPost();
		$customers = Mage::getModel('customer/customer')
				->getCollection()
				->addAttributeToFilter('email', array('like' => $post['email_referer']));
			foreach($customers as $data1)
			{
				$result->setReferralsId($data1->getId()); 
			}
		$result->save();
	}
}