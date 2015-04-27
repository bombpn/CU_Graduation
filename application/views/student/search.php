

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
			<?php if($opt == "search") echo "ค้นหา"; else if($opt == "edit") echo "ค้นหาข้อมูลของบัณฑิตเพื่อแก้ไข" ;?>
            <small><?php if($opt == "search") echo "Search Graduate"; else if($opt == "edit") echo "Edit Graduate" ;?></small>
        </h1>
<form class="form-horizontal" action="<?=base_url();?>student/search" method="POST">
<fieldset>
<!-- Form Name -->
<legend><?php if($opt == "search") echo "ค้นหาข้อมูลของบัณฑิต"; else if($opt == "edit") echo "ค้นหาข้อมูลของบัณฑิตเพื่อแก้ไข" ?></legend>

<div class="form-group">
  <label class="col-md-4 control-label" for="SearchIDInput">ID</label>
  <div class="col-md-2">
    <input id="SearchIDInput" name="SearchIDInput" type="search" placeholder="" class="form-control input-md">
  </div></div>
  <div class="form-group">
  <label class="col-md-4 control-label" for="SearchIDInput">ชื่อ</label>
  <div class="col-md-2">
    <input id="SearchTHFirstnameInput" name="SearchTHFirstnameInput" type="search" placeholder="" class="form-control input-md">
  </div></div>
  <div class="form-group">  
  <label class="col-md-4 control-label" for="SearchIDInput">นามสกุล</label>
  <div class="col-md-2">
    <input id="SearchTHLastnameInput" name="SearchTHLastnameInput" type="search" placeholder="" class="form-control input-md">
    </div></div>
    <div class="form-group">
    <label class="col-md-4 control-label" for="SearchIDInput">Firstname</label>
  <div class="col-md-2">
    <input id="SearchENFirstnameInput" name="SearchENFirstnameInput" type="search" placeholder="" class="form-control input-md">
    </div></div>
    <div class="form-group">
    <label class="col-md-4 control-label" for="SearchIDInput">Lastname</label>
  <div class="col-md-2">
    <input id="SearchENLastnameInput" name="SearchENLastnameInput" type="search" placeholder="" class="form-control input-md">
    <br></br>
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
