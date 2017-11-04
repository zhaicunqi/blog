<?php
/**
 * Created by PhpStorm.
 * User: zhaicunqi
 * Date: 2017/10/23
 * Time: 16:49
 */

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Core\Repository\Admin\AdminMenuRepository;

class MenuController extends BaseController
{
    protected $request;
    protected $adminMenuRepository;

    public function __construct(
        Request $request,
        AdminMenuRepository $adminMenuRepository
    )
    {
        parent::__construct();
        $this->request = $request;
        $this->adminMenuRepository = $adminMenuRepository;
    }

    /**
     * @return string
     */
    public function index()
    {

        $menuList = $this->adminMenuRepository->getList([],[],0);

        $return = [
            'menuList' => $menuList,
        ];

        return view('admin.menu.index', $return);
    }

    /**
     * @return string
     */
    public function add($pid=0)
    {
        if($this->request->isMethod('post')){
            $postData = $this->request->input();
            unset($postData['_token']);
            $insertId = $this->adminMenuRepository->saveInfo($postData);
            if($insertId){
                return json_encode([
                    'status' => true,
                    'msg' => '添加成功',
                ]);
            }else{
                return json_encode([
                    'status' => false,
                    'msg' => '添加失败',
                ]);
            }
        }else{
            $menuList = $this->adminMenuRepository->getList([],[],0);
            $return = [
                'menuList' => $menuList,
                'pid' => $pid,
            ];
            return view('admin.menu.add', $return);
        }
    }

    /**
     * @param $id
     *
     * @return string
     */
    public function edit($id)
    {
        if($this->request->isMethod('post')){
            $postData = $this->request->input();
            $postData['id'] = $id;
            unset($postData['_token']);
            $id = $this->adminMenuRepository->saveInfo($postData);
            if($id){
                return redirect('/admin/menu');
            }else{
                //todo
            }
        }else{
            $menuInfo = $this->adminMenuRepository->getInfo($id);
            $menuList = $this->adminMenuRepository->getList([],[],0);
            $return = [
                'menu' => $menuInfo,
                'menuList' => $menuList,
            ];
            return view('admin.menu.edit', $return);
        }
    }

    /**
     * @param $id
     *
     * @return string
     */
    public function delete($id)
    {
        $ret = $this->adminMenuRepository->deleteRow($id);
        if($ret){
            $result = ['status'=>true,'msg'=>'操作成功','url'=>'/admin/menu'];
        }else{
            $result = ['status'=>false,'msg'=>'操作失败','url'=>'/admin/menu'];
        }
        return json_encode($result);
    }

    public function toggleDisplay($id, $display)
    {
        $param = [
            'id'      => $id,
            'display' => $display,
        ];
        $id = $this->adminMenuRepository->saveInfo($param);
        if($id){
            $result = ['status'=>true,'msg'=>'操作成功','url'=>'/admin/menu'];
        }else{
            $result = ['status'=>false,'msg'=>'操作失败','url'=>'/admin/menu'];
        }
        return json_encode($result);
    }
}