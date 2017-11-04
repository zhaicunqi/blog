<?php
/**
 * Created by PhpStorm.
 * User: zhaicunqi
 * Date: 2017/10/23
 * Time: 16:49
 */

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Core\Repository\Admin\CateRepository as Repository;

class CateController extends BaseController
{
    protected $request;
    protected $repository;

    public function __construct(
        Request $request,
        Repository $repository
    )
    {
        parent::__construct();
        $this->request = $request;
        $this->repository = $repository;
    }

    /**
     * @return string
     */
    public function index()
    {

        $list = $this->repository->getList([],[],0);

        $return = [
            'list' => $list,
        ];

        return view('admin.cate.index', $return);
    }

    /**
     * @return string
     */
    public function add($pid=0)
    {
        if($this->request->isMethod('post')){
            $postData = $this->request->input();
            unset($postData['_token']);
            $insertId = $this->repository->saveInfo($postData);
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
            $list = $this->repository->getList([],[],0);
            $return = [
                'list' => $list,
                'pid' => $pid,
            ];
            return view('admin.cate.add', $return);
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
            $id = $this->repository->saveInfo($postData);
            if($id){
                return redirect('/admin/cate');
            }else{
                //todo
            }
        }else{
            $row = $this->repository->getInfo($id);
            $list = $this->repository->getList([],[],0);
            $return = [
                'row' => $row,
                'list' => $list,
            ];
            return view('admin.cate.edit', $return);
        }
    }


    /**
     * @param $id
     *
     * @return string
     */
    public function delete($id)
    {
        $ret = $this->repository->deleteRow($id);
        if($ret){
            $result = ['status'=>true,'msg'=>'操作成功','url'=>'/admin/cate'];
        }else{
            $result = ['status'=>false,'msg'=>'操作失败','url'=>'/admin/cate'];
        }
        return json_encode($result);
    }

    public function toggleDisplay($id, $display)
    {
        $param = [
            'id'      => $id,
            'display' => $display,
        ];
        $id = $this->repository->saveInfo($param);
        if($id){
            $result = ['status'=>true,'msg'=>'操作成功','url'=>'/admin/cate'];
        }else{
            $result = ['status'=>false,'msg'=>'操作失败','url'=>'/admin/cate'];
        }
        return json_encode($result);
    }
}