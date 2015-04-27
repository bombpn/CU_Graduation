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
            ค้นหาสถานที่
        </h1>
        <form class="form-horizontal" action="<?=base_url();?>place/search_place" method="POST">
                <fieldset>
                <div class="form-group">
                        <label class="col-md-4 control-label" for="textinput">ชื่อสถานที่:</label>
                        <div class="col-md-4">
                            <input class="form-control input-md" name="th_building" placeholder="ชื่อสถานที่">  
                        </div>
                </div>
                <div class="form-group">
                        <label class="col-md-4 control-label" for="textinput">Place Name:</label>
                        <div class="col-md-4">
                            <input class="form-control input-md" name="en_building" placeholder="Place Name">  
                        </div>
                </div>
                <div class="form-group">
                        <label class="col-md-4 control-label" for="textinput">ชั้น:</label>
                        <div class="col-md-4">
                            <input class="form-control input-md" name="floor" placeholder="ชั้น">  
                        </div>
                </div>
                <div class="form-group">
                        <label class="col-md-4 control-label" for="textinput">ห้อง:</label>
                        <div class="col-md-4">
                            <input class="form-control input-md" name="room" placeholder="ห้อง">  
                        </div>
                </div>
                <div class="form-group">
                    <label class="col-md-4 control-label" for="button1id"></label>
                    <div class="col-md-4">
                        <input type="submit" class="btn btn-info" value="Submit">

                            <!-- <i class="fa fa-search"></i> -->
                        </input>
                        <a href="<?=base_url();?>place/index" class="btn btn-danger">
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