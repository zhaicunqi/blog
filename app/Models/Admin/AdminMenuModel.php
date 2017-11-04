<?php
/**
 * Created by PhpStorm.
 * User: zhaicunqi
 * Date: 2017/10/23
 * Time: 16:56
 */

namespace App\Models\Admin;

class AdminMenuModel extends AppModel
{
    protected $table = 'admin_menu';

    /**
     * @param array $where
     * @param array $order
     * @param int   $perpage
     *
     * @return array
     */
    public function getList($where=[], $order=[], $perpage=10)
    {
        $query = new self;

        if(isset($where['id']) && $where['id']) {
            $query = $query->where('id', $where['id']);
        }
        if(isset($where['name']) && $where['name']) {
            $query = $query->where('name', $where['name']);
        }
        if(isset($where['display']) && $where['display']) {
            $query = $query->where('display', $where['display']);
        }

        if($perpage) {
            $query = $query->paginate($perpage);
        } else {
            $query = $query->get();
        }

        return $query ? $query->toArray() : [];
    }

    public function getInfo($id){
        $data =  $this->find($id);
        return $data ? $data->toArray() : [];
    }

    /**
     * @param $row
     *
     * @return int
     */
    public function saveInfo($row) {
        if(isset($row['id']) && $row['id']) {
            $id = $row['id'];
            unset($row['id']);
            $this->where(['id' =>$id])->update($row);
        }else {
            $row['created_at'] = date('Y-m-d H:i:s');
            $id =  $this->insertGetId($row);
        }

        return $id;
    }

    /**
     * @param $id
     *
     * @return bool|mixed|null
     */
    public function deleteRow($id)
    {
        return $this->find($id)->delete();
    }
}