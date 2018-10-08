<?php

require_once 'Send.php';

class Field
{
    private $send;

    function __construct($text, $id, $type_obj, $name)
    {
        $this->send = new Send;
        $this->rout($text, $id, $type_obj, $name);
    }

    private function rout($text, $id, $type_obj, $name)
    {
        $type = self::type_gen($type_obj);
        $field_id = self::checkfield($type);
        if ($field_id != NULL) {
            self::add_field($text, $field_id, $id, $type);
        }else{
            self::create_field($name, $type_obj);
            var_dump($name);
            self::add_field($text, $field_id, $id, $type);
        }
    }


    function checkfield($type)
    {

        $fields = $this->send->getlist_acc('account?with=custom_fields');
        foreach ($fields['_embedded']['custom_fields'][$type] as $key => $val) {
            if ($val['field_type'] == 1) {
                $field_id = $val['id'];
                return $field_id;

            }

        };
    }




    function add_field($text, $field_id, $id, $type)
    {

        $time = mktime();

        $arr = [
            'id' => $id,
            'updated_at' => $time,
            'custom_fields' => [
                ['id' => $field_id,
                    'values' => [
                        ['value' => $text]]]
            ]

        ];
        $dataname['update'][] = $arr;

        $add = new Send;

        $add->post($type, $dataname);
    }


    function create_field($name, $type_obj){
        $arr=[ "name"	=> $name,
            "type"	=> "1",
            "element_type"=> $type_obj,
            "origin"=> "111"
        ];

        $dataname['add'][]=$arr;

        $add = new Send();

        $text_field = $add->post('fields', $dataname);
        $field_id = $text_field['0'];

        return $field_id;

    }



    function type_gen($type_obj)
    {
        switch ($type_obj) {
            case '1':
                return 'contacts';
                break;
            case '2':
                return 'leads';
                break;
            case '3':
                return 'companies';
                break;
            case '12':
                return 'customers';
                break;


        }
    }
}



