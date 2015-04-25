<!DOCTYPE html>
<html lang="th">

<head>

    <title>CU Graduation</title>
</head>

<body>
<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            แก้ไขรายชื่ออาจารย์
        </h1>
        <form class="form-horizontal" action="<?=base_url();?>teacher/edit_teacher" method="POST">
                <fieldset>
                <div class="form-group">
                        <label class="col-md-4 control-label" for="textinput">รหัสอาจารย์:</label>
                        <div class="col-md-4">
                            <input class="form-control input-md" name="teacher_id" value="<?=$edit_teacher_temp[0]->teacher_id;?>" readonly> 
                        </div>
                </div>
                <div class="form-group">
                        <label class="col-md-4 control-label" for="textinput">คำนำหน้า:</label>
                        <div class="col-md-4">
                            <input class="form-control input-md" name="th_prefix" value="<?=$edit_teacher_temp[0]->th_prefix;?>" required>  
                        </div>
                </div>
                <div class="form-group">
                        <label class="col-md-4 control-label" for="textinput">ชื่อ:</label>
                        <div class="col-md-4">
                            <input class="form-control input-md" name="th_firstname" value="<?=$edit_teacher_temp[0]->th_firstname;?>" required>  
                        </div>
                </div>
                <div class="form-group">
                        <label class="col-md-4 control-label" for="textinput">นามสกุล:</label>
                        <div class="col-md-4">
                            <input class="form-control input-md" name="th_lastname" value="<?=$edit_teacher_temp[0]->th_lastname;?>" required>  
                        </div>
                </div>
                <div class="form-group">
                        <label class="col-md-4 control-label" for="textinput">Prefix:</label>
                        <div class="col-md-4">
                            <input class="form-control input-md" name="en_prefix" value="<?=$edit_teacher_temp[0]->en_prefix;?>" required>  
                        </div>
                </div>
                <div class="form-group">
                        <label class="col-md-4 control-label" for="textinput">First Name:</label>
                        <div class="col-md-4">
                            <input class="form-control input-md" name="en_firstname" value="<?=$edit_teacher_temp[0]->en_firstname;?>" required>  
                        </div>
                </div>
                <div class="form-group">
                        <label class="col-md-4 control-label" for="textinput">Last Name:</label>
                        <div class="col-md-4">
                            <input class="form-control input-md" name="en_lastname" value="<?=$edit_teacher_temp[0]->en_lastname;?>" required>  
                        </div>
                </div>
                <div class="form-group">
                        <label class="col-md-4 control-label" for="textinput">Tel Number:</label>
                        <div class="col-md-4">
                            <input class="form-control input-md" name="tel_number" value="<?=$edit_teacher_temp[0]->tel_number;?>" required>
                        </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label" for="button1id"></label>
                    <div class="col-md-4">
                        <input type="submit" class="btn btn-info" value="Submit">

                            <!-- <i class="fa fa-search"></i> -->
                        </input>
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