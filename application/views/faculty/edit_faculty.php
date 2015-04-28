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
            แก้ไขรายชื่อคณะ
            <small>Edit Faculty</small>
        </h1>
        <form class="form-horizontal" action="<?=base_url();?>faculty/edit_faculty" method="POST">
                <fieldset>
                <div class="form-group">
                        <label class="col-md-4 control-label" for="textinput">รหัสคณะ:</label>
                        <div class="col-md-4">
                            <input class="form-control input-md" name="faculty_id"  value="<?=$edit_faculty_temp['faculty_id'];?>" readonly>  </input>        
                        </div>
                </div>
                <div class="form-group">
                        <label class="col-md-4 control-label" for="textinput">ชื่อคณะ:</label>
                        <div class="col-md-4">
                            <input class="form-control input-md" name="th_faculty_name" value="<?=$edit_faculty_temp['th_faculty_name'];?>" required>  </input> 
                        </div>
                </div>
                <div class="form-group">
                        <label class="col-md-4 control-label" for="textinput">Faculty Name:</label>
                        <div class="col-md-4">
                            <input class="form-control input-md" name="en_faculty_name" value="<?=$edit_faculty_temp['en_faculty_name'];?>" required></input> 
                        </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label" for="button1id"></label>
                    <div class="col-md-4">
                        <input type="submit" class="btn btn-info" value="Submit">

                            <!-- <i class="fa fa-search"></i> -->
                        </input>
                        <a href="<?=base_url();?>faculty/index" class="btn btn-danger">
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