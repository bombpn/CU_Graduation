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
            <small>Import Student</small>
        </h1>
<!-- Form Open-->
<form class="form-horizontal">
<fieldset>

<!-- Form Name -->
<legend>เพิ่มข้อมูลบัณฑิต</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="IDInput">ID</label>  
  <div class="col-md-2">
  <input id="IDInput" name="IDInput" type="text" placeholder="ID..." class="form-control input-md" required="">
    
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="THPrefixInput">คำนำหน้าชื่อ  (ไทย) </label>
  <div class="col-md-1">
    <select id="THPrefixInput" name="THPrefixInput" class="form-control">
      <option value="1">นาย</option>
      <option value="2">นาง</option>
      <option value="3">นางสาว</option>
    </select>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="THNameInput">ชื่อ (ไทย)</label>  
  <div class="col-md-4">
  <input id="THNameInput" name="THFirstameInput" type="text" placeholder="" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="THLastnameInput">นามสกุล (ไทย)</label>  
  <div class="col-md-4">
  <input id="THLastnameInput" name="THLastnameInput" type="text" placeholder="" class="form-control input-md" required="">
    
  </div>
</div>
<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="THPrefixInput">คำนำหน้าชื่อ (อังกฤษ) </label>
  <div class="col-md-1">
    <select id="ENPrefixInput" name="THPrefixInput" class="form-control">
      <option value="1">Mr.</option>
      <option value="2">Mrs.</option>
      <option value="3">Miss</option>
    </select>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="THNameInput">ชื่อ (อังกฤษ)</label>  
  <div class="col-md-4">
  <input id="THNameInput" name="ENFirstameInput" type="text" placeholder="" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="THLastnameInput">นามสกุล (อังกฤษ)</label>  
  <div class="col-md-4">
  <input id="THLastnameInput" name="ENLastnameInput" type="text" placeholder="" class="form-control input-md" required="">
    
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
    <input id="PicPathInput" name="PicPathInput" class="input-file" type="file">
  </div>
</div>
<!-- Button (Double) -->
<div class="form-group">
  <label class="col-md-4 control-label" for="SaveButton"></label>
  <div class="col-md-8">
    <button id="SaveButton" name="SaveButton" class="btn btn-info">เก็บ</button>
    <button id="ResetButton" name="ResetButton" class="btn btn-danger">ล้าง</button>
  </div>
</div>
</fieldset>
</form>

</div>
<!-- /.row -->
</body>
</html>
