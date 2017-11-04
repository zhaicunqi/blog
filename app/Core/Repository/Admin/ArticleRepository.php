<?php
/**
 * Created by PhpStorm.
 * User: zhaicunqi
 * Date: 2017/10/23
 * Time: 17:06
 */

namespace Core\Repository\Admin;

use Core\RepositoryService\Admin\ArticleRepositoryService as Service;

class ArticleRepository
{
    protected $service;

    /**
     * AdminMenuRepository constructor.
     *
     * @param Service $service
     */
    public function __construct
    (
        Service $service
    )
    {
        $this->service = $service;
    }

    /**
     * 列表
     *
     * @param array $where
     * @param array $order
     * @param int   $perpage
     *
     * @return array
     */
    public function getList($where=[],$order=[],$perpage=0)
    {
        return $this->service->getList($where, $order, $perpage);
    }


    /**
     * @param $id
     *
     * @return array
     */
    public function getInfo($id){
        return $this->service->getInfo($id);
    }

    /**
     * @param $row
     *
     * @return int
     */
    public function saveInfo($row)
    {
        return $this->service->saveInfo($row);
    }

    /**
     * @param $id
     *
     * @return bool|mixed|null
     */
    public function deleteRow($id)
    {
        return $this->service->deleteRow($id);
    }
}