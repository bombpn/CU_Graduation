<!DOCTYPE html>
<html lang="th">
<head>
    <title>CU Graduation</title>
    <!-- <link href="<?=base_url();?>css/calendar.css" rel="stylesheet"> -->
</head>

<body>
<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
			เพิ่มรายชื่อ
            <small>Import Student to Group</small>
        </h1>
<table class="table table-striped table-hover" >
            <thead>
                <tr>
                    <th>รหัสกลุ่ม</th>
                    <th>ชือ</th>
                    <th>Name</th>
                    <th>หลักสูตร</th>
                    <th>ปริญญา</th>
                <tr>
            </thead>
            <tbody>
                    <tr>
                        <td><?=$id?></td>
                        <td><?=$th_name?></td>
                        <td><?=$en_name?></td>
                        <td><?=$international?></td>
                        <td><?=$degree?></td> 
                    </tr> 
            </tbody>
        </table>
<legend>เพิ่มบัณฑิตด้วย .csv</legend>
<fieldset> 
<div class="form-group form-horizontal">
  <label class="col-md-4 control-label" for="ImportFiel">ไฟล์ .csv</label>
  <div class="col-md-4">
 <form  class="form-horizontal" id="form" action="<?=base_url();?>group/uploadCSV" method="POST" enctype="multipart/form-data" >
            <div style="visible: hiden; display: none; ..">
            <input id="IDInput" name="IDInput" type="text" class="form-control" value="<?php echo $id ; ?>"  readonly>
            </div>
            <input type="file" id="FileInput" name="userfile" class="input-file" multiple="multiple"  />
            <br></br>
            <input type="submit" id="UploadInput" name="UploadInput" value="อัพโหลด" class="btn btn-success" />
        </form>
    </div>
</div>
</fieldset> 
</div>
</body>
</html>