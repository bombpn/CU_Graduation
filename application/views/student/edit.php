<!DOCTYPE html>
<html lang="th">
<head>
    <title>CU Graduation</title>
    <!-- <link href="<?=base_url();?>css/calendar.css" rel="stylesheet"> -->
    <script>
        var currentOrder = $('#OrderInput').val();
        var currentGroup = $('#GroupInput').val();
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
        function reloadLastOrder(){
              //PREPARE FORM DATA
              event.preventDefault();
              var g = $("#GroupInput").val() ;
              var formData = { opt : "group_change_on_edit" , group_id : g  };
              //BRING AJAX REQUEST ON!
              $.ajax({
                    type: "POST",
                    url: '<?php echo base_url();?>student/update_form/>',
                    dataType: 'json',
                    data: formData,
                    success: function(res){
                      $("#OrderInput").attr("readonly", false);
                      $('#OrderInput').val(res.order);
                      $("#OrderInput").attr("readonly", true);
                      console.log(currentGroup);
                      $("#DegreeInput").attr("readonly", false);
                      $('#DegreeInput').val(res.degree);
                      $("#DegreeInput").attr("readonly", true); 
                      //alert(res.message);
                      //window.location.href = res.redirect;
                      // $('#123 td:nth-child(2)').html('<i class="fa fa-pencil"></i>');
                    }
                });
            }
    </script>
</head>

<body>
<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header"> แก้ไขข้อมูลของบัณฑิต <small>Edit Graduate</small>
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
  <label class="col-md-4 control-label" for="THPrefixInput">คำนำหน้าชื่อ </label>
  <div class="col-md-2">
    <input id="THPrefixInput" name="THPrefixInput" class="form-control" value"<?=$th_prefix?>"></input>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="THNameInput">ชื่อ</label>  
  <div class="col-md-4">
  <input id="THFirstnameInput" name="THFirstnameInput" type="text" placeholder="" class="form-control input-md" required="" value="<?php echo $th_firstname ; ?>">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="THLastnameInput">นามสกุล</label>  
  <div class="col-md-4">
  <input id="THLastnameInput" name="THLastnameInput" type="text" placeholder="" class="form-control input-md" value="<?php echo $th_lastname ; ?>" required="">
    
  </div>
</div>
<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="THPrefixInput">Prefix</label>
  <div class="col-md-2">
    <input id="ENPrefixInput" name="ENPrefixInput" class="form-control" value"<?=$en_prefix?>"></input>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="THNameInput">Firstname</label>  
  <div class="col-md-4">
  <input id="THNameInput" name="ENFirstnameInput" type="text" placeholder="" class="form-control input-md" required="" value="<?php echo $en_firstname ; ?>" >
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="THLastnameInput">Lastname</label>  
  <div class="col-md-4">
  <input id="THLastnameInput" name="ENLastnameInput" type="text" placeholder="" class="form-control input-md" required="" value="<?php echo $en_lastname ; ?>" >
    
  </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label" for="GenderInput">เพศ</label>
  <div class="col-md-2">
    <select id="GenderInput" name="GenderInput" class="form-control">
      <option value="M" <?php if($gendere == "M") echo 'selected'?>>ชาย</option>
      <option value="F" <?php if($degree == "F") echo 'selected'?>>หญิง</option>
    </select>
  </div>
</div> 
<div class="form-group">
  <label class="col-md-4 control-label" for="BarcodeInput">บาร์โค้ด</label>  
  <div class="col-md-2">
  <input id="BarcodeInput" name="BarcodeInput" type="text" placeholder="" class="form-control input-md"  value="<?php echo $barcode ; ?>" >
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="OrderInput">ลำดับ</label>  
  <div class="col-md-1">
  <input id="OrderInput" name="OrderInput" type="text" placeholder="" class="form-control input-md" value="<?php echo $order ; ?>" readonly>
    
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="FacultyInput">คณะ</label>
  <div class="col-md-3">
    <select id="FacultyInput" name="FacultyInput" class="form-control" >
      <?php 
        if ($select_fid != 0)
        {
          foreach ($facultyList as $fl){
          $fid =  $fl['faculty_id'] ; 
          $ftname = $fl['th_faculty_name'] ;
          $fename = $fl['en_faculty_name'] ;
          if ($select_fid == $fid) echo "<option value='$fid' selected>$ftname $fename</option> "; 
         else echo "<option value='$fid'>$ftname $fename</option> "; 
        }
      }
      else {
        foreach ($facultyList as $fl){
          $fid =  $fl['faculty_id'] ; 
          $ftname = $fl['th_faculty_name'] ;
          $fename = $fl['en_faculty_name'] ;
          echo "<option value='$fid'>$ftname $fename</option> ";
      }
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
      <option value="ปริญญาตรี" <?php if($degree == "ปริญญาตรี") echo 'selected'?>>ตรี</option>
      <option value="ปริญญาโท" <?php if($degree == "ปริญญาโท") echo 'selected'?>>โท</option>
      <option value="ปริญญาเอก" <?php if($degree == "ปริญญาเอก") echo 'selected'?>>เอก</option>
    </select>
  </div>
</div> 

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="GroupInput">กลุ่ม</label>
  <div class="col-md-2">
    <select id="GroupInput" name="GroupInput" class="form-control" onchange="reloadLastOrder()">
      <?php 
      if ($select_gid != 0)
        {
        foreach ($groupList as $gl){
          $gid =  $gl['group_id'] ; 
          $gtname = $gl['th_group_name'] ;
          $gename = $gl['en_group_name'] ;
          if ($select_gid == $gid) echo "<option value='$gid' selected>$gtname $gename</option> ";
          else echo "<option value='$gid'>$gtname $gename</option> "; 
        }
      }
      else {
        foreach ($groupList as $gl){
          $gid =  $gl['group_id'] ; 
          $gtname = $gl['th_group_name'] ;
          $gename = $gl['en_group_name'] ;
          echo "<option value='$gid'>$gtname $gename</option> "; 
        }

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
      <option value="1" <?php if($honors == "1") echo 'selected'?>>อันดับ 1</option>
      <option value="2" <?php if($honors == "2") echo 'selected'?>>อันดับ 2</option>
      <option value="0" <?php if($honors == "0") echo 'selected'?>>-</option>
    </select>
  </div>
</div>

<!-- File Button --> 
<!-- <div class="form-group">
  <label class="col-md-4 control-label" for="PicPathInput">ตำแหน่งที่เก็บรูป</label>
  <div class="col-md-4">
    <input id="PicPathInput" name="PicPathInput" class="input-file" type="file" value="$picture_path">
  </div>
</div> -->
<!-- Button (Double) -->
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
