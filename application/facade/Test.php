<?php
namespace app\facade;
#  用这个facade\Test类代理app\common\Test

class Test extends \think\Facade{
    protected static function getFacadeClass(){
        return 'app\common\Test';
    }
}

?>