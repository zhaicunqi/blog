<?php
/**
 * Created by PhpStorm.
 * User: zhaicunqi
 * Date: 2017/10/23
 * Time: 17:06
 */

namespace Core\Repository\Admin;

use Core\RepositoryService\Admin\CateRepositoryService as Service;

class CateRepository
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
        $menuList = $this->service->getList($where, $order, $perpage);
        $menuList = $this->_dealMenuList($menuList);
        return $menuList;
    }

    /**
     * 无限级分类格式
     *
     * @param     $menuList
     * @param int $parent_id
     *
     * @return array
     * @internal param $pid
     */
    private function _dealMenuList($menuList, $parent_id = 0)
    {
        $tmpMenu = [];
        if($menuList){
            foreach($menuList as $key => $menu){
                if($menu['parent_id'] == $parent_id){
                    $menu['child'] = $this->_dealMenuList($menuList, $menu['id']);
                    $tmpMenu[] = $menu;
                }
            }
        }
        $tmpMenu = $this->_sortArray($tmpMenu, 'sort');
        return $tmpMenu;
    }

    /**
     * 菜单排序
     *
     * @param $data
     * @param $key
     *
     * @return mixed
     */
    private function _sortArray($data, $key){
        if(is_array($data) && $data){
            $keyArr = [];
            foreach($data as $k=>$v){
                $keyArr[] = isset($v[$key]) ? $v[$key] : 0;
            }
            array_multisort($keyArr,SORT_ASC,SORT_NUMERIC,$data);
        }
        return $data;
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