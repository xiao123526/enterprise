<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BannerController extends Controller
{
    /**
     * 显示导航栏添加视图
     */
    public function banner(){
          return view('admin/banner/bannerAdd');
    }
    /**
     * 导航栏添加执行
     */
    public function bannerDo(Request $request){
      $banner_name=$request->post('banner_name');
        $banner_url=$request->post('banner_url');
        $is_show=$request->post('is_show');
        $sort=$request->post('sort');
          $data=[
              'banner_name'=>$banner_name,
              'banner_url'=>$banner_url,
              'is_show'=>$is_show,
              'create_time'=>time(),
              'is_del'=>1,
              'sort'=>$sort,
          ];
        $bol=DB::table('banner')->insert($data);
        if($bol){
            $success=[];
            $success['success']=true;
            $success['code']=0000;
            $success['msg']='导航栏添加成功';
            $success['url']='/admin/bannerShow';
            echo json_encode($success);
        }else{
            $success=[];
            $success['success']=false;
            $success['code']=0001;
            $success['msg']='导航栏添加失败';
            $success['url']='/admin/banner';
            echo json_encode($success);
        }
    }
    /**
     * 导航栏列表展示
     */
    public function bannerShow(){
        $where=[
            'is_del'=>1
        ];
        $pageSize=config('app.pageSize');

        $data=DB::table('banner')->where($where)->orderBy('sort','desc')->paginate($pageSize);
        return view('admin/banner/banner',['data'=>$data]);
    }
    /**
     * 删除导航栏
     */
    public function bannerDel(Request $request){
      $banner_id=$request->post('banner_id');
       $bol=DB::table('banner')->where('banner_id',$banner_id)->update(['is_del'=>2]);
        if($bol){
            $success=[];
            $success['success']=true;
            $success['code']=0000;
            $success['msg']='导航栏删除成功';
            $success['url']='/admin/bannerShow';
            echo json_encode($success);
        }else{
            $success=[];
            $success['success']=false;
            $success['code']=0001;
            $success['msg']='导航栏删除失败';
            $success['url']='/admin/bannerShow';
            echo json_encode($success);
        }
    }
    /**
     * 展示修改的视图
     */
    public function bannerUp($id){
     $data=DB::table('banner')->where('banner_id',$id)->first();
        return view('admin/banner/bannerEdit',['data'=>$data]);
    }
    /**
     * 修改执行
     */
    public function editDo(Request $request){
        $banner_id=$request->post('banner_id');
        $banner_name=$request->post('banner_name');
        $banner_url=$request->post('banner_url');
        $is_show=$request->post('is_show');
        $sort=$request->post('sort');
        $data=[
            'banner_name'=>$banner_name,
            'banner_url'=>$banner_url,
            'is_show'=>$is_show,
            'create_time'=>time(),
            'is_del'=>1,
            'sort'=>$sort,
        ];
       $bol=DB::table('banner')->where('banner_id',$banner_id)->update($data);
        if($bol){
            $success=[];
            $success['success']=true;
            $success['code']=0000;
            $success['msg']='导航栏修改成功';
            $success['url']='/admin/bannerShow';
            echo json_encode($success);
        }else{
            $success=[];
            $success['success']=false;
            $success['code']=0001;
            $success['msg']='导航栏修改失败';
            $success['url']='/admin/bannerShow';
            echo json_encode($success);
        }
    }

}
