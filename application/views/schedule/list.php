<!DOCTYPE html>
<html lang="th">
<head>
    <title>CU Graduation</title>
</head>

<body>
<!-- Page Heading -->
<div class="col-md-12">
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            All Schedule
        </h1>
        <br>
        <table class="table">
          <thead>
            <tr>
              <th>ลำดับที่</th>
              <th>วันที่</th>
              <th>เวลาเริ่ม</th>
              <th>เวลาสิ้นสุด</th>
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




        <hr>
    </div>
</div>
</div>
<!-- /.row -->
</body>
</html>
