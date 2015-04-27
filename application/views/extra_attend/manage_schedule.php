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
            <a href="<?=base_url();?>extra_attend/index" class="btn btn-link" title="Back">
                <i class="fa fa-chevron-circle-left fa-3x"></i>
            </a>
            | รายชื่อบัณฑิตที่ได้รับอนุญาต <small>Permitted Graduate</small>
        </h1>
        <div class="col-lg-12">
            <form class="form-horizontal" action="<?=base_url();?>extra_attend/add_student" method="POST">
                <fieldset>
                <?php
                    $place = $thisplace[0];
                ?>
                <input class="form-control input-md" name="SCHEDULE_schedule_id" value="<?=$place->schedule_id;?>" type="hidden"> 
                <div class="form-group">
                    <label class="col-md-1 control-label">สถานที่:</label>
                    <div class="col-md-9">  
                        <input class="form-control input-md" value="<?=$place->th_building;?> (<?=$place->en_building;?>)" readonly>         
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-1 control-label">วันที่:</label>
                    <div class="col-md-3">
                        <input class="form-control input-md" value="<?=$place->date;?>" readonly>         
                    </div>
                    <label class="col-md-2 control-label">เวลา:</label>
                    <div class="col-md-4">
                        <input class="form-control input-md" value="<?=$place->start_time;?> - <?=$place->end_time;?>" readonly>         
                    </div>
                </div>
                <hr>
                <div class="form-group">
                    <label class="col-md-1 control-label">รหัสนิสิต:</label>
                    <div class="col-md-3">
                        <input class="form-control input-md" name="STUDENT_student_id" placeholder="Student ID" required>
                    </div>
                    <label class="col-md-2 control-label" for="textinput">ผู้อนุญาต:</label>
                    <div class="col-md-4">
                    <select class="form-control" id="sel1" name="TEACHER_teacher_id">
                        <?php
                        foreach ($allteacher as $teacher) {
                            $id = $teacher->teacher_id;
                            $th = ($teacher->th_prefix).' '.($teacher->th_firstname).' '.($teacher->th_lastname);
                            echo "<option value=".$id.">".$th."</option>";
                        }
                        ?>
                    </select>   
                    </div>
                    <div class="col-md-2">
                            <input type="submit" class="btn btn-info" value="เพิ่มบัณฑิต">
                    </div> 
                </div>
                </fieldset>
            </form>
        </div>
        <table class="table table-striped">
        	<thead>
        		<tr>
                    <th>#</th>
                    <th>รหัสนิสิต</th>
                    <th>บัณฑิตที่ได้รับอนุญาตซ้อมในรอบนี้</th>
                    <th>อาจารย์ที่เป็นผู้อนุญาต</th>
                    <th>Manage</th>
                <tr>
        	</thead>
        	<tbody>
        		<?php
	            if (count($allthisstudent) > 0) {
                    $i = 0;
	            	foreach ($allthisstudent as $student) {
                        $teacher = $allthisteacher[$i];
                        $i++;
	            ?>
                <tr>
                    <td>
                        <?=$i;?>
                    </td>
                    <td>
                        <?=$student->student_id;?>
                    </td>
                    <td>
                        <?=$student->th_prefix;?> <?=$student->th_firstname;?> <?=$student->th_lastname;?><br>
                        <?=$student->en_prefix;?> <?=$student->en_firstname;?> <?=$student->en_lastname;?>
                    </td>
                    <td>
                        <?=$teacher->th_prefix;?> <?=$teacher->th_firstname;?> <?=$teacher->th_lastname;?><br>
                        <?=$teacher->en_prefix;?> <?=$teacher->en_firstname;?> <?=$teacher->en_lastname;?>
                    </td>
                    <td>
                        <a href="<?=base_url();?>extra_attend/delete_student/<?=$student->student_id;?>/<?=$student->SCHEDULE_schedule_id;?>/manage" class="btn btn-danger" title="Delete">
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