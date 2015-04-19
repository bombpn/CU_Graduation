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
        แสดงตารางการซ้อม<br>
        เพิ่มตารางการซ้อม<br>

        ควรจะเป็นปฏิทิน <br>
        และตามด้วย Bullet แสดง Event <br>
        <hr>
        <?php
            echo $calendars;
          ?>


    </div>
</div>
<!-- /.row -->
</body>
</html>
