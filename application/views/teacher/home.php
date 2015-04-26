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
            รายชื่ออาจารย์
        </h1>
        
        <a href="<?=base_url();?>teacher/load_add_teacher_page" class="btn btn-primary">
            ADD TEACHER <i class="fa fa-plus"></i> 
        </a>
        <a href="<?=base_url();?>teacher/load_search_teacher_page" class="btn btn-success">
            SEARCH TEACHER <i class="fa fa-search"></i> 
        </a>
        <?php
            if ($search == '1') {
        ?>
            <h2 class="bg-primary">
            
                <a href="<?=base_url();?>teacher/index" class="btn btn-link">
                    <i class="fa fa-chevron-circle-left fa-2x" style="color: #FFF;"></i>
                </a>
                | ผลการค้นหา
            </h2>
            
        <?php
            }
        ?>
        <!--
        <table class="table">
            <
            <tbody>
            <form action="<?=base_url();?>teacher/search_teacher" method="POST">
                <fieldset>
                <tr>
                    <td>
                        <input class="form-control" name="teacher_id"  placeholder="รหัสอาจารย์" value=<?=$teacher_id_search;?>>         
                    </td>
                    <td>
                        <input class="form-control" name="th_prefix" placeholder="คำนำหน้า" value=<?=$th_prefix_search;?>><br>
                        <input class="form-control" name="en_prefix" placeholder="Prefix" value=<?=$en_prefix_search;?>>
                    </td>
                    <td>
                        <input class="form-control" name="th_firstname" placeholder="ชื่อ" value=<?=$th_firstname_search;?>><br>
                        <input class="form-control" name="en_firstname" placeholder="Firstname" value=<?=$en_firstname_search;?>>
                    </td>
                    <td>
                        <input class="form-control" name="th_lastname" placeholder="นามสกุล" value=<?=$th_lastname_search;?>><br>
                        <input class="form-control" name="en_lastname" placeholder="Lastname" value=<?=$en_lastname_search;?>>
                    </td>
                    <td>
                        <input type="submit" class="btn btn-info" value="Search">
                        </input>
                    </td>
                </tr>
                </fieldset>
            </form>
            </tbody>
        </table>
        -->
        <table class="table table-striped">
        	<thead>
        		<tr>
                    <th>รหัสอาจารย์ (Teacher ID)</th>
                    <th>ชื่ออาจารย์ (Teacher Name)</th>
                    <th>เบอร์โทรศัพท์ (Tel Number)</th>
                    <th>Manage</th>
                <tr>
        	</thead>
        	<tbody>
        		<?php
	            if (count($allteacher) > 0) {
	            	foreach ($allteacher as $teacher) {
	            ?>
                <tr>
                    <td>
                        <?=$teacher->teacher_id;?>
                    </td>
                    <td>
                        <?=$teacher->th_prefix;?> <?=$teacher->th_firstname;?> <?=$teacher->th_lastname;?><br>
                        <?=$teacher->en_prefix;?> <?=$teacher->en_firstname;?> <?=$teacher->en_lastname;?>
                    </td>
                    <td>
                        <?=$teacher->tel_number;?>
                    </td>
                    <td>
                        <!-- <button type="submit" class="btn btn-primary">
                            <i class="fa fa-pencil"></i>
                        </button> -->
                        <a href="<?=base_url();?>teacher/load_edit_teacher_page/<?=$teacher->teacher_id;?>" class="btn btn-primary">
                            <i class="fa fa-pencil"></i>
                        </a>
                        <a href="<?=base_url();?>teacher/delete_teacher/<?=$teacher->teacher_id;?>" class="btn btn-danger">
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