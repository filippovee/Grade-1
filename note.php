<?php

require_once 'Send.php';

class Note
{
    function __construct($text, $id, $type_note, $note_type_obj)
    {
       $this->send = new Send();
       $this->add_note($text, $id, $type_note, $note_type_obj);
    }


    function add_note($text, $id, $type_note, $note_type_obj){

    $request=[ "element_id"	=> $id,
        "element_type"	=> $note_type_obj,
        "note_type"		=> $type_note,
        "text"			=> $text];

    $dataname['add'][]=$request;
    //var_dump($dataname);
    $add = new Send;
    $add->post('notes', $dataname);
    return "Добавлено примечание для элемента {$id}";

}
}




