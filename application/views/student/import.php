<!DOCTYPE html>
<html lang="th">
<head>
    <title>CU Graduation</title>
    <!-- <link href="<?=base_url();?>css/calendar.css" rel="stylesheet"> -->
    <script>
        function changeENPrefixValue(){
          console.log('TH change');
          var tp = $("#THPrefixInput").val() ;
          if(tp =='นาย') $("#ENPrefixInput").val('Mr.') ;
          else if (tp =='นาง') $("#ENPrefixInput").val('Mrs.') ;
          else if (tp =='นางสาว') $("#ENPrefixInput").val('Miss') ;
            
        }
        function changeTHPrefixValue(){
          console.log('EN change');
          var ep = $("#ENPrefixInput").val() ;
          if(ep =='Mr.') $("#THPrefixInput").val('นาย') ;
          else if (ep =='Mrs.') $("#THPrefixInput").val('นาง') ;
          else if (ep =='Miss') $("#THPrefixInput").val('นางสาว') ;
            
        }
    </script>
</head>

<body>
<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
			เพิ่มรายชื่อ
            <small>Import Graduate</small>
        </h1>

<form class="form-horizontal" action="<?=base_url();?>student/import" method="POST">
<fieldset>

<!-- Form Name -->
<legend>เพิ่มข้อมูลบัณฑิต</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="IDInput">ID</label>  
  <div class="col-md-2">
  <input id="IDInput" name="IDInput" type="text" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="THPrefixInput">คำนำหน้าชื่อ </label>
  <div class="col-md-2">
    <select id="THPrefixInput" name="THPrefixInput" class="form-control" onchange="changeENPrefixValue()">
      <option value="นาย">นาย</option>
      <option value="นาง">นาง</option>
      <option value="นางสาว">นางสาว</option>
    </select>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="THNameInput">ชื่อ</label>  
  <div class="col-md-4">
  <input id="THNameInput" name="THFirstnameInput" type="text" placeholder="" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="THLastnameInput">นามสกุล</label>  
  <div class="col-md-4">
  <input id="THLastnameInput" name="THLastnameInput" type="text" placeholder="" class="form-control input-md" required="">
    
  </div>
</div>
<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="THPrefixInput">Prefix</label>
  <div class="col-md-2">
    <select id="ENPrefixInput" name="ENPrefixInput" class="form-control" onchange="changeTHPrefixValue()">
      <option value="Mr.">Mr.</option>
      <option value="Mrs.">Mrs.</option>
      <option value="Miss">Miss</option>
    </select>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="THNameInput">Firstname</label>  
  <div class="col-md-4">
  <input id="THNameInput" name="ENFirstnameInput" type="text" placeholder="" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="THLastnameInput">Lastname</label>  
  <div class="col-md-4">
  <input id="THLastnameInput" name="ENLastnameInput" type="text" placeholder="" class="form-control input-md" required="">
    
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="BarcodeInput">บาร์โค้ด</label>  
  <div class="col-md-2">
  <input id="BarcodeInput" name="BarcodeInput" type="text" placeholder="" class="form-control input-md">
    
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
      <?php 
        foreach ($facultyList as $fl){
          $fid =  $fl['faculty_id'] ; 
          $ftname = $fl['th_faculty_name'] ;
          $fename = $fl['en_faculty_name'] ;
          echo "<option value='$fid'>$ftname $fename</option> "; 
        }
      ?>
    </select>
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="DegreeInput">ปริญญา</label>
  <div class="col-md-2">
    <select id="DegreeInput" name="DegreeInput" class="form-control">
      <option value="ปริญญาตรี">ตรี</option>
      <option value="ปริญญาโท">โท</option>
      <option value="ปริญญาเอก">เอก</option>
    </select>
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="GroupInput">กลุ่ม</label>
  <div class="col-md-3">
    <select id="GroupInput" name="GroupInput" class="form-control">
      <?php 
        foreach ($groupList as $gl){
          $gid =  $gl['group_id'] ; 
          $gtname = $gl['th_group_name'] ;
          $gename = $gl['en_group_name'] ;
          echo "<option value='$gid'>$gtname $gename</option> "; 
        }
      ?>
    </select>
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="HonorInput">เกียรตินิยม</label>
  <div class="col-md-2">
    <select id="HonorInput" name="HonorInput" class="form-control">
      <option value="1">อันดับ 1</option>
      <option value="2">อันดับ 2</option>
      <option value="0">-</option>
    </select>
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="SaveButton"></label>
  <div class="col-md-8">
    <input type="submit" id="SaveButton" name="SaveButton" class="btn btn-info " value="เก็บ"></button>
    <input type="reset" id="ResetButton" name="ResetButton" class="btn btn-danger" value="ล้าง"></button>
  </div> 
</div>
</fieldset>
</form>

</div>
<!-- /.row -->
</body>
</html>