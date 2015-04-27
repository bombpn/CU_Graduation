<!DOCTYPE html>
<html lang="th">

<head>

    <title>CU Graduation</title>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.js"></script> 
    <script src="http://malsup.github.com/jquery.form.js"></script> 
    <script type="text/javascript">
    //     $("document").ready(function() {
    //         $('table#table tbody td div button.delete').click(function()
    //         {
    //             if (confirm("คุณต้องการลบใช่หรือไม่?"))
    //             {
    //                 var parent = $(this).parent().parent().parent();
    //                 var formData = { teacher_id : $(this).parent().parent().siblings('.teacher_id').children().text(),
    //                         faculty_id : $(this).parent().parent().siblings('.faculty_id').children().text(),
    //                         th_prefix : $(this).parent().parent().siblings('.th_prefix').children().text(),
    //                         th_firstname : $(this).parent().parent().siblings('.th_firstname').children().text(),
    //                         th_lastname : $(this).parent().parent().siblings('.th_lastname').children().text(),
    //                         en_prefix : $(this).parent().parent().siblings('.en_prefix').children().text(),
    //                         en_firstname : $(this).parent().parent().siblings('.en_firstname').children().text(),
    //                         en_lastname : $(this).parent().parent().siblings('.en_lastname').children().text(),
    //                         tel_number : $(this).parent().parent().siblings('.tel_number').children().text()
    //                 };
    //                 console.log(formData);
    //                 $.ajax(
    //                 {
    //                        type: "POST",
    //                        url: '<?php echo base_url();?>teacher/delete_teacher/>',
    //                        data: formData,
    //                        cache: false,
                        
    //                        success: function()
    //                        {
    //                             // alert("msg " + res.message);
    //                             parent.fadeOut('fast', function() {$(this).remove();});
    //                        }
    //                  });                
    //             }
    //         });
    //     });
    </script>
</head>

<body>
<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            รายชื่ออาจารย์
            <small>Teacher</small>
        </h1>
        
        <a href="<?=base_url();?>teacher/load_add_teacher_page" class="btn btn-primary" title="Add">
            เพิ่มอาจารย์ <i class="fa fa-plus"></i> 
        </a>
        <a href="<?=base_url();?>teacher/load_search_teacher_page" class="btn btn-success" title="Search">
            ค้นหาอาจารย์ <i class="fa fa-search"></i> 
        </a>
        <?php
            if ($search == '1') {
        ?>
            <h2 class="bg-primary">
            
                <a href="<?=base_url();?>teacher/index" class="btn btn-link" title="Back">
                    <i class="fa fa-chevron-circle-left fa-2x" style="color: #FFF;"></i>
                </a>
                | ผลการค้นหา <small style="color: #FFF;">(Search Result)</small>
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
                    <th>รหัสอาจารย์ (ID)</th>
                    <th>ชื่ออาจารย์ (Name)</th>
                    <th>คณะ (Faculty)</th>
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
                        <?=$teacher->faculty_id;?>: <?=$teacher->th_faculty_name;?><br>
                        <?=$teacher->en_faculty_name;?>
                    <td>
                        <?=$teacher->tel_number;?>
                    </td>
                    <td>
                        <!-- <button type="submit" class="btn btn-primary">
                            <i class="fa fa-pencil"></i>
                        </button> -->
                        <div class="manage btn-group">
                            <a href="<?=base_url();?>teacher/load_edit_teacher_page/<?=$teacher->teacher_id;?>" class="btn btn-primary" title="Edit">
                                <i class="fa fa-pencil"></i>
                            </a>
                            <a href="<?=base_url();?>teacher/delete_teacher/<?=$teacher->teacher_id;?>" class="btn btn-danger" title="Delete">
                                <i class="fa fa-trash"></i>
                            </a>
                            <!-- <button type="button" id="delete" class="delete btn btn-danger">
                                <i class="fa fa-trash"></i>
                            </button> -->
                        </div>
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