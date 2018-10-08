
$(document).ready(function(){

    var add = '';



    $('#form1_submit').click(function(){
        var val = $('#add_obj').val();
        //console.log ('Send');
       $.ajax({
            type: 'POST',
            url: 'router.php',
            data: { path: 'create',
                    value: val },
            success:
           function(ans){
                console.log (ans);
            }
        });
    })



    $('#form2_submit').click(function(){
        var form2_val = $('#form2_val').val();
        var form2_id = $('#form2_id').val();
        var type_obj = $('#type_obj').val();
        var form2_name = $('#form2_name').val();
//        console.log (type_obj);
        $.ajax({
            type: 'POST',
            url: 'router.php',
            data: { path: 'field',
                val : form2_val ,
                id : form2_id,
                type : type_obj,
                name: form2_name},
            success:
                function(ans){
                    console.log (ans);
                }
        });
    })

    $('#form3_submit').click(function(){
        var form3_id = $('#form3_id').val();
        var form3_text = $('#form3_text').val();
        var type_note = $('#type_note').val();
        var note_type_obj= $('#note_type_obj').val();
        $.ajax({
            type: 'POST',
            url: 'router.php',
            data: { path: 'note',
                val : form3_text ,
                id : form3_id,
                type_note : type_note,
                note_type_obj : note_type_obj},
            success:
                function(ans){
                    console.log (ans);
                }
        });
    })

    $('#form4_submit').click(function(){
        var form4_id = $('#form4_id').val();
        var form4_text = $('#form4_text').val();
        var form4_date = $('#form4_date').val();
        var task_type_obj= $('#note_type_obj').val();
        var form4_responsible= $('#form4_responsible').val();
        $.ajax({
            type: 'POST',
            url: 'router.php',
            data: { path: 'task',
                val : form4_text ,
                id : form4_id,
                date : form4_date,
                task_type_obj : task_type_obj,
            responsible : form4_responsible,},
            success:
                function(ans){
                    console.log (ans);
                }
        });
    })

    $('#form5_submit').click(function(){
        var form5_id = $('#form5_id').val();
        var form5_text = $('#form5_text').val();
        var form5_date = $('#form5_date').val();
        $.ajax({
            type: 'POST',
            url: 'router.php',
            data: { path: 'upd_task',
                val : form5_text ,
                id : form5_id,
                date : form5_date,},
            success:
                function(ans){
                    console.log (ans);
                }
        });
    })

});
