<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /***
     * 展示后台的首页
     */
    public function index(){
        return view('admin/index');
    }
}
