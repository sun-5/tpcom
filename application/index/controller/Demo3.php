<?php

namespace app\index\Controller;
use think\Db;

/*
连接数据库
1.全局配置：config/database.php
2.动态配置：think\db\Query.php中有一个方法：connect()
3.DSN连接：数据库类型://用户名:密码@数据库地址:端口号/数据库名称#字符集
*/
class Demo3{
   //全局配置
    public function conn1(){
       return  Db::table('student')
       ->where('id',1)
       ->value('name');
    } 
    //动态配置
    public function conn2(){
      return Db::connect([
      'type'=>'mysql',
      'hostname'=>'127.0.0.1',
      'database'=>'tpcom0',
      'username'=>'tpcom0',
      'password'=>'tpcom0'
      ])
      ->table('student')
      ->where('id',2)
      ->value('name');
  }
      //DSN连接：
      public function conn3(){
         $dsn = 'mysql://tpcom0:tpcom0@127.0.0.1:3306/tpcom0#utf8';
         return  Db::table('student')
        ->where('id',3)
        ->value('name');
     }
}



?>