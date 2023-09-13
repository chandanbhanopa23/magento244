<?php
namespace Chandan\BankInfo\Setup\Patch\Data;

use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\App\ResourceConnection;


class BankData implements DataPatchInterface {
    
    /**
     * 
     * @var Magento\Framework\App\ResourceConnection
     */
    protected $resourceConnection;
    
    /**
     * 
     * @var Magento\Framework\Setup\ModuleDataSetupInterface
     */
    protected $moduleDataSetupInterface;
    
    /**
     * 
     * @param ModuleDataSetupInterface $moduleDataSetupInterface
     * @param ResourceConnection $resourceConnection
     */
    public function __construct(
            ModuleDataSetupInterface $moduleDataSetupInterface, 
            ResourceConnection $resourceConnection){
        $this->moduleDataSetupInterface = $moduleDataSetupInterface;
        $this->resourceConnection = $resourceConnection;
        
    }
    
    public static function getDependencies() {
        return [];
    }
    /**
     * Get aliases (previous names) for the patch.
     *

     * @return string[]
     */
    public function getAliases(){
        return [];
    }

    /**
     * Run code inside patch
     * If code fails, patch must be reverted, in case when we are speaking about schema - then under revert
     * means run PatchInterface::revert()
     *
     * If we speak about data, under revert means: $transaction->rollback()
     *
     * @return $this
     */
    public function apply():self {
        $connection = $this->resourceConnection->getConnection();
        $data = [
            [
                'customer_id'=>1,
                'bank_name'=>'State Bank of India',
                'bank_code'=>'29',
                'bank_branch'=>'Palasia',
                'bank_ifsc_code'=>'SBIN0029',
                'status'=>1
            ],
            [
                'customer_id'=>1,
                'bank_name'=>'HDFC BANK',
                'bank_code'=>'01',
                'bank_branch'=>'Vijay Nagar',
                'bank_ifsc_code'=>'HDFCB0001',
                'status'=>1
            ],
            [
                'customer_id'=>1,
                'bank_name'=>'IDBI BANK',
                'bank_code'=>'443',
                'bank_branch'=>'Vijay Nagar',
                'bank_ifsc_code'=>'IDBI00443',
                'status'=>1
            ]
        ];
        
        $connection->insertMultiple('customer_bank_details', $data);
        return $this;
        
    }

    
}