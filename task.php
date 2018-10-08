<?php

require_once 'Send.php';

class Task
{



   public static function add_task($text, $id, $task_type_obj, $date, $resp){

 //Собираем массив для создания задачи

    $request=[ "element_id"	=> $id,
        "element_type"	=> $task_type_obj,
        'complete_till' => $date,
        "task_type"		=> 3,
        "text"			=> $text,
       "responsible_user_id" => $resp];
        $send=new Send;
        $dataname['add'][]=$request;
        $id_task = $send->post('tasks', $dataname);


}

//Собираем массив для завершения задачи

    public static function update_task($text, $id){

        $date=mktime();
        $request=[ "id"	=> $id,
            'updated_at' => $date,
            "text"			=> $text,
            "is_completed"			=> "1",];

        $send=new Send;
        $dataname['update'][]=$request;
            var_dump($dataname);
        $id_task = $send->post('tasks', $dataname);


    }

}



