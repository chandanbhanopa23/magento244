<?php
namespace Chandan\BankInfo\Ui\Component\Listing\Column;

use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Ui\Component\Listing\Columns\Column;
use Magento\Framework\Api\SearchCriteriaBuilder;
use Magento\Framework\UrlInterface;

class Actions extends Column {
    
    protected $_searchCriteria;
    protected $_urlBuilder;
    
    public function __construct(
        ContextInterface $context,
        UiComponentFactory $uiComponentFactory,
        SearchCriteriaBuilder $criteria,
        UrlInterface $urlBuilder,    
        array $components = [],
        array $data = []
        )
    {
        $this->_searchCriteria  = $criteria;
        $this->_urlBuilder = $urlBuilder;
        parent::__construct($context, $uiComponentFactory, $components, $data);
    }
 
    public function prepareDataSource(array $dataSource)
    {   
        if (isset($dataSource['data']['items'])) {
            foreach ($dataSource['data']['items'] as & $item) {
                $item[$this->getData('name')]['edit'] = [
                    'href' => $this->_urlBuilder->getUrl('bank/index/edit', ['id' => $item['entity_id']]),
                    'label' => __('Edit'),
                    'hidden' => false
                ];

                 $item[$this->getData('name')]['delete'] = [
                    'href' => $this->_urlBuilder->getUrl('bank/index/delete', ['id' => $item['entity_id']]),
                    'label' => __('Delete'),
                    'hidden' => false
                ];
            }
        }
        return $dataSource;
    }
}