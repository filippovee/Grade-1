<?php
//Авторизация
require_once 'link.php';


class Send
{

    //Запрос к API для добавления и изменения сущностей
    function post($path, $dataname)
    {
        $link = "https://efilippovtest.amocrm.ru/api/v2/$path";

        $headers[] = "Accept: application/json";

     //   var_dump($dataname);
       // var_dump($path);
//Curl options
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_USERAGENT, "amoCRM-API-client-
undefined/2.0");
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($dataname));
        curl_setopt($curl, CURLOPT_URL, $link);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_COOKIEFILE, dirname(__FILE__) . "/cookie.txt");
        curl_setopt($curl, CURLOPT_COOKIEJAR, dirname(__FILE__) . "/cookie.txt");
        $out = curl_exec($curl);

        $code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        curl_close($curl);
        $code = (int)$code;
        $errors = array(
            301 => 'Moved permanently',
            400 => 'Bad request',
            401 => 'Unauthorized',
            403 => 'Forbidden',
            404 => 'Not found',
            500 => 'Internal server error',
            502 => 'Bad gateway',
            503 => 'Service unavailable'
        );
        try {
            #Если код ответа не равен 200 или 204 - возвращаем сообщение об ошибке
            if ($code != 200 && $code != 204) {
                throw new Exception(isset($errors[$code]) ? $errors[$code] : 'Undescribed error', $code);
            }
        } catch (Exception $E) {
            die('Ошибка: ' . $E->getMessage() . PHP_EOL . 'Код ошибки: ' . $E->getCode());
        }
        $response = json_decode($out, true);
        $response = $response['_embedded']['items'];
        $id=[];
        foreach ($response as $key) {
            $id[] = $key['id'];
        }

       return $id;
    }


    //Запрос для получения получения всех ID указанных сущностей
    function getlist_id($path)
    {

        $link = "https://efilippovtest.amocrm.ru/api/v2/$path";

        $headers[] = "Accept: application/json";

//Curl options
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_USERAGENT, "amoCRM-API-client-
undefined/2.0");
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_URL, $link);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_COOKIEFILE, dirname(__FILE__) . "/cookie.txt");
        curl_setopt($curl, CURLOPT_COOKIEJAR, dirname(__FILE__) . "/cookie.txt");
        $out = curl_exec($curl);
        curl_close($curl);

        $response=json_decode($out,true);


        $response=$response['_embedded']['items'];
       // var_dump($response);
        $id=[];
       // var_dump($response);
        foreach ($response as $key=>$value)
        {
            $id[] = $value['id'];
        }
     //   var_dump($id);
     return( $id);

    }

    function getlist_acc($path)
    {

        $link = "https://efilippovtest.amocrm.ru/api/v2/$path";

        $headers[] = "Accept: application/json";

//Curl options
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_USERAGENT, "amoCRM-API-client-
undefined/2.0");
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_URL, $link);
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_COOKIEFILE, dirname(__FILE__) . "/cookie.txt");
        curl_setopt($curl, CURLOPT_COOKIEJAR, dirname(__FILE__) . "/cookie.txt");
        $out = curl_exec($curl);
        curl_close($curl);

        $response=json_decode($out,true);
return $response;

    }

}
