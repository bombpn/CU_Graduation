<?php
  $url = base_url();//."index.php/";
?>
<form class="form-horizontal" action="<?=$url?>report/printt" method="POST" target="_blank">
<fieldset>

<!-- Form Name -->
<h1 class="page-header">พิมพ์รายงาน <small>Print Report</small></h1>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-3 control-label" for="std-group">เลือกกลุ่มบัณฑิต</label>
  <div class="col-md-6">
    <select id="std-group" name="group" class="form-control">
      <!-- <option disabled selected hidden>เลือก</option> -->
      <!-- <option value="0">ทั้งหมด</option> -->
      <?php
        foreach ($group as $g) {
          echo '<option value="'. $g->group_id .'">';
          echo $g->th_group_name;
          echo "</option>";
        }
      ?>
    </select>
  </div>
</div>

<!-- Multiple Radios -->
<div class="form-group">
  <label class="col-md-3 control-label" for="round">เลือกรอบ</label>
  <div class="col-md-6">
  <div class="radio">
    <label for="round-1">
      <input name="round" id="round-1" value="1" checked="checked" type="radio">
      พิธีซ้อมรับพระราชทานปริญญาบัตรรอบที่ 1
    </label>
  </div>
  <div class="radio">
    <label for="round-2">
      <input name="round" id="round-2" value="2" type="radio">
      พิธีซ้อมรับพระราชทานปริญญาบัตรรอบที่ 2
    </label>
  </div>
  <div class="radio">
    <label for="round-3">
      <input name="round" id="round-3" value="3" type="radio">
      พิธีรับพระราชทานปริญญาบัตร
    </label>
  </div>
  </div>
</div>

<!-- Multiple Radios -->
<div class="form-group">
  <label class="col-md-3 control-label" for="printtype">พิมพ์รายงานเฉพาะ</label>
  <div class="col-md-6">
  <div class="radio">
    <label for="printtype-1">
      <input name="printtype" id="printtype-1" value="1" type="radio">
      รายชื่อบัณฑิตที่มา
    </label>
  </div>
  <div class="radio">
    <label for="printtype-2">
      <input name="printtype" id="printtype-2" value="2" checked="checked" type="radio">
      รายชื่อบัณฑิตที่ไม่มา
    </label>
  </div>
  <div class="radio" style="display: none;">
    <label for="printtype-3">
      <input name="printtype" id="printtype-3" value="3" type="radio">
      รายชื่อบัณฑิตทั้งหมด
    </label>
  </div>
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="download"></label>
  <div class="col-md-4">
    <button id="download" name="download" type="submit" class="btn btn-success">ดาวน์โหลด</button>
  </div>
</div>

</fieldset>
</form>
