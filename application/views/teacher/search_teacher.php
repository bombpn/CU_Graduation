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
            ค้นหารายชื่ออาจารย์
            <small>Search Teacher</small>
        </h1>
        <form class="form-horizontal" action="<?=base_url();?>teacher/search_teacher" method="POST">
                <fieldset>
                <div class="form-group">
                        <label class="col-md-4 control-label" for="textinput">รหัสอาจารย์:</label>
                        <div class="col-md-4">
                            <input class="form-control input-md" name="teacher_id"  placeholder="รหัสอาจารย์" >         
                        </div>
                </div>
                <div class="form-group">
                        <label class="col-md-4 control-label" for="textinput">คณะ:</label>
                        <div class="col-md-4">
                        <select class="form-control" id="sel1" name="faculty_id">
                            <option></option>
                            <?php
                            foreach ($allfaculty as $faculty) {
                                $id = $faculty->faculty_id;
                                $th = $faculty->th_faculty_name;
                                $en = $faculty->en_faculty_name;
                                echo "<option value=".$id.">".$id.": ".$th." (".$en.")</option>";
                            }
                            ?>
                        </select>   
                        </div>
                </div>
                <div class="form-group">
                        <label class="col-md-4 control-label" for="textinput">คำนำหน้า:</label>
                        <div class="col-md-4">
                            <input class="form-control input-md" name="th_prefix" placeholder="คำนำหน้า" >  
                        </div>
                </div>
                <div class="form-group">
                        <label class="col-md-4 control-label" for="textinput">ชื่อ:</label>
                        <div class="col-md-4">
                            <input class="form-control input-md" name="th_firstname" placeholder="ชื่อ" >  
                        </div>
                </div>
                <div class="form-group">
                        <label class="col-md-4 control-label" for="textinput">นามสกุล:</label>
                        <div class="col-md-4">
                            <input class="form-control input-md" name="th_lastname" placeholder="นามสกุล" >  
                        </div>
                </div>
                <div class="form-group">
                        <label class="col-md-4 control-label" for="textinput">Prefix:</label>
                        <div class="col-md-4">
                            <input class="form-control input-md" name="en_prefix" placeholder="Prefix" >  
                        </div>
                </div>
                <div class="form-group">
                        <label class="col-md-4 control-label" for="textinput">First Name:</label>
                        <div class="col-md-4">
                            <input class="form-control input-md" name="en_firstname" placeholder="First Name" >  
                        </div>
                </div>
                <div class="form-group">
                        <label class="col-md-4 control-label" for="textinput">Last Name:</label>
                        <div class="col-md-4">
                            <input class="form-control input-md" name="en_lastname" placeholder="Last Name" >  
                        </div>
                </div>
                <!--
                <div class="form-group">
                        <label class="col-md-4 control-label" for="textinput">Tel Number:</label>
                        <div class="col-md-4">
                            <input class="form-control input-md" name="tel_number" placeholder="Tel Number" >
                        </div>
                </div>
                -->
                <div class="form-group">
                    <label class="col-md-4 control-label" for="button1id"></label>
                    <div class="col-md-4">
                        <input type="submit" class="btn btn-info" value="ค้นหา">

                            <!-- <i class="fa fa-search"></i> -->
                        </input>
                        <a href="<?=base_url();?>teacher/index" class="btn btn-danger">
                            ยกเลิก
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