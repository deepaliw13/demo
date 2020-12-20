<?php

namespace Demo\News\Model\ResourceModel\News;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    /**
     * Resource initialization
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Demo\News\Model\News', 'Demo\News\Model\ResourceModel\News');
    }
}

?>