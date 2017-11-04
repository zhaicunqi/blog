<?php
/**
 * Created by PhpStorm.
 * User: zhaicunqi
 * Date: 2017/10/1
 * Time: 11:35
 */

namespace Core\RepositoryService\Admin;

use App\Models\Admin\CateModel as Model;

class CateRepositoryService
{
    protected $model;

    /**
     * MenuRepositoryService constructor.
     *
     * @param Model $model
     */
    public function __construct
    (
        Model $model
    )
    {
        $this->model = $model;
    }

    /**
     * @param array $where
     * @param array $order
     * @param int   $perpage
     *
     * @return array
     */
    public function getList($where = [], $order=[], $perpage=0) {
        return $this->model->getList($where, $order, $perpage);
    }

    public function getInfo($id){
        return $this->model->getInfo($id);
    }

    /**
     * @param $row
     *
     * @return int
     */
    public function saveInfo($row) {
        return $this->model->saveInfo($row);
    }

    /**
     * @param $id
     *
     * @return bool|null
     */
    public function deleteRow($id)
    {
        return $this->model->deleteRow($id);
    }
}