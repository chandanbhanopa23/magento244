<?php
namespace Chandan\BankInfo\Model\ResourceModel\BankInfo;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Chandan\BankInfo\Model\BankInfo as BankInfoModel;
use Chandan\BankInfo\Model\ResourceModel\BankInfo as BankInfoResourceModel;

class Collection extends AbstractCollection {
    protected function _construct(){
        $this->_init(BankInfoModel::class, BankInfoResourceModel::class);
    }
}
