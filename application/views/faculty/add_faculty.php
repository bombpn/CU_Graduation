<!DOCTYPE html>
<html lang="th">

<head>

    <title>CU Graduation</title>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.js"></script> 
    <script src="http://malsup.github.com/jquery.form.js"></script> 
    <script type="text/javascript">
        $("document").ready(function() {
             $('form#add-form div div button.submit').click(function()
            {
                var all_has_value = true;

                var faculty_id = $(this).parent().parent().siblings('.faculty_id').children('div').children();
                var th_faculty_name = $(this).parent().parent().siblings('.th_faculty_name').children('div').children();
                var en_faculty_name = $(this).parent().parent().siblings('.en_faculty_name').children('div').children();
                
                var faculty_id_val = faculty_id.attr("value");
                var th_faculty_name_val = th_faculty_name.attr("value");
                var en_faculty_name_val = en_faculty_name.attr("value");

                faculty_id.parent().children(".key").attr("style","display: none;");
                faculty_id.parent().removeClass("has-error");

                all_has_value = all_has_value&check_data(faculty_id);
                all_has_value = all_has_value&check_data(th_faculty_name);
                all_has_value = all_has_value&check_data(en_faculty_name);

                console.log(all_has_value);
                

                if(all_has_value){
                    var formData = { faculty_id : faculty_id_val,
                              th_faculty_name : th_faculty_name_val,
                              en_faculty_name : en_faculty_name_val
                    };
                    console.log(formData);
                    $.ajax(
                    {
                           type: "POST",
                           url: '<?php echo base_url();?>faculty/add_faculty/>',
                           data: formData,
                           cache: false,
                            
                           success: function(message)
                           {
                                if(message == "success"){
                                    window.location = '<?php echo base_url();?>faculty/';
                                }else{
                                    faculty_id.parent().addClass("has-error");
                                    faculty_id.parent().children(".key").attr("style","display: block;");
                                    faculty_id.parent().children(".error-icon").attr("style","display: block;");
                                }
                            // console.log(result);
                            //     if(result)
                            //     $(body).html(result);
                           }
                     });
                }
            });//submit
        });
    function check_data(box){
        if(!box.attr("value")){
            box.parent().addClass("has-error");
            box.parent().children(".null").attr("style","display: block;");
            box.parent().children(".error-icon").attr("style","display: block;");
            return false;
        }else{
            box.parent().removeClass("has-error");
            box.parent().children(".null").attr("style","display: none;");
            box.parent().children(".error-icon").attr("style","display: none;");
            // console.log(box.attr("class"));
            return true;
        }
    }
    </script>
</head>

<body>
<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            เพิ่มรายชื่อคณะ
        </h1>
        <form id="add-form" class="form-horizontal" action="<?=base_url();?>faculty/add_faculty" method="POST">
                <!-- <fieldset> -->
                <div class="faculty_id form-group">
                        <label class="col-md-4 control-label" for="textinput">รหัสคณะ:</label>
                        <div class="col-md-4">
                            <input class="form-control input-md" name="faculty_id" id="faculty_id"  placeholder="รหัสคณะ" required>
                            <span class="error-icon glyphicon glyphicon-remove form-control-feedback pull-left" style="display: none;"></span>
                            <span class="key help-block" style="display: none;">* มีรหัสไอดีนี้อยู่ในฐานข้อมูลแล้ว.</span>
                            <span class="null help-block" style="display: none;">* โปรดกรอกข้อมูลให้ครบถ้วน.</span>
                        </div>

                        <!-- <div class="col-md-4">
                            <span class="glyphicon glyphicon-warning-sign form-control-feedback pull-left">โปรดกรอกข้อมูลให้ครบทุกช่อง</span>
                        </div> -->
                        
                </div>
                <div class="th_faculty_name form-group">
                        <label class="col-md-4 control-label" for="textinput">ชื่อคณะ:</label>
                        <div class="col-md-4">
                            <input class="form-control input-md" name="th_faculty_name" id='th_faculty_name' placeholder="ชื่อคณะ" required> </input> 
                            <span class="error-icon glyphicon glyphicon-remove form-control-feedback pull-left" style="display: none;"></span>
                            <span class="null help-block" style="display: none;">* โปรดกรอกข้อมูลให้ครบถ้วน.</span>
                        </div>
                </div>
                <div class="en_faculty_name form-group">
                        <label class="col-md-4 control-label" for="textinput">Faculty Name:</label>
                        <div class="col-md-4">
                            <input class="form-control input-md" name="en_faculty_name" id='en_faculty_name' placeholder="Faculty Name" required></input> 
                            <span class="error-icon glyphicon glyphicon-remove form-control-feedback pull-left" style="display: none;"></span>
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
                        <a href="<?=base_url();?>faculty" class="btn btn-danger">
                            Cancel
                            <!-- <i class="fa fa-search"></i> -->
                        </a>
                        
                    </div>
                </div>
            <!-- </fieldset> -->
        </form>
        
    </div>
</div>
<!-- /.row -->
</body>
</html>