<?php

namespace app\index\controller;

use think\Controller;
//use app\validate\User;//用户自定义验证器
use app\facade\User; //静态代理
use think\facade\Validate; //静态代理
class Demo8 extends Controller
{
    //1.验证器：使用validate中的rule属性
    public function test()
    {
        //要验证的数据
        $data = [
            'name' => '李白',
            'sex' => '男',
            'age' => '18'
        ];
        //验证器是一个类
        // $validate = new User;
        // if(!$validate->check($data)){
        //     return $validate->getError();
        // }
        //使用当前验证器的静态代理

        if (!User::check($data)) {
            return User::getError();
        }
        return '验证通过';
    }
    public function test2()
    {
        // $this->validate($data,$validate) 返回验证结果
        //要验证的数据
        $data = [
            'name' => '李白',
            'sex' => '男',
            'age' => '18'
        ];
        //验证规则
        $validate = 'app\validate\User';
        $res = $this->validate($data, $validate);
        if (true !== $res) {
            return $res;
        }
        return '验证通过';
    }
    public function test3()
    {
        //当前验证规则
        $rule = [
            'name|姓名' => [
                'require',
                'min' => 2,
                'max' => 20,
            ],
            'sex|性别' => [
                'require'
            ],
            'age|年龄' => [
                'require',
                'min' => 2,
                'max' => 5,
                'alphaNum'
            ]
        ];
        //要验证的数据
        $data = [
            'name' => '李白',
            'sex' => '男',
            'age' => '18'
        ];
        //添加字段的验证规则：初始化rule属性
        Validate::rule($rule);
        //校验 如果不通过输出错误信息
        if(!Validate::check($data)){
            return Validate::getError();
        }
        return '验证通过test3';
    }
 
}
