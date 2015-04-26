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
            แก้ไขข้อมูลสถานที่
        </h1>
        <form class="form-horizontal" action="<?=base_url();?>place/edit_place" method="POST">
                <fieldset>
                <input class="form-control input-md" name="place_id" value="<?=$edit_place_temp[0]->place_id;?>" type="hidden"> 
                <div class="form-group">
                        <label class="col-md-4 control-label" for="textinput">ชื่อสถานที่:</label>
                        <div class="col-md-4">
                            <input class="form-control input-md" name="th_building" value="<?=$edit_place_temp[0]->th_building;?>" required>  
                        </div>
                </div>
                <div class="form-group">
                        <label class="col-md-4 control-label" for="textinput">Place Name:</label>
                        <div class="col-md-4">
                            <input class="form-control input-md" name="en_building" value="<?=$edit_place_temp[0]->en_building;?>" required>  
                        </div>
                </div>
                <div class="form-group">
                        <label class="col-md-4 control-label" for="textinput">ชั้น:</label>
                        <div class="col-md-4">
                            <input class="form-control input-md" name="floor" value="<?=$edit_place_temp[0]->floor;?>" required>  
                        </div>
                </div>
                <div class="form-group">
                        <label class="col-md-4 control-label" for="textinput">ห้อง:</label>
                        <div class="col-md-4">
                            <input class="form-control input-md" name="room" value="<?=$edit_place_temp[0]->room;?>" required>  
                        </div>
                </div>
                <div class="form-group">
                        <label class="col-md-4 control-label" for="textinput">แผนผังที่นั่ง:</label>
                        <div class="col-md-4">
                            <div class="radio">
                                <label><input type="radio" name="option" value="basic" checked="checked">No Change</label>
                            </div>
                            <div class="radio">
                                <label><input type="radio" name="option" value="basic">Basic Configure</label>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label">Row: </label>
                                <div class="col-md-4">
                                    <input class="form-control input-md" name="row" placeholder="Row" required>
                                </div>
                                <label class="col-md-2 control-label">Col: </label>
                                <div class="col-md-4">
                                    <input class="form-control input-md" name="col" placeholder="Col" required>
                                </div>
                            </div>

                            <div class="radio">
                                <label><input type="radio" name="option" value="import">Import CSV File</label>
                                <input type="file" class="control-label" name="import_file">
                            </div>
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