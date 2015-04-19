<!DOCTYPE html>
<html lang="th">
<head>
    <title>CU Graduation</title>
    <link href="<?=base_url();?>css/calendar.css" rel="stylesheet">
</head>

<body>
<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            ตารางการซ้อม
            <small>Schedule Manager</small>
        </h1>

        <?php
            echo $calendars;
          ?>
          <hr>
            <a href ="<?=base_url();?>schedule/addSchedule"  class="btn btn-primary" >Add New Group</a>
            <a href ="<?=base_url();?>schedule/editSchedule"  class="btn btn-warning" >Edit Existing Group</a>
    </div>
</div>
<!-- /.row -->
</body>
</html>
