

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
			ค้นหารายชื่อที่ต้องการแก้ไข
            <small>Edit Student</small>
        </h1>
<form class="form-horizontal" action="<?=base_url();?>student/edit" method="POST">
<fieldset>
<!-- Form Name -->
<legend>ใส่รหัสนิสิตที่ต้องการแก้ไข</legend>
  <label class="col-md-4 control-label" for="SearchIDInput">ID</label>
  <div class="col-md-2">
    <input id="SearchIDInput" name="SearchIDInput" type="search" placeholder="" class="form-control input-md">
    <input type="submit" class="btn btn-primary btn-primary" value="Edit"> 
</fieldset>
</form>

    </div>
</div>
<!-- /.row -->
</body>
</html>
