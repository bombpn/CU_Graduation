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
        <h1 class="page-header"> แก้ข้อมูลของบัณฑิต <small>Edit Student</small>
        </h1>
<form class="form-horizontal" action="<?=base_url();?>student/edit" method="POST">
<fieldset>

<!-- Form Name -->
<legend>แก้ไขข้อมูล</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="IDInput">ID</label>  
  <div class="col-md-2">
  <input id="IDInput" name="IDInput" type="text" class="form-control input-md" required="" value="<?php echo $student_id ; ?>" >
    
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="THPrefixInput">คำนำหน้าชื่อ  (ไทย) </label>
  <div class="col-md-1">
    <select id="THPrefixInput" name="THPrefixInput" class="form-control">
      <option value="<?php echo $ta[0] ; ?>"><?php echo $ta[0] ; ?></option>
      <option  value="<?php echo $ta[1] ; ?>"><?php echo $ta[1] ; ?></option>
      <option value="<?php echo $ta[2] ; ?>"><?php echo $ta[2] ; ?></option>
    </select>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="THNameInput">ชื่อ (ไทย)</label>  
  <div class="col-md-4">
  <input id="THFirstnameInput" name="THFirstnameInput" type="text" placeholder="" class="form-control input-md" required="" value="<?php echo $th_firstname ; ?>">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="THLastnameInput">นามสกุล (ไทย)</label>  
  <div class="col-md-4">
  <input id="THLastnameInput" name="THLastnameInput" type="text" placeholder="" class="form-control input-md" value="<?php echo $th_lastname ; ?>" required="">
    
  </div>
</div>
<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="THPrefixInput">คำนำหน้าชื่อ (อังกฤษ) </label>
  <div class="col-md-1">
    <select id="ENPrefixInput" name="ENPrefixInput" class="form-control">
      <option value="<?php echo $ea[0] ; ?>"><?php echo $ea[0] ; ?></option>
      <option  value="<?php echo $ea[1] ; ?>"><?php echo $ea[1] ; ?></option>
      <option value="<?php echo $ea[2] ; ?>"><?php echo $ea[2] ; ?></option>
    </select>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="THNameInput">ชื่อ (อังกฤษ)</label>  
  <div class="col-md-4">
  <input id="THNameInput" name="ENFirstnameInput" type="text" placeholder="" class="form-control input-md" required="" value="<?php echo $en_firstname ; ?>" >
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="THLastnameInput">นามสกุล (อังกฤษ)</label>  
  <div class="col-md-4">
  <input id="THLastnameInput" name="ENLastnameInput" type="text" placeholder="" class="form-control input-md" required="" value="<?php echo $en_lastname ; ?>" >
    
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="OrderInput">ลำดับ</label>  
  <div class="col-md-1">
  <input id="OrderInput" name="OrderInput" type="text" placeholder="" class="form-control input-md">
    
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="FacultyInput">คณะ</label>
  <div class="col-md-3">
    <select id="FacultyInput" name="FacultyInput" class="form-control">
      <option value="1">คณะวิศวกรรมศาสตร์</option>
      <option value="2">คณะจิตวิทยา</option>
      <option value="3">คณะวิทยาศาสตร์</option>
    </select>
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="DegreeInput">ปริญญา</label>
  <div class="col-md-2">
    <select id="DegreeInput" name="DegreeInput" class="form-control">
      <option value="1">ปริญญาตรี</option>
      <option value="2">ปริญญาโท</option>
      <option value="3">ปริญญาเอก</option>
    </select>
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="GroupInput">กลุ่ม</label>
  <div class="col-md-2">
    <select id="GroupInput" name="GroupInput" class="form-control">
      <option value="1">1</option>
      <option value="2">2</option>
    </select>
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="HonorInput">เกียรตินิยม</label>
  <div class="col-md-1">
    <select id="HonorInput" name="HonorInput" class="form-control">
      <option value="1">อันดับ 1</option>
      <option value="2">อันดับ 2</option>
      <option value="0">-</option>
    </select>
  </div>
</div>

<!-- File Button --> 
<div class="form-group">
  <label class="col-md-4 control-label" for="PicPathInput">ตำแหน่งที่เก็บรูป</label>
  <div class="col-md-4">
    <input id="PicPathInput" name="PicPathInput" class="input-file" type="file" value="$picture_path">
  </div>
</div>
<!-- Button (Double) -->
<div class="form-group">
  <label class="col-md-4 control-label" for="SaveButton"></label>
  <div class="col-md-8">
    <input type="submit" id="SaveButton" name="SaveButton" class="btn btn-info" value="เก็บ"></button>
    <input type="reset" id="RemoveButton" name="RemoveButton" class="btn btn-info" value="ลบ"></button>
    <!-- <input type="reset" id="CancelButton" name="CancelButton" class="btn btn-danger" value="ยกเลิก"></button>
  --></div> 
</div>
</fieldset>
</form>

</div>
<!-- /.row -->
</body>
</html>
