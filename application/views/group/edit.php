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
        <h1 class="page-header"> แก้ไขข้อมูลของกลุ่ม <small>Edit Group</small>
        </h1>
<form class="form-horizontal" action="<?=base_url();?>group/edit" method="POST">
<fieldset>

<!-- Form Name -->
<legend>แก้ไขข้อมูล</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="IDInput">ID</label>  
  <div class="col-md-2">
  <input id="IDInput" name="IDInput" type="text" class="form-control" value="<?php echo $group_id ; ?>" readonly>
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="IDInput">ชื่อ</label>  
  <div class="col-md-2">
  <input id="THNameInput" name="THNameInput" type="text" class="form-control input-md" required="" value="<?php echo $th_name ; ?>" >
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="IDInput">Name</label>  
  <div class="col-md-2">
  <input id="ENNameInput" name="ENNameInput" type="text" class="form-control input-md" required="" value="<?php echo $en_name ; ?>" >
    
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="THPrefixInput">หลักสูตร</label>
  <div class="col-md-2">
    <select id="InternationalInput" name="InternationalInput" class="form-control">
     <?php 
        foreach ($ia as $international){
          $value = $international=='นานาชาติ' ? 1:0 ;
          if ($select_international == $value) echo "<option value='$value' selected = 'selected'>$international</option> "; 
          else echo "<option value='$value'>$international</option> "; 
        }
      ?></select>
  </div>
</div>


<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="GroupInput">ปริญญา</label>
  <div class="col-md-1">
    <select id="DegreeInput" name="DegreeInput" class="form-control">
      <?php 
        foreach ($da as $degree){
          $degree_text = str_replace("ปริญญา", "", $degree) ;
          if ($select_degree == $degree) echo "<option value='$degree' selected = 'selected'>$degree_text</option> "; 
          else echo "<option value='$degree'>$degree_text</option> "; 
        }
      ?>
    </select>
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="SaveButton"></label>
  <div class="col-md-8">
    <input type="submit" id="SaveButton" name="SaveButton" class="btn btn-info" value="เก็บ"></button>
    <input type="reset" id="RemoveButton" name="RemoveButton" class="btn btn-danger" value="ล้าง"></button>
    <!-- <input type="reset" id="CancelButton" name="CancelButton" class="btn btn-danger" value="ยกเลิก"></button>
  --></div> 
</div>
</fieldset>
</form>

</div>
<!-- /.row -->
</body>
</html>
