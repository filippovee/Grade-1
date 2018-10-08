<?php

require_once 'Send.php';

class Task
{
   /* function __construct($text, $id, $task_type_obj, $date)
    {
       $this->send = new Send();
       $this->add_task($text, $id, $task_type_obj, $date);
    }*/


   public static function add_task($text, $id, $task_type_obj, $date){

       /* var_dump($date);
$date=mktime($date);
var_dump($date);*/

    $request=[ "element_id"	=> $id,
        "element_type"	=> $task_type_obj,
        'complete_till' => $date,
        "task_type"		=> 3,
        "text"			=> $text];

        $send=new Send;
        $dataname['add'][]=$request;
  //      var_dump($dataname);
        $id_task = $send->post('tasks', $dataname);
        /*$id_task = $id_task['0'];
        echo "задача добавлена в элемент {$id}</br>";*/


}

    public static function update_task($text, $id){

        /* var_dump($date);
 $date=mktime($date);
 var_dump($date);*/
        $date=mktime();
        $request=[ "id"	=> $id,
            'updated_at' => $date,
            "text"			=> $text,
            "is_completed"			=> "1",];

        $send=new Send;
        $dataname['update'][]=$request;
            var_dump($dataname);
        $id_task = $send->post('tasks', $dataname);
        /*$id_task = $id_task['0'];
        echo "задача добавлена в элемент {$id}</br>";*/


    }

}



