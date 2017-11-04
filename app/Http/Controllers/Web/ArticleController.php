<?php
/**
 * Created by PhpStorm.
 * User: zhaicunqi
 * Date: 2017/10/23
 * Time: 16:49
 */

namespace App\Http\Controllers\Web;

use Core\Repository\Admin\ArticleRepository;
use Core\Repository\Admin\CateRepository;

class ArticleController extends BaseController
{
    public function __construct(
        ArticleRepository $articleRepository,
        CateRepository $cateRepository
    )
    {
        parent::__construct();
        $this->articleRepository = $articleRepository;
        $this->cateRepository = $cateRepository;
    }

    public function index($id)
    {
        // 文章列表
        $item = $this->articleRepository->getInfo($id);
        // 分类
        $cateList = $this->cateRepository->getList([],[],0);
        $return = [
            'item' => $item,
            'cateList' => $cateList,
        ];
        return view("web.article.index", $return);
    }
}