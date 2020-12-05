<?php

namespace app\index\Controller;
use think\Db;
use app\index\model\Student;//用户自定义模型，返回的始终是对象

class Demo5{
    public function get(){
     dump(Student::get(12));
        //用查询构造器创建更加复杂的查询
       $res= Student::field('id,name,email')
        ->where('id',10)
        ->find();
        dump($res);
    }
    public function all(){
       //  dump(Student::all());
       //dump(Student::all([10,11,12]));
       $res= Student::field('id as 编号,name as 姓名,email')
       ->where('id','in','15,16,17')
       ->select();
       dump($res);
    
    }

}






?>