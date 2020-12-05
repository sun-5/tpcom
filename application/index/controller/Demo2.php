<?php

# 正常情况下，控制器不依赖于父类Controller.php
# 推荐继承父类，可以很方便使用父类中的方法和属性
# Controller.php没有静态代理
# 控制器中的输出，字符串全部用return 返回，不要用echo
# 如果输出的复杂类型，可以用dump()函数
# 默认输出格式为html,可以指定为其他格式：json

namespace app\index\controller;
use think\facade\Request;//导入请求对象的静态代理

class Demo2 extends \think\Controller{
   public function test(){
   //创建一个请求对象Request的静态代理 框架内已经写好
        //url上拼接参数
       dump(Request::get());
      
   }
 
}


?>