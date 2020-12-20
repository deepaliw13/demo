<?php
namespace Demo\News\Model;
use Demo\News\Api\NewsdetailsInterface;
 
class Newsdetails implements NewsdetailsInterface
{
    
    public function __construct(
        \Demo\News\Model\ResourceModel\News\CollectionFactory $collectionFactory,   
    ) {     
        $this->_news = $news;
    }

    /**
     * Returns News Details
     *
     * @api
     * @return array.
     */
    public function getNews()
    {
        $collection = $this->collectionFactory->create();
        $news = array();
        foreach ($collection->getData() as $value) {
            $news["news_id"] = $value["news_id"];
            $news["title"] = $value["title"];
            $newsData[] = $new;
        }

        return $newsData;
    }

    /**
     * Returns News by Id
     * @param int $id
     * @api
     * @return array.
     */
    public function getNewsById($id)
    {
      $collection = $this->_collectionFactory->create()
                      ->addFieldToFilter('news_id', $id);

        return $collection->getData();      


    }

    

}
