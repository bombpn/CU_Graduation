

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
			<?php if($opt == "search") echo "ค้นหา"; else if($opt == "edit") echo "ค้นหาข้อมูลของกลุ่ม" ;?>
            <small><?php if($opt == "search") echo "Search Group"; else if($opt == "edit") echo "Edit Student" ;?></small>
        </h1>
<form class="form-horizontal" action="<?=base_url();?>group/search" method="POST">
<fieldset>
<!-- Form Name -->
<legend><?php if($opt == "search") echo "ค้นหาข้อมูลของกลุ่ม"; else if($opt == "edit") echo "ค้นหาข้อมูลของกลุ่มเพื่อแก้ไข" ?></legend>

<div class="form-group">
  <label class="col-md-4 control-label" for="SearchIDInput">ID</label>
  <div class="col-md-2">
    <input id="SearchIDInput" name="SearchIDInput" type="search" placeholder="" class="form-control input-md">
  </div></div>
  <div class="form-group">
  <label class="col-md-4 control-label" for="SearchIDInput">ชื่อ</label>
  <div class="col-md-2">
    <input id="SearchTHNameInput" name="SearchTHNameInput" type="search" placeholder="" class="form-control input-md">
  </div></div>
    <div class="form-group">
    <label class="col-md-4 control-label" for="SearchIDInput">Name</label>
  <div class="col-md-2">
    <input id="SearchENNameInput" name="SearchENNameInput" type="search" placeholder="" class="form-control input-md">
    </div></div>
    <!-- Multiple Checkboxes -->
<div class="form-group">
  <label class="col-md-4 control-label" for="InternationalCheck">หลักสูตร</label>
  <div class="col-md-4">
  <div class="checkbox">
    <label for="InternationalCheck-0">
      <input type="checkbox" name="InternationalCheck-0" id="InternationalCheck-0" value="0">
      ปกติ
    </label>
  </div>
  <div class="checkbox">
    <label for="InternationalCheck-1">
      <input type="checkbox" name="InternationalCheck-1" id="InternationalCheck-1" value="1">
      นานาชาติ
    </label>
  </div>
  </div>
</div>

<!-- Multiple Checkboxes -->
<div class="form-group">
  <label class="col-md-4 control-label" for="DegreeCheck">ปริญญา</label>
  <div class="col-md-4">
  <div class="checkbox">
    <label for="DegreeCheck-0">
      <input type="checkbox" name="DegreeCheck-0" id="DegreeCheck-0" value="ปริญญาตรี">
      ตรี
    </label>
  </div>
  <div class="checkbox">
    <label for="DegreeCheck-1">
      <input type="checkbox" name="DegreeCheck-1" id="DegreeCheck-1" value="ปริญญาโท">
      โท
    </label>
  </div>
  <div class="checkbox">
    <label for="DegreeCheck-2">
      <input type="checkbox" name="DegreeCheck-2" id="DegreeCheck-2" value="ปริญญาเอก">
      เอก
    </label>
  </div>
  </div>
</div>
    <!-- <div class="form-group">
      <label class="col-md-4 control-label" for="InternationalInput">International</label>
        <div class="col-md-1">
          <select id="SearchInternationalInput" name="SearchInternationalInput" class="form-control">
            <option value="0">ปกติ</option>
            <option value="1">นานาชาติ</option>
          </select>
        </div>
    </div>
    <div class="form-group">
      <label class="col-md-4 control-label" for="DegreeInput">ปริญญา</label>
        <div class="col-md-1">
          <select id="SearchDegreeInput" name="SearchDegreeInput" class="form-control">
            <option value="ปริญญาตรี">ตรี</option>
            <option value="ปริญญาโท">โท</option>
            <option value="ปริญญาเอก">เอก</option>
          </select>
        </div> -->
    </div>
<br></br>
<div class="form-group">
  <label class="col-md-4 control-label" for="SearchButton"></label>
    <input type="submit" class="btn btn-primary" value="Search"> 
    </div> 
    </div>
</fieldset>
</form>

    </div>
</div>
<!-- /.row -->
</body>
</html>
