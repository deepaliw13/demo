<?php
namespace Demo\News\Api;
 
interface NewsdetailsInterface
{
    /**
     * Returns News Details
     *
     * @api
     * @return array.
     */
    public function getNews();


    /**
     * Returns News by Id
     * @param int $id
     * @api
     * @return array.
     */
    public function getNewsById($id);


}
