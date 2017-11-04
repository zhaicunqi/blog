<?php
/**
 * 后台模板视图组件
 */

namespace App\Http\ViewComposers\Web;

use Illuminate\Contracts\View\View;
use Core\Repository\Admin\CateRepository;

class LayoutViewComposer
{
    private $adminMenuRepository;

    /**
     * LayoutViewComposer constructor.
     * @internal param AdminMenuRepository $adminMenuRepository
     *
     * @param CateRepository $cateRepository
     */
    public function __construct(
        CateRepository $cateRepository
    )
    {
        $this->cateRepository = $cateRepository;
    }

    /**
     * @param View $view
     */
    public function compose(View $view)
    {
        // 文章分类
        $view->with('cateList',$this->cateRepository->getList(['display'=>1]));
        // 首页导航
        $view->with('navList',[
            ['name' => '技术文章', 'url' => '/web'],
            ['name' => '随笔', 'url' => '/web/article'],
            ['name' => '生活', 'url' => '/web/article'],
            ['name' => '个人中心', 'url' => '/web/info'],
        ]);
    }
}