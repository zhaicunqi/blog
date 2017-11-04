<?php
/**
 * Created by PhpStorm.
 * User: zhaicunqi
 * Date: 2017/10/23
 * Time: 16:49
 */

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Core\Repository\Admin\ArticleRepository as Repository;
use Core\Repository\Admin\CateRepository;

class ArticleController extends BaseController
{
    protected $request;
    protected $repository;
    protected $cateRepository;
    private $viewPre = "admin.article.";

    public function __construct(
        Request $request,
        Repository $repository,
        CateRepository $cateRepository
    )
    {
        parent::__construct();
        $this->request = $request;
        $this->repository = $repository;
        $this->cateRepository = $cateRepository;
    }

    /**
     * @return string
     */
    public function index()
    {
        $params = $this->request->input();
        $list = $this->repository->getList($params,[],0);
        $cateList = $this->cateRepository->getList([],[],0);
        $return = [
            'list' => $list,
            'cateList' => $cateList,
            'params' => $params,
        ];

        return view($this->viewPre."index", $return);
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
            $cateList = $this->cateRepository->getList([],[],0);
            $return = [
                'cateList' => $cateList,
            ];
            return view($this->viewPre."add", $return);
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
                return json_encode([
                    'status' => true,
                    'msg' => '保存成功',
                ]);
            }else{
                return json_encode([
                    'status' => false,
                    'msg' => '保存失败',
                ]);
            }
        }else{
            $row = $this->repository->getInfo($id);
            $cateList = $this->cateRepository->getList([],[],0);
            $return = [
                'row' => $row,
                'cateList' => $cateList,
            ];
            return view($this->viewPre."edit", $return);
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
            $result = ['status'=>true,'msg'=>'操作成功','url'=>$this->viewPre];
        }else{
            $result = ['status'=>false,'msg'=>'操作失败','url'=>$this->viewPre];
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
            $result = ['status'=>true,'msg'=>'操作成功','url'=>$this->viewPre];
        }else{
            $result = ['status'=>false,'msg'=>'操作失败','url'=>$this->viewPre];
        }
        return json_encode($result);
    }

    public function content($id){
        $row = $this->repository->getInfo($id);
        $return = [
            'row' => $row,
        ];
        return view($this->viewPre."content", $return);
    }
}