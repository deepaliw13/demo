<?php
namespace Demo\News\Block\Adminhtml\News;

/**
 * Adminhtml News grid
 */
class Grid extends \Magento\Backend\Block\Widget\Grid\Extended
{
    /**
     * @var \Demo\News\Model\ResourceModel\News\CollectionFactory
     */
    protected $_collectionFactory;

    /**
     * @var \Demo\News\Model\News
     */
    protected $_news;

    /**
     * @param \Magento\Backend\Block\Template\Context $context
     * @param \Magento\Backend\Helper\Data $backendHelper
     * @param \Demo\News\Model\News $newsPage
     * @param \Demo\News\Model\ResourceModel\News\CollectionFactory $collectionFactory
     * @param \Magento\Core\Model\PageLayout\Config\Builder $pageLayoutBuilder
     * @param array $data
     */
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Backend\Helper\Data $backendHelper,
        \Demo\News\Model\News $news,
        \Demo\News\Model\ResourceModel\News\CollectionFactory $collectionFactory,
        array $data = []
    ) {
        $this->_collectionFactory = $collectionFactory;
        $this->_news = $news;
        parent::__construct($context, $backendHelper, $data);
    }

    /**
     * @return void
     */
    protected function _construct()
    {
        parent::_construct();
        $this->setId('newsGrid');
        $this->setDefaultSort('news_id');
        $this->setDefaultDir('DESC');
        $this->setUseAjax(true);
        $this->setSaveParametersInSession(true);
    }

    /**
     * Prepare collection
     *
     * @return \Magento\Backend\Block\Widget\Grid
     */
    protected function _prepareCollection()
    {
        $collection = $this->_collectionFactory->create();
        /* @var $collection \Demo\News\Model\ResourceModel\News\Collection */
        $this->setCollection($collection);

        return parent::_prepareCollection();
    }

    /**
     * Prepare columns
     *
     * @return \Magento\Backend\Block\Widget\Grid\Extended
     */
    protected function _prepareColumns()
    {
        
        
        $this->addColumn(
            'title', 
            [
                'header' => __('News Title'), 
                'index' => 'title'
            ]
        );

        $this->addColumn(
            'description', 
            [
                'header' => __('Descripton'), 
                'index' => 'description'
            ]
        );

        $this->addColumn(
            'status', 
            [
                'header' => __('Status'), 
                'index' => 'status',
                'type'=>'options',
                'options' => array('1' => 'Enable', '0' => 'Disable')
            ]
        );

        
        
        $this->addColumn(
            'action',
            [
                'header' => __('Action'),
                'type' => 'action',
                'getter' => 'getId',
                'actions' =>[ 
                    [
                        'caption' => __('Edit'),
                        'url' => [
                            'base' => '*/*/edit',
                            'params' => ['store' => $this->getRequest()->getParam('store')]
                        ],
                        'field' => 'news_id'
                    ],
                    [
                        'caption' => __('Delete'),
                        'url' => [
                            'base' => '*/*/delete',
                            'params' => ['store' => $this->getRequest()->getParam('store')]
                        ],
                        'field' => 'news_id'
                    ],
                ],
                    
                'sortable' => false,
                'filter' => false,
                'header_css_class' => 'col-action',
                'column_css_class' => 'col-action'
            ]




        );

        return parent::_prepareColumns();
    }

    /**
     * Row click url
     *
     * @param \Magento\Framework\Object $row
     * @return string
     */
    public function getRowUrl($row)
    {
        return $this->getUrl('*/*/edit', ['news_id' => $row->getId()]);
    }

    /**
     * Get grid url
     *
     * @return string
     */
    public function getGridUrl()
    {
        return $this->getUrl('*/*/grid', ['_current' => true]);
    }

    
}

?>