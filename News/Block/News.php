<?php
namespace Demo\News\Block;

class News extends \Magento\Framework\View\Element\Template
{
    private $_news;

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Demo\News\Model\News $news,
        \Magento\Framework\App\ResourceConnection $resource,
        array $data = []
    ) {
        $this->_news = $news;
        $this->_resource = $resource;

        parent::__construct(
            $context,
            $data
        );
    }

    public function getNews()
    {
        $collection = $this->_news->getCollection();
        $newsData = $collection->getData();
        foreach ($newsData as $news) {
        	if($news['status'] == 1)
        	{
        		$newsCollection['title'] =  $news['title'];
        		$newsCollection['description'] =  $news['description'];
                $returnData[] = $newsCollection;
            }
        }

        return $returnData;
    }
}