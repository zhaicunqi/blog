<?php
/**
 * Created by PhpStorm.
 * User: zhaicunqi
 * Date: 2017/10/23
 * Time: 16:49
 */

namespace App\Http\Controllers\Admin;

use Core\Repository\Admin\AdminMenuRepository;

class IndexController extends BaseController
{
    protected $adminMenuRepository;
    public function __construct(
        AdminMenuRepository $adminMenuRepository
    )
    {
        parent::__construct();
        $this->adminMenuRepository = $adminMenuRepository;
    }

    public function index()
    {
        return view("admin.index.index");
    }
}