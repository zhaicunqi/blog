<?php
/**
 * Created by PhpStorm.
 * User: zhaicunqi
 * Date: 2017/10/23
 * Time: 16:56
 */

namespace App\Models\Admin;

class ArticleModel extends AppModel
{
    protected $table = 'article';

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
        $query = $query->select("article.*","cate.name as cate_name");
        $query = $query->leftJoin('cate', 'cate.id', '=', 'article.cate_id');
        if(isset($where['id']) && $where['id']) {
            $query = $query->where('id', $where['id']);
        }
        if(isset($where['title']) && $where['title']) {
            $query = $query->where('title','like', '%'.$where['title'].'%');
        }
        if(isset($where['cate_id']) && $where['cate_id']) {
            $query = $query->where('cate_id', $where['cate_id']);
        }
        if(isset($where['author']) && $where['author']) {
            $query = $query->where('author', $where['author']);
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