<?php
/**
 * Bankinfo Model
 * @auther:Chandan Bhanopa
 * @package BankIinfo
 * @since 1.0
 * 
 */
namespace Chandan\BankInfo\Model;

use Magento\Framework\Model\AbstractModel;
use Chandan\BankInfo\Model\ResourceModel\BankInfo as BankInfoResourceMdoel;

class BankInfo extends AbstractModel {
    protected function _construct(){
        $this->_init(BankInfoResourceMdoel::class);
    }
}