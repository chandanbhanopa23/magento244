<?php

namespace Chandan\BankInfo\Model\Config\Source;
use Magento\Framework\Option\ArrayInterface;
use Magento\Customer\Model\CustomerFactory;
 
class CustomerList implements ArrayInterface
{
    
    private $customerFactory;
    public function __construct(
        CustomerFactory $customerFactory
    ) {
        $this->customerFactory = $customerFactory;
    }
    
    /**
     * @inheritDoc
     */
    public function toOptionArray() 
    {
        $customerFactory = $this->customerFactory->create()->getCollection();
        $options = [];
//        $connection = $this->_resource->getConnection('core_read');
//        $select  = $connection->select()
//                    ->from('jde_sales_cat4', array('*'))
//                       ;
//        
//        $cat4Data = $connection->fetchAll($select);
//       
        $options[] = array("label" => "Select Customer","value" => "");
//        
        foreach($customerFactory as $customer){
            $customerId = $customer->getData('entity_id');
            $customerName = $customer->getData('firstname'). " ". $customer->getData('lastname');;
            $options[] = [
                        "label" =>$customerName,
                         "value" => $customerId
                         ];
        }
        return $options;
    }
}