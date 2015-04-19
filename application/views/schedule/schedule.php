<!DOCTYPE html>
<html lang="th">
<head>
    <title>CU Graduation</title>
    <link href="<?=base_url();?>css/calendar.css" rel="stylesheet">
    <script type="text/javascript">
        $(document).ready(function(){
          $(".cal-cell1").click(function(){
            $('.selected').removeClass("selected");
            $(this).addClass("selected");
            if($('.selected .date_content').text() !=''){
              console.log($('.selected .date_content').text());
              var month = "<?php echo $month; ?>";
              var day = $('.selected .date_content').text();
              var year = "<?php echo $year; ?>"
              console.log(day+"/"+month+"/"+year);
              window.location.replace('<?=base_url()?>schedule/showDate/'+year+"/"+month+"/"+day);
            }
          });
        });
    </script>
</head>

<body>
<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            ตารางการซ้อม
            <small>Schedule Manager</small>
        </h1>
        <a class="btn btn-primary" href="<?=base_url();?>schedule">Today</a>
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
