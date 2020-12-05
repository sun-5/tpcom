<?php
namespace app\index\controller;
use app\facade\Test;
class Demo1{
    public function getName($name='www'){
        return 'Hello'.$name.'方法名是：'.__METHOD__;

    }
 
 
    public function index($name='Thinkphp'){ //默认方法index()
       // $test = new \app\common\Test();
       // return $test->hello();


        return Test::hello('小红你好啊！');
    }
 
 
}


?>