<?php
namespace Demo\News\Model\ResourceModel;

/**
* News Resource Model
*/
class News extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
/**
* Initialize resource model
*
* @return void
*/
protected function _construct()
{
$this->_init('demo_news', 'news_id');
}
}

?>