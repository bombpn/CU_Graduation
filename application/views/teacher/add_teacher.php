<?php

$javascriptVariables = array(
    'isEdit' => isset($edit_teacher_temp)
);

?>
<!DOCTYPE html>
<html lang="th">

<head>

    <title>CU Graduation</title>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.js"></script> 
    <script src="http://malsup.github.com/jquery.form.js"></script> 
    <script type="text/javascript">

        $("document").ready(function() {
            
            if(php_variables.isEdit){
                var arr_temp = {};
                <?php if(isset($edit_teacher_temp)){echo "arr_temp =";echo json_encode($edit_teacher_temp);} ?>;
                arr_temp = arr_temp[0];
                // console.log(arr_temp[0]);
                document.getElementById("teacher_id").readOnly="readonly";
                $.each(arr_temp,function(key,value){
                    // console.log(key + " " + typeof key + " " + value);
                    if(document.getElementById(key))document.getElementById(key).value = value;
                    // if(key == 'FACULTY_faculty_id')console.log("daskdshjasjhdashj" + key + " " + " " + value);
                });
                 <?php if(isset($edit_teacher_temp)){echo "document.getElementById('faculty_id').value = arr_temp['FACULTY_faculty_id']";}?>
                // console.log(php_variables.isEdit);
                // console.log(arr_temp['FACULTY_faculty_id']);
            }
            // if(<?php echo isset($edit_teacher_temp);?>){
            //     console.log("YEAH");
            // }

            $('form#add-form div div button.submit').click(function()
            {
                var all_has_value = true;
                var arr = {};

                arr["teacher_id"] = $(this).parent().parent().siblings('.teacher_id').children('div').children('input');
                arr["faculty_id"] = $(this).parent().parent().siblings('.faculty_id').children('div').children('select');
                arr["th_prefix"] = $(this).parent().parent().siblings('.th_prefix').children('div').children('input');
                arr["th_firstname"] = $(this).parent().parent().siblings('.th_firstname').children('div').children('input');
                arr["th_lastname"] = $(this).parent().parent().siblings('.th_lastname').children('div').children('input');
                arr["en_prefix"] = $(this).parent().parent().siblings('.en_prefix').children('div').children('input');
                arr["en_firstname"] = $(this).parent().parent().siblings('.en_firstname').children('div').children('input');
                arr["en_lastname"] = $(this).parent().parent().siblings('.en_lastname').children('div').children('input');
                arr["tel_number"] = $(this).parent().parent().siblings('.tel_number').children('div').children('input');

                
                var formData = {};

                // console.log(formData);
                // console.log(arr["faculty_id"].attr("class"));

                $.each(arr, function(key, value){
                    formData[key] = value.attr('value');
                });

                $.each(arr, function(key, value){
                    clear_status(value);
                });

                if(!php_variables.isEdit)all_has_value = all_has_value&!has_key_in_teacher(arr["teacher_id"],formData);

                $.each(arr, function(key, value){
                    all_has_value = all_has_value&check_null(value);
                });

                // console.log(all_has_value);
                

                if(all_has_value){
                    var directory = '<?php echo base_url();?>teacher/add_teacher/>';
                    if(php_variables.isEdit){
                        directory = '<?php echo base_url();?>teacher/edit_teacher/>';
                    }
                    // console.log("reach all option");
                    $.ajax(
                    {
                           type: "POST",
                           url: directory,
                           data: formData,
                           cache: false,
                            
                           success: function(message)
                           {
                                // console.log(message);
                                // if(message == "success"){
                                    window.location = '<?php echo base_url();?>teacher/';
                                // }else{
                                    
                                // }
                            // console.log(result);
                            //     if(result)
                            //     $(body).html(result);
                           }
                     });
                }
            });//submit
        });
        function check_null(box){
            if(!box.attr("value")){
                box.parent().parent().addClass("has-error");
                box.parent().parent().addClass("has-feedback");
                box.parent().children(".null").attr("style","display: block;");
                box.parent().children(".error-icon").attr("style","display: block;");
                return false;
            }else{
                
                // console.log(box.attr("class"));
                return true;
            }
        }
        function clear_status(box){
                box.parent().parent().removeClass("has-error");
                box.parent().parent().addClass("has-feedback");
                box.parent().children(".error-icon").attr("style","display: none;");
                box.parent().children(".null").attr("style","display: none;");
                box.parent().children(".key").attr("style","display: none;");       
        }
        function has_key_in_teacher(teacher_id,formData){
            $.ajax(
            {
                type: "POST",
                url: '<?php echo base_url();?>teacher/has_key_in_teacher/>',
                data: formData,
                cache: false,
                    
                success: function(has_key)
                {
                    if(has_key == true){
                        teacher_id.parent().parent().addClass("has-error");
                        teacher_id.parent().parent().addClass("has-feedback");
                        teacher_id.parent().children(".key").attr("style","display: block;");
                        teacher_id.parent().children(".error-icon").attr("style","display: block;");
                        return true;
                    }else{
                        return false;
                    }
                }
                
            });
        }
    </script>
</head>

<body>
<?php

if (!empty($javascriptVariables)) {
    echo "<script type='text/javascript'>\n";
    echo "var php_variables = " . json_encode($javascriptVariables) . "\n";
    echo "</script>\n";
}

