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
            เพิ่มสถานที่
            <small>Import Place</small>
        </h1>
        <form class="form-horizontal" action="<?=base_url();?>place/add_place" method="POST" enctype="multipart/form-data">
                <fieldset>
                <div class="form-group">
                        <label class="col-md-4 control-label" for="textinput">ชื่อสถานที่:</label>
                        <div class="col-md-4">
                            <input class="form-control input-md" name="th_building" placeholder="ชื่อสถานที่" required>  
                        </div>
                </div>
                <div class="form-group">
                        <label class="col-md-4 control-label" for="textinput">Place Name:</label>
                        <div class="col-md-4">
                            <input class="form-control input-md" name="en_building" placeholder="Place Name" required>  
                        </div>
                </div>
                <div class="form-group">
                        <label class="col-md-4 control-label" for="textinput">ชั้น:</label>
                        <div class="col-md-4">
                            <input class="form-control input-md" name="floor" placeholder="ชั้น" required>  
                        </div>
                </div>
                <div class="form-group">
                        <label class="col-md-4 control-label" for="textinput">ห้อง:</label>
                        <div class="col-md-4">
                            <input class="form-control input-md" name="room" placeholder="ห้อง" required>  
                        </div>
                </div>
                <div class="form-group">
                        <label class="col-md-4 control-label" for="textinput">แผนผังที่นั่ง:</label>
                        <div class="col-md-4">
                            <div class="radio">
                                <label><input type="radio" name="option" value="basic" checked="checked">Basic Configure</label>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label">Row: </label>
                                <div class="col-md-4">
                                    <input class="form-control input-md" name="row" placeholder="Row">
                                </div>
                                <label class="col-md-2 control-label">Col: </label>
                                <div class="col-md-4">
                                    <input class="form-control input-md" name="col" placeholder="Col">
                                </div>
                            </div>

                            <div class="radio">
                                <label><input type="radio" name="option" value="import">Import CSV File</label>
                                <input type="file" class="control-label" name="import_file" accept=".csv">
                            </div>
                        </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label" for="button1id"></label>
                    <div class="col-md-4">
                        <input type="submit" class="btn btn-info" value="เก็บ">

                            <!-- <i class="fa fa-search"></i> -->
                        </input>
                        <a href="<?=base_url();?>place/index" class="btn btn-danger">
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