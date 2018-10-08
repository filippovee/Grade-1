<?php
//Подключаем классы
require_once 'field.php';
require_once 'create.php';
require_once 'note.php';
require_once 'task.php';



$data=$_POST;

$path=$data['path'];
var_dump($_POST);
//в зависимости от полученных из AJAX запроса данных создаём экземпляр нужного класса
switch ($path){
    case 'create':
        $count=$data['value'];
        $create = new Create($count);
        echo 'Done';
        break;
    case 'field':
        $text=$data['val'];
        $id=$data['id'];
        $type_obj=$data['type'];
        $name=$data['name'];
        $field = new Field($text, $id, $type_obj, $name);
        break;
    case 'note':
        $text=$data['val'];
        $id=$data['id'];
        $type_note=$data['type_note'];
        $note_type_obj=$data['note_type_obj'];
        $note = new Note($text, $id, $type_note, $note_type_obj);
        break;
    case 'task':
        $text=$data['val'];
        $id=$data['id'];
        $task_type_obj=$data['task_type_obj'];
        $date=$data['date'];
        $resp=$data['responsible'];
        //$task=new Task();
        Task::add_task($text, $id, $task_type_obj, $date, $resp);
        break;
    case 'upd_task':
        $text=$data['val'];
        $id=$data['id'];
        $date=$data['date'];
        Task::update_task($text, $id);
        break;
}




