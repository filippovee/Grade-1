<!DOCTYPE html>
<html>
<title></title>
<head>
    <script src="jquery-3.3.1.js"></script>
    <script src="request.js"></script>
</head>
<body>

<div>
    <h3>Создать сущность</h3>
    <form method="post" action="">
        <input name="add_obj" id="add_obj" placeholder="Добавить сущность">
        <input type="button" id="form1_submit" value="Отправить">
    </form>
</div>

<div>
    <h3>Добавить дополнительное поле</h3>
    <div>
        <div>
            <p>Тип сущности</p>
            <select name="type_obj" id="type_obj">
                <option value="2">Сделка</option>
                <option value="1">Контакт</option>
                <option value="12">Покупатель</option>
                <option value="3">Компания</option>
            </select>
            <div>
                <input name="id_obj_field" id="form2_id" placeholder="id сущности">
            </div>
            <div>
                <input name="field_val" id="form2_val" placeholder="значение поля">
            </div>
            <div>
                <input name="field_name" id="form2_name" placeholder="имя поля">
            </div>
            <div>
                <input type="button" id="form2_submit" value="Отправить">
            </div>

        </div>


        <div>
            <h3>Добавить примечание</h3>
            <div>
                <div>
                    <p>Тип примечания</p>
                    <select name="item" id="type_note">
                        <option value="4">Примечание</option>
                        <option value="10">Входящий вызов</option>
                    </select>
                    <div>
                        <div>
                            <p>Тип сущности</p>
                            <select name="type_obj" id="note_type_obj">
                                <option value="2">Сделка</option>
                                <option value="1">Контакт</option>
                                <option value="12">Покупатель</option>
                                <option value="3">Компания</option>
                            </select>
                            <div>
                        <input name="id_obj_task" id="form3_id" placeholder="id сущности">
                    </div>
                    <div>
                        <input name="text_note" id="form3_text" placeholder="Текст примечания">
                    </div>
                    <div>
                        <input type="button" id="form3_submit" value="Отправить">
                    </div>
                </div>
                </div>


                    <h3>Добавить задачу</h3>
                    <div>
                                <p>Тип сущности</p>
                                <select name="type_obj" id="task_type_obj">
                                    <option value="2">Сделка</option>
                                    <option value="1">Контакт</option>
                                    <option value="12">Покупатель</option>
                                    <option value="3">Компания</option>
                                </select>
                                <div>
                            <div>
                                <input name="id_obj_task" id="form4_id" placeholder="id сущности">
                            </div>
                            <div>
                                <input name="task_date" id="form4_date" placeholder="Дата завершения">
                            </div>
                            <div>
                                <input name="task_text" id="form4_text" placeholder="Текст задачи">
                            </div>
                                    <div>
                                        <input name="task_text" id="form4_responsible" placeholder="Ответственный">
                                    </div>
                            <div>
                                <input type="button" id="form4_submit" value="Отправить">
                            </div>
                        </div>
                        <div>


                            <h3>Завершение задачи</h3>
                            <div>
                                <input name="id_task_update" id="form5_id" placeholder="id сущности">
                            </div>
                            <div>
                                <input name="task_date_update" id="form5_date" placeholder="Дата завершения">
                            </div>
                            <div>
                                <input name="task_text_update" id="form5_text" placeholder="Комментарий">
                            </div>
                            <div>
                                <input type="button" id="form5_submit" value="Отправить">
                            </div>
                        </div>
                        </div>

</body>
</html>