?>
<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            <?php
                if(isset($edit_teacher_temp)) echo "แก้ไขรายชื่ออาจารย์";
                else echo "เพิ่มรายชื่ออาจารย์";
            ?>
        </h1>
        <form id="add-form" class="form-horizontal" action="<?=base_url();?>teacher/add_teacher" method="POST">
                <fieldset>
                <div class="teacher_id form-group">
                        <label class="col-md-4 control-label" for="textinput">รหัสอาจารย์:</label>
                        <div class="col-md-4">
                            <input class="form-control input-md" name="teacher_id" id="teacher_id" placeholder="รหัสอาจารย์">
                            <span class="error-icon glyphicon glyphicon-remove form-control-feedback" style="display: none;"></span>
                            <span class="key help-block" style="display: none;">* มีรหัสไอดีนี้อยู่ในฐานข้อมูลแล้ว.</span>
                            <span class="null help-block" style="display: none;">* โปรดกรอกข้อมูลให้ครบถ้วน.</span>         
                        </div>
                </div>
                <div class="faculty_id form-group">
                        <label class="col-md-4 control-label" for="textinput">คณะ:</label>
                        <div class="col-md-4">
                            <select class="form-control" name="faculty_id" id='faculty_id'>
                                <option value=""></option>
                                <?php
                                foreach ($allfaculty as $faculty) {
                                    $id = $faculty->faculty_id;
                                    $th = $faculty->th_faculty_name;
                                    $en = $faculty->en_faculty_name;
                                    echo "<option value=".$id.">".$id.": ".$th." (".$en.")</option>";
                                }
                                ?>
                            </select>
                            <span class="null help-block" style="display: none;">* โปรดเลือกคณะ.</span>  
                        </div>
                </div>
                <div class="th_prefix form-group">
                        <label class="col-md-4 control-label" for="textinput">คำนำหน้า:</label>
                        <div class="col-md-4">
                            <input class="form-control input-md" name="th_prefix" id="th_prefix" placeholder="คำนำหน้า">
                            <span class="error-icon glyphicon glyphicon-remove form-control-feedback" style="display: none;"></span>
                            <span class="null help-block" style="display: none;">* โปรดกรอกข้อมูลให้ครบถ้วน.</span>  
                        </div>
                </div>
                <div class="th_firstname form-group">
                        <label class="col-md-4 control-label" for="textinput">ชื่อ:</label>
                        <div class="col-md-4">
                            <input class="form-control input-md" name="th_firstname" id="th_firstname" placeholder="ชื่อ">  
                            <span class="error-icon glyphicon glyphicon-remove form-control-feedback" style="display: none;"></span>
                            <span class="null help-block" style="display: none;">* โปรดกรอกข้อมูลให้ครบถ้วน.</span>
                        </div>
                </div>
                <div class="th_lastname form-group">
                        <label class="col-md-4 control-label" for="textinput">นามสกุล:</label>
                        <div class="col-md-4">
                            <input class="form-control input-md" name="th_lastname" id="th_lastname" placeholder="นามสกุล">
                            <span class="error-icon glyphicon glyphicon-remove form-control-feedback" style="display: none;"></span>
                            <span class="null help-block" style="display: none;">* โปรดกรอกข้อมูลให้ครบถ้วน.</span>  
                        </div>
                </div>
                <div class="en_prefix form-group">
                        <label class="col-md-4 control-label" for="textinput">Prefix:</label>
                        <div class="col-md-4">
                            <input class="form-control input-md" name="en_prefix" id="en_prefix" placeholder="Prefix">
                            <span class="error-icon glyphicon glyphicon-remove form-control-feedback" style="display: none;"></span> 
                            <span class="null help-block" style="display: none;">* โปรดกรอกข้อมูลให้ครบถ้วน.</span> 
                        </div>
                </div>
                <div class="en_firstname form-group">
                        <label class="col-md-4 control-label" for="textinput">First Name:</label>
                        <div class="col-md-4">
                            <input class="form-control input-md" name="en_firstname" id="en_firstname" placeholder="First Name">
                            <span class="error-icon glyphicon glyphicon-remove form-control-feedback" style="display: none;"></span>
                            <span class="null help-block" style="display: none;">* โปรดกรอกข้อมูลให้ครบถ้วน.</span>  
                        </div>
                </div>
                <div class="en_lastname form-group">
                        <label class="col-md-4 control-label" for="textinput">Last Name:</label>
                        <div class="col-md-4">
                            <input class="form-control input-md" name="en_lastname" id="en_lastname" placeholder="Last Name"> 
                            <span class="error-icon glyphicon glyphicon-remove form-control-feedback" style="display: none;"></span>
                            <span class="null help-block" style="display: none;">* โปรดกรอกข้อมูลให้ครบถ้วน.</span> 
                        </div>
                </div>
                <div class="tel_number form-group">
                        <label class="col-md-4 control-label" for="textinput">Tel Number:</label>
                        <div class="col-md-4">
                            <input class="form-control input-md" name="tel_number" id="tel_number" placeholder="0xx-xxx-xxxx">
                            <span class="error-icon glyphicon glyphicon-remove form-control-feedback" style="display: none;"></span>
                            <span class="null help-block" style="display: none;">* โปรดกรอกข้อมูลให้ครบถ้วน.</span>
                        </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label" for="button1id"></label>
                    <div class="col-md-4">
                        <button type="button" id="submit" class="submit btn btn-info" value="Submit">
                            Submit
                            <!-- <i class="fa fa-search"></i> -->
                        </button>
                        <a href="<?=base_url();?>teacher/index" class="btn btn-danger">
                            Cancel
                            <!-- <i class="fa fa-search"></i> -->
                        </a>
                        
                    </div>
                </div>
            </fieldset>
        </form>
        
    </div>
</div>
<!-- /.row -->
</body>
</html>