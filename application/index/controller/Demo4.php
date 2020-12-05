<?php

namespace app\index\Controller;
use think\Db;

class Demo4{
    //1.单条查询
    public function find(){
        //查询表达式
        $res = DB::table('student')
           // ->field('id,name,age')
           ->field(['id as 编号,name as 姓名,age as 年龄'])
           // ->field(['id'=>'编号','name'=>'姓名','age'=>'年龄']) 正则验证导致汉字出错
          //  ->where('id','=',4)
            ->find(5);
        //[ SQL ] SELECT `id`,`name`,`age` FROM `student` WHERE `id` = 4 LIMIT 1 
        //SELECT id as 编号,name as 姓名,age as 年龄 FROM `student` WHERE `id` = 4 LIMIT 1
        dump(is_null($res)?'没找到':$res);
        }

          //2.多条查询
    public function select(){
        $res = Db::table('student')
        ->field('id,name,email,sex')
        ->where([
            ['age','>=','20'],
            ['sex','=','男']
        ])
        ->select();
        //SELECT `id`,`name`,`email`,`sex` FROM `student` WHERE `age` >= 20 AND `sex` = '男' 
         if(empty($res)){
             return '没有满足的记录';
         }else{
             foreach($res as $row){
                 dump($row);
             }
         }
    }
        
    //3.单条插入
    public function insert(){
        $data = [
        'name'=>'金毛4',
        'email'=>'sw@cn',
        'sex'=>'男',
        'age'=>'16'
        ];
     //return   Db::table('student')->insert($data);
    //   return   Db::table('student')->insert($data,true);
 #return Db::table('student')->data($data)->insert();
 # 插入同时返回新增主键ID 
return Db::table('student')->insertGetId($data);
 // INSERT INTO `student` (`name` , `email` , `sex` , `age`) VALUES ('金毛' , 'sw@cn' , '男' , 16)
//REPLACE INTO `student` (`name` , `email` , `sex` , `age`) VALUES ('金毛2' , 'sw@cn' , '男' , 16)
// INSERT INTO `student` (`name` , `email` , `sex` , `age`) VALUES ('金毛3' , 'sw@cn' , '男' , 16)
}
    //4.多条插入
    public function insertAll(){
        $data = [
         [  'name'=>'杰克3', 'email'=>'sws@cn'   ],
         [ 'name'=>'李白3',  'email'=>'asw@cn'   ]
        ];
      //   return Db::table('student')->insertAll($data);
       return Db::table('student')->data($data)->insertAll();
//INSERT INTO `student` (`name` , `email`) VALUES ( '杰克2','sws@cn' ) , ( '李白2','asw@cn' )
}

    //5.更新操作
    public function update(){
        // return Db::table('student')
        // ->where('id',10)
        // ->update(['name'=>'武松']);
        return Db::table('student')
        ->update(['name'=>'潘金莲','id'=>11]);
        //UPDATE `student` SET `name` = '武松' WHERE `id` = 10
    } 

        //6.删除操作
        public function delete(){
            return Db::table('student')
          //  ->delete(9);
         // ->where(['name'=>'金毛'])
          ->where(['id'=>[3,2]])
            ->delete();
        //DELETE FROM `student` WHERE `id` = 9 
       // DELETE FROM `student` WHERE `id` IN (3,2)
        }
        //7.原生查询 query
      public function query(){
        $sql =" SELECT `id`,`name`,`age` FROM `student` WHERE `id` = 4 LIMIT 1 ";
        dump(Db::query($sql));
          
      }
//8.原生写操作
         public function execute(){
         //   $sql =" UPDATE `student` SET `name` = '小鱼儿' WHERE `id` = 15";
         //   return Db::execute($sql);
            return Db::execute("INSERT INTO `student` (`name` , `email` , `sex` , `age`) VALUES ('松江' , 'sw@cn' , '男' , 30)");
              
          }
}






?>