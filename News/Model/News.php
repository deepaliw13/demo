<?php
namespace Demo\News\Model;

/**
 * News Model
 *
 * @method \Demo\News\Model\Resource\Page getResource()
 */
class News extends \Magento\Framework\Model\AbstractModel
{
    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Demo\News\Model\ResourceModel\News');
    }

}
?>