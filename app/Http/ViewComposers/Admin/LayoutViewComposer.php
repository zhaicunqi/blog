<?php
/**
 * 后台模板视图组件
 */

namespace App\Http\ViewComposers\Admin;

use Illuminate\Contracts\View\View;
use Core\Repository\Admin\AdminMenuRepository;

class LayoutViewComposer
{
    private $adminMenuRepository;

    /**
     * LayoutViewComposer constructor.
     * @internal param AdminMenuRepository $adminMenuRepository
     *
     * @param AdminMenuRepository $adminMenuRepository
     */
    public function __construct(
        AdminMenuRepository $adminMenuRepository
    )
    {
        $this->adminMenuRepository = $adminMenuRepository;
    }

    /**
     * @param View $view
     */
    public function compose(View $view)
    {
        $view->with('admin_menu',$this->adminMenuRepository->getList(['display'=>1]));
    }
}