<?php

//Подключаем файл с запросом
require_once 'Send.php';

class Create
{

    private $send;
    //Запускаем цепочку функций для создания сущностей и доп. полей к ним
    function __construct($count)
    {
     //   var_dump($count);
        $this->send = new Send;
        $this->add_obj($count);
        $this->add_ms();
        echo "Сущности созданы";
    }
//Добавление сущностей
    public function add_obj($count)
    {
//собираем массив данных для запроса
        $mktime = mktime();
        $date = "$mktime";
        for ($i = 1; $i <= $count; $i++) {
            $request[$i]['name'] = "name {$i}";
            $request[$i]['next_date'] = $date;
        }
        ini_set('max_execution_time', 900);


        foreach (array_chunk($request, 250) as $key => $value) {

        $dataname['add'] = $value;
//var_dump($dataname);
//Добавляем сделки, контакты, покупателей
            $leads = $this->send->post('leads', $dataname);
            $conacts = $this->send->post('contacts', $dataname);
            $customers = $this->send->post('customers', $dataname);
           // var_dump($i);
            //Запускаем функцию для создания компаний и привязки к ней контактов

            $this->link($leads, $conacts, $customers);
        }
    }

    //Функция для создания компаний и привязки к ней контактов
    private function link($id_leads, $id_contacts, $id_customers)
    {
//Узнаем дату и переводим её в строку
        $mktime = mktime();
        $date = "$mktime";

//Генерируем два массива для запросов с разными методами. Добавляем ID контактов и дату изменения.
        foreach ($id_contacts as $key => $val) {
            $request[$key]['contacts_id'] = $val;
            $request2[$key]['id'] = $val;
            $request2[$key]['updated_at'] = $date;

        }
        //Генерируем два массива для запросов с разными методами. Добавляем ID сделок.
        foreach ($id_leads as $key => $val) {
            $request[$key]['leads_id'] = $val;
            $request2[$key]['leads_id'] = $val;
        }
        //Генерируем массив для запроса add. Добавляем имена компаний
        foreach ($id_leads as $key => $val) {
            $request[$key]['name'] = "company {$val}";
        }

        //Генерируем два массива для запросов с разными методами. Добавляем ID покупаетелей.
        foreach ($id_customers as $key => $val) {
            $request[$key]['customers_id'] = $val;
            $request2[$key]['customers_id'] = $val;
        }

        //Добавляем к массивам методы.
        $dataname['add'] = $request;
        $dataname2['update'] = $request2;
       //  var_dump($dataname);
         var_dump($dataname2);

        //Вызываем функции для добавления компаний и связки сущностей между собой
        $this->send->post('contacts', $dataname2);
        $this->send->post('companies', $dataname);

    }


    //Функция для добавления дополнительного поля мультисписок к контактам.
    private function add_ms()
    {

        //Генерируем массив для запроса
        $multiselect =
            [
                'name' => "ms",
                'type' => "5",
                'element_type' => "1",
                'origin' => "1",
                'enums' => ["1", "2", "3", "4", "5", "6", "7", "8", "9", "10"
                ]
            ];

        //Добавляем метод add
        $dataname['add'][] = $multiselect;
        //var_dump($dataname);

        //Вызываем функция для добавления дополнительных полей
        $id_ms = $this->send->post('fields', $dataname);

        //Добавляем элемент для установки случайных значений доп. полям.
        $id_ms = $id_ms['0'];

        //Вызывваем метод для установки случайных значений доп. полям.
        self::value_rand($id_ms);
    }

    // Метод для установки случайных значений доп. полям.
    function value_rand($id_ms)
    {


        $time = mktime();
        $random = range(0, 9);
        $id_contacts = [];


            $path = 'contacts/';
            //Узнаём список всех ID контактов
            $a = $this->send->getlist_id($path);
       // var_dump($a);
//Заполняем массив ID контактов для утсановки доп. полям случайных значений
            if (count($a) > 0) {
                $id_contacts[] = $a;
            }


//Генерируем массив для запроса, используем цикл For для установки каждый раз разных значений.
        $set = count($id_ms);

   //     $custom_field_id=$this->checkfield_id('contacts');
  //      $obj_field_id=$this->checkfield_obj('contacts');
        for ($i = 0; $i < $set; $i++) {

            $contacts = array_shift($id_contacts);


          //  var_dump($id_ms);
            foreach ($contacts as $key => $val) {
                $custom_field_id=$this->checkfield_id('contacts', $id_ms);
                $rand= rand(1,10);
                $send[$key]['id'] = $val;
                $send[$key]['updated_at'] = $time;
                $send[$key]['custom_fields'][0]['id'] = $id_ms;
                $send[$key]['custom_fields'][0]['values'] = array_rand($custom_field_id, $rand);
            }
            $dataname['update'] = $send;
//Вызываем функцию для отправки запроса на установку случайных значений
         //  var_dump($dataname);
            $this->send->post('contacts', $dataname);

        }
    }

    function checkfield_id($type, $id_ms)
    {

        $fields = $this->send->getlist_acc('account?with=custom_fields');
        foreach ($fields['_embedded']['custom_fields'][$type] as $key => $val) {
            if ($val['field_type'] == 5 || $val['id']==$id_ms) {
                $field_id = $fields['_embedded']['custom_fields'][$type][$id_ms]['enums'];
                return $field_id;

            }

        };
    }

}

