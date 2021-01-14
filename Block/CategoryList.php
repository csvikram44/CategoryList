<?php
namespace CsVikram\CategoryList\Block;

use Magento\Catalog\Model\ResourceModel\Category\CollectionFactory;
use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;

class CategoryList extends Template
{
    protected $_categoryRepository;

    public function __construct(
        Context $context,
        CollectionFactory $categoryRepository,
        $data = []
    ) {
        parent::__construct($context, $data);
        $this->_categoryRepository  = $categoryRepository;
    }

    public function getCategoryCollection()
    {
        $collection = $this->_categoryRepository->create()->addAttributeToSelect('*')->addAttributeToFilter('is_active',1)->setStore($this->_storeManager->getStore());
        return $collection;
    }
}
