<?php
/**
 * BankDetail Resource Model
 * @auther: Chandan Bhanopa
 * @version:1.0
 * @email: chandanbhanopa@gmail.com
 */
namespace Chandan\BankInfo\Model\ResourceModel;
use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

use Magento\Framework\View\Element\UiComponent\DataProvider\SearchResult;


class BankInfo extends AbstractDb {
    
    const BANK_TABLE = "customer_bank_details";
    
    const PRIMERY_KEY = "entity_id";
    
    protected function _construct(){
        $this->_init(self::BANK_TABLE, self::PRIMERY_KEY);
    }
}



