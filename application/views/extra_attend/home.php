<!DOCTYPE html>
<html lang="th">

<head>

    <title>CU Graduation</title>
</head>

<body>
<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            จัดการบัณฑิตที่ซ้อมนอกรอบ
        </h1>
            <form class="form-horizontal" action="<?=base_url();?>extra_attend/search_student" method="POST">
                <div class="form-group">
                    <label class="col-md-2 control-label">ค้นหาบัณฑิต:</label>
                    <div class="col-md-4">  
                        <input class="form-control input-md" name="student_id" placeholder="Student ID" required>       
                    </div>
                    <div class="col-md-2">
                            <input type="submit" class="btn btn-success" value="SEARCH">
                    </div> 
                </div>
            </form>
        <hr>
        <table class="table table-striped">
        	<thead>
        		<tr>
                    <th>#</th>
                    <th>Place</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Manage</th>
                <tr>
        	</thead>
        	<tbody>
        		<?php
                    $i = 0;
	            	foreach ($allschedule as $schedule) {
                        $i++;
	            ?>
                <tr>
                    <td>
                        <?=$i;?>
                    </td>
                    <td>
                        <?=$schedule->th_building;?><br>
                        <?=$schedule->en_building;?>
                    </td>
                    <td>
                        <?=$schedule->date;?>
                    </td>
                    <td>
                        <?=$schedule->start_time;?> - <?=$schedule->end_time;?>
                    </td>
                    <td>
                        <a href="<?=base_url();?>extra_attend/manage_schedule/<?=$schedule->schedule_id;?>" class="btn btn-primary" title="Edit">
                            <i class="fa fa-pencil"></i>
                        </a>
                    </td>
                </tr>
                <?php
                    }
                ?>
        	</tbody>
        </table>
            
    </div>
</div>
<!-- /.row -->
</body>
</html>