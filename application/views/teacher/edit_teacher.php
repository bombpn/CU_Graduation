<!DOCTYPE html>
<html lang="th">

<head>

    <title>CU Graduation</title>
    <!-- Ajax -->
    <script src="<?=base_url();?>/js/jquery_ajax.js"></script>
    <!-- Form -->
    <script src="<?=base_url();?>/js/jquery.form.js"></script>
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
                <?php $teacher = $edit_teacher_temp[0]; ?>
                <div class="form-group">
                        <label class="col-md-4 control-label" for="textinput">รหัสอาจารย์:</label>
                        <div class="col-md-4">
                            <input class="form-control input-md" name="teacher_id" value="<?=$teacher->teacher_id;?>" readonly> 
                        </div>
                </div>
                <div class="form-group">
                        <label class="col-md-4 control-label" for="textinput">คณะ:</label>
                        <div class="col-md-4">
                        <select class="form-control" id="sel1" name="faculty_id">
                            <?php
                            foreach ($allfaculty as $faculty) {
                                $id = $faculty->faculty_id;
                                $th = $faculty->th_faculty_name;
                                $en = $faculty->en_faculty_name;
                                echo "<option value=".$id;
                                if ($teacher->FACULTY_faculty_id == $id)
                                    echo " selected";
                                echo ">".$id.": ".$th." (".$en.")</option>";
                            }
                            ?>
                        </select>   
                        </div>
                </div>
                <div class="form-group">
                        <label class="col-md-4 control-label" for="textinput">คำนำหน้า:</label>
                        <div class="col-md-4">
                            <input class="form-control input-md" name="th_prefix" value="<?=$teacher->th_prefix;?>" required>  
                        </div>
                </div>
                <div class="form-group">
                        <label class="col-md-4 control-label" for="textinput">ชื่อ:</label>
                        <div class="col-md-4">
                            <input class="form-control input-md" name="th_firstname" value="<?=$teacher->th_firstname;?>" required>  
                        </div>
                </div>
                <div class="form-group">
                        <label class="col-md-4 control-label" for="textinput">นามสกุล:</label>
                        <div class="col-md-4">
                            <input class="form-control input-md" name="th_lastname" value="<?=$teacher->th_lastname;?>" required>  
                        </div>
                </div>
                <div class="form-group">
                        <label class="col-md-4 control-label" for="textinput">Prefix:</label>
                        <div class="col-md-4">
                            <input class="form-control input-md" name="en_prefix" value="<?=$teacher->en_prefix;?>" required>  
                        </div>
                </div>
                <div class="form-group">
                        <label class="col-md-4 control-label" for="textinput">First Name:</label>
                        <div class="col-md-4">
                            <input class="form-control input-md" name="en_firstname" value="<?=$teacher->en_firstname;?>" required>  
                        </div>
                </div>
                <div class="form-group">
                        <label class="col-md-4 control-label" for="textinput">Last Name:</label>
                        <div class="col-md-4">
                            <input class="form-control input-md" name="en_lastname" value="<?=$teacher->en_lastname;?>" required>  
                        </div>
                </div>
                <div class="form-group">
                        <label class="col-md-4 control-label" for="textinput">Tel Number:</label>
                        <div class="col-md-4">
                            <input class="form-control input-md" name="tel_number" value="<?=$teacher->tel_number;?>" required>
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