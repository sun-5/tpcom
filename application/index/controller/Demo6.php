<?php

namespace app\index\Controller;
use think\Controller;
use think\facade\View; 
class Demo6 extends Controller{
    public function test(){
     $content = '<h3 style="color:blue">php中文网</h3>';
     //   return $this->display($content);
        // return $this->view->display($content); 常用
        return View::display($content);//静态代理
    }
     # 使用视图将数据进行输出fetch()
     public function test2(){
        # 模板变量赋值：assign()
        //1.普通变量
        $this->view->assign('name','Peter');
        $this->view->assign('age',28);
        //批量赋值
        $this->view->assign([
            'sex'=>'男',
            'salary'=>6666
        ]);
        //2. array
        $this->view->assign('goods',[
            'id'=>1,
            'name'=>'手机',
            'model'=>'meta10',
            'price'=>9999
        ]);
        //3.对象
        $obj = new \stdClass();//全局访问加\标准模式生成对象
        $obj->col='red';
        $obj->le='hong';
        $this->view->assign('info',$obj);
        //4.常量 const
        define('SITE_NAME','php中文网');
        //在模板中输出数据
        //模板默认目录位于当前模板的view目录，模板文件默认位于以当前控制命名的目录中
        return $this->view->fetch();

    }
    public function test3(){
        $data = \app\index\model\Student::all();//获取student表所有数据
        $this->view->assign('data',$data);
        return $this->view->fetch();//渲染到模板页面
    }
    public function test4(){
        //获取分页要调用查询类中的paginate(num)方法
        //每页10条
        $data = \app\index\model\Student::paginate(10); 
        $this->view->assign('data',$data);
        return $this->view->fetch(); 
    }


}



?>