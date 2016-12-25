<?php
class Order
{
    private $_params;	

    public function __construct($params)
    {
        $this->_params = $params;		
    }

    public function addOrderAction() {
        $order =  new OrderItem();
        $arr = $order->addOrder();
        return $arr;
    }

    public function getSectionAction()
    {
       $shops =  new ShopsItem();
       $arr = $shops->getSection($_REQUEST['section_id']);

       return $arr;
    }

    public function getProductAction()
    {
		$shops =  new ShopsItem();
		$arr = $shops->getProduct($_REQUEST['product_id']);

		return $arr;
    }

    public function getSubSectionAction()
    {
        $shops =  new ShopsItem();
		$arr = $shops->getSubSectionItem($_REQUEST['section_id']);

		return $arr;
    }

    public function testAction()
    {
       $shops =  new ShopsItem();
	   $arr = $shops->test($_REQUEST['section_id']);

		return $arr;
    }
}
