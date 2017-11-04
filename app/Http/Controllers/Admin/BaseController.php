<?php
/**
 * Created by PhpStorm.
 * User: zhaicunqi
 * Date: 2017/10/23
 * Time: 16:49
 */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class BaseController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
}