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
            รายชื่อคณะ
        </h1>
        <table class="table table-striped">
        	<thead>
        		<tr>
                    <th>รหัสคณะ</th>
                    <th>ชื่อคณะ</th>
                    <th>Faculty Name</th>
                    <th>Edit</th>
                <tr>
        	</thead>
        	<tbody>
                <tr>
                    <td>
                        <input type="email" class="form-control" id="faculty_id" placeholder="รหัสคณะ">         
                    </td>
                    <td>
                        <input type="email" class="form-control" id="th_faculty_name" placeholder="ชื่อคณะ">  
                    </td>
                    <td>
                        <input type="email" class="form-control" id="en_faculty_name" placeholder="Faculty Name">
                    </td>
                    <td>
                        <a href="#" class="btn btn-primary">
                            <i class="fa fa-plus"></i>
                        </a>
                    </td>
                </tr>
        		<?php
	            if(count($allfaculty)>0){
	            	foreach($allfaculty as $faculty){
	            	//echo $schedule->schedule_id . " " . $schedule->date . " " . $schedule->start_time . " - " . $schedule->end_time . "<br>";
	            ?>
	            		<tr>
	            			<td><?=$faculty->faculty_id;?></td>
	            			<td><?=$faculty->th_faculty_name;?></td>
	            			<td><?=$faculty->en_faculty_name;?></td>
                            <td>
                                <a href="#" class="btn btn-primary">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                <a href="#" class="btn btn-danger">
                                    <i class="fa fa-trash"></i>
                                </a>
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