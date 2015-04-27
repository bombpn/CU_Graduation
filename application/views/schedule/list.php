<!DOCTYPE html>
<html lang="th">
<head>
<style>
        .page-header-list{
            padding-bottom: 9px;
            margin: 0px 0 20px;
            border-bottom: 1px solid #eee;
        }
</style>
</head>
<body>
<!-- Page Heading -->
<div class="col-md-6">
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header-list">
            กำหนดการซ้อมทั้งหมด
        </h1>
        <table class="table">
          <thead>
            <tr>
              <th>ลำดับที่</th>
              <th>วันที่</th>
              <th>เวลาเริ่ม</th>
              <th>เวลาสิ้นสุด</th>
              <th>แก้ไข</th>
            <tr>
          </thead>
          <tbody>
            <?php
              if(count($allschedule)>0){
                foreach($allschedule as $schedule){
                //echo $schedule->schedule_id . " " . $schedule->date . " " . $schedule->start_time . " - " . $schedule->end_time . "<br>";
              ?>
                  <tr>
                    <td><?=$schedule->schedule_id;?></td>
                    <td><?=$schedule->date;?></td>
                    <td><?=$schedule->start_time;?></td>
                    <td><?=$schedule->end_time;?></td>
                    <td>
                      <a href="<?=base_url();?>schedule/editSchedule/<?=$schedule->schedule_id?>" class="btn btn-primary">แก้ไข</a>
                      <a href="<?=base_url();?>schedule/dropSchedule/<?=$schedule->schedule_id?>" class="btn btn-danger">ลบ</a>
                    </td>
                  </tr>
              <?php
                }
              }else{
              ?>
                <tr>
                  <td colspan="5">ไม่พบข้อมูลทั้งหมด</td>
                </tr>
              <?php
              }
              ?>
          </tbody>
        </table>
    </div>
</div>
</div>
<!-- /.row -->
</body>
</html>
