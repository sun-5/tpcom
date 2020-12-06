<?php

namespace app\index\Controller;
use think\Controller;
use think\facade\View; 

class Demo7 extends Controller{
    public function test(){
      return $this->view->fetch();
    }
    //模板继承
    public function test2(){
        return $this->view->fetch();
    }
 


}



?>