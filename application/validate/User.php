<?php

// 用户信息字段验证器
namespace app\validate;
use think\Validate;

class User extends Validate{
    //当前验证规则
    protected $rule = [
        'name|姓名'=>[
            'require',
            'min'=>2,
            'max'=>20,
        ],
        'sex|性别'=>[
            'require'
        ],
        'age|年龄'=>[
            'require',
            'min'=>2,
            'max'=>5,
            'alphaNum'
        ]
    ];


}


?>
