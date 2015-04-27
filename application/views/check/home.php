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
            เช็คชื่อ <?=date("Y-m-d");?>
        </h1>
        <table class="table table-striped table-hover">
        	<thead>
        		<tr>
        			<th>ลำดับที่</th>
        			<th>วันที่</th>
        			<th>เวลาเริ่ม</th>
        			<th>เวลาสิ้นสุด</th>
        			<th>เช็คชื่อ</th>
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
                                <a href="<?=base_url();?>check/barcode_check/<?=$schedule->schedule_id?>" target="_blank" class="btn btn-primary"><i class="fa fa-fw fa-barcode"></i> เช็คโดยบาร์โค้ด</a>
                                <a href="<?=base_url();?>check/list_check/<?=$schedule->schedule_id?>" target="_blank" class="btn btn-primary"><i class="fa fa-fw fa-th-list"></i> เช็คตามรายชื่อ</a>
                            </td>
	            		</tr>
	            <?php
	            	}
	            }else{
	            ?>
            		<tr>
            			<td colspan="5">ไม่มีข้อมูล</td>
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
