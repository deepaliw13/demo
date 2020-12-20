<?php
namespace Demo\News\Block\Adminhtml;

class News extends \Magento\Backend\Block\Widget\Grid\Container
{
    /**
     * Constructor
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_controller = 'adminhtml_News';
        $this->_blockGroup = 'Demo_News';
        $this->_headerText = __('News Form');
        $this->_addButtonLabel = __('Add New Form');
        parent::_construct();
         if ($this->_isAllowedAction('Demo_News::save')) {
             $this->buttonList->update('add', 'label', __('Add New Form'));
         } else {
            $this->buttonList->remove('add');
        }
    }

    /**
     * Check permission for passed action
     *
     * @param string $resourceId
     * @return bool
     */
    protected function _isAllowedAction($resourceId)
    {
        return $this->_authorization->isAllowed($resourceId);
    }
}

?>