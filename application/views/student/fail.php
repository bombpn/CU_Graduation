

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
			ไม่พบข้อมูลที่ท่านต้องการ
            <small>Search Failed</small>
        </h1>
<form class="form-horizontal" action="<?=base_url();?>student/search" method="POST">
<fieldset>
<!-- Form Name -->
<legend>กรุณาค้นหาใหม่อีกครั้ง</legend>

<div class="form-group">
  <label class="col-md-4 control-label" for="SearchIDInput">ID</label>
  <div class="col-md-2">
    <input id="SearchIDInput" name="SearchIDInput" type="search" placeholder="" class="form-control input-md"
    value= "<?php if($SearchIDInput) echo "$SearchIDInput" ;
          else echo "";
    ?> "
    ></input>
  </div></div>
  <div class="form-group">
  <label class="col-md-4 control-label" for="SearchIDInput">ชื่อ (ภาษาไทย)</label>
  <div class="col-md-2">
    <input id="SearchTHFirstnameInput" name="SearchTHFirstnameInput" type="search" placeholder="" class="form-control input-md"
    value="<?php if($SearchTHFirstnameInput) echo "$SearchTHFirstnameInput" ;
          else echo "";
    ?> ">
    </input>
  </div></div>
  <div class="form-group">  
  <label class="col-md-4 control-label" for="SearchIDInput">นามสกุล (ภาษาไทย)</label>
  <div class="col-md-2">
    <input id="SearchTHLastnameInput" name="SearchTHLastnameInput" type="search" placeholder="" class="form-control input-md"
    value"<?php if($SearchTHLastnameInput) echo "$SearchTHLastnameInput" ;
          else echo "";
    ?> ">
    </input>
    </div></div>
    <div class="form-group">
    <label class="col-md-4 control-label" for="SearchIDInput">ชื่อ (ภาษาอังกฤษ)</label>
  <div class="col-md-2">
    <input id="SearchENFirstnameInput" name="SearchENFirstnameInput" type="search" placeholder="" class="form-control input-md"
    value="<?php if($SearchENFirstnameInput) echo "$SearchENFirstnameInput" ;
          else echo "";
    ?>">
    </input>
    </div></div>
    <div class="form-group">
    <label class="col-md-4 control-label" for="SearchIDInput">นามสกุล (ภาษาอังกฤษ)</label>
  <div class="col-md-2">
    <input id="SearchENLastnameInput" name="SearchENLastnameInput" type="search" placeholder="" class="form-control input-md"
    value="<?php if($SearchENLastnameInput) echo "$SearchENLastnameInput" ;
          else echo "";
    ?> ">
    </input>
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
