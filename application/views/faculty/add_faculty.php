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
            เพิ่มรายชื่อคณะ
        </h1>
        <form class="form-horizontal" action="<?=base_url();?>faculty/add_faculty" method="POST">
                <fieldset>
                <div class="form-group">
                        <label class="col-md-4 control-label" for="textinput">รหัสคณะ:</label>
                        <div class="col-md-4">
                            <input class="form-control input-md" name="faculty_id"  placeholder="รหัสคณะ" required>         
                        </div>
                </div>
                <div class="form-group">
                        <label class="col-md-4 control-label" for="textinput">ชื่อคณะ:</label>
                        <div class="col-md-4">
                            <input class="form-control input-md" name="th_faculty_name" placeholder="ชื่อคณะ" required> </input> 
                        </div>
                </div>
                <div class="form-group">
                        <label class="col-md-4 control-label" for="textinput">Faculty Name:</label>
                        <div class="col-md-4">
                            <input class="form-control input-md" name="en_faculty_name" placeholder="Faculty Name" required></input> 
                        </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label" for="button1id"></label>
                    <div class="col-md-4">
                        <input type="submit" class="btn btn-info" value="Submit">

                            <!-- <i class="fa fa-search"></i> -->
                        </input>
                        <a href="<?=base_url();?>faculty/index" class="btn btn-danger">
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