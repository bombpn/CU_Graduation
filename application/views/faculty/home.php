<!DOCTYPE html>
<html lang="th">

<head>

    <title>CU Graduation</title>
    <script type="text/javascript">
        $("document").ready(function() {
            $("#search").click(function(){
              //PREPARE FORM DATA
              event.preventDefault();
              var formData = { faculty_id : $("#faculty_id_search").val(),
                              th_faculty_name : $("#th_faculty_name_search").val(),
                              en_faculty_name : $("#en_faculty_name_search").val()
              };
              console.log(formData);
              //BRING AJAX REQUEST ON!
              $.ajax({
                    type: "POST",
                    url: '<?php echo base_url();?>faculty/search_faculty/>',
                    dataType: 'json',
                    data: formData,
                    success: function(res){
                      //alert(res.message);
                      //window.location.href = res.redirect;
                      // $('#123 td:nth-child(2)').html('<i class="fa fa-pencil"></i>');
                    }
                });
            });
        });//search
        $("document").ready(function() {
            $("#form1").submit(function(){
              //PREPARE FORM DATA
              event.preventDefault();
              var formData = { faculty_id : $("#input#faculty_id").val(),
                              th_faculty_name : $("#input#th_faculty_name").val(),
                              en_faculty_name : $("#input#en_faculty_name").val()
              };
              console.log(formData);
              //BRING AJAX REQUEST ON!
              $.ajax({
                    type: "POST",
                    url: '<?php echo base_url();?>faculty/delete_faculty/>',
                    dataType: 'json',
                    data: formData,
                    success: function(res){
                      //alert(res.message);
                      //window.location.href = res.redirect;
                      $(form).remove();
                    }
                });
            });//delete
        });
    </script>
</head>

<body>
<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            รายชื่อคณะ
        </h1>
        
        <?php
        if($faculty_id_search == "" && $th_faculty_name_search == "" && $en_faculty_name_search == ""){
        ?>
            <a href="<?=base_url();?>faculty/load_add_faculty_page" class="btn btn-primary">
                add faculty <i class="fa fa-plus"></i>
            </a>
        <?php
            }else{
        ?>
            <h2 class="bg-primary">
            
                <a href="<?=base_url();?>faculty/index" class="btn btn-link">
                    <i class="fa fa-chevron-circle-left fa-2x" style="color: #fff;"></i>
                </a>
                | ผลการค้นหา
            </h2>
            
        <?php
            }
        ?>
        <table class="table table-striped">
        	<thead>
        		<tr>
                    <th>รหัสคณะ</th>
                    <th>ชื่อคณะ</th>
                    <th>Faculty Name</th>
                    <th>Manage</th>
                <tr>
        	</thead>
        	<tbody>
            <!-- <form action="<?=base_url();?>faculty/search_faculty" method="POST"> -->
            <!-- <form> -->
                <fieldset>
                <tr id="123">
                    <td>
                        <input class="form-control" name="faculty_id_search" id="faculty_id_search" placeholder="รหัสคณะ" value=<?=$faculty_id_search;?>>         
                    </td>
                    <td>
                        <input class="form-control" name="th_faculty_name_search" id="th_faculty_name_search" placeholder="ชื่อคณะ" value=<?=$th_faculty_name_search;?>>  
                    </td>
                    <td>
                        <input class="form-control" name="en_faculty_name_search" id="en_faculty_name_search" placeholder="Faculty Name" value=<?=$en_faculty_name_search;?>>
                    </td>
                    <td>
                        <button type="search" class="btn btn-info" id="search" name="search" value="Search">
                            <i class="fa fa-search"></i>
                        </button>
                    </td>
                </tr>
                </fieldset>
            <!-- </form> -->
        		<?php
	            if(count($allfaculty)>0){
                    // $count = 0;
	            	foreach($allfaculty as $faculty){
	            ?>
                <!-- <form action="<?=base_url();?>faculty/load_edit_faculty_page" method="POST"> -->
                <form id="form1" method="POST">
                    <fieldset>
	            		<tr>
	            			<td>
                                <input class="form-control" name="faculty_id" id="faculty_id" value=<?=$faculty->faculty_id;?> readonly>
                            </td>
                            <td>
                                <input class="form-control" name="th_faculty_name" id="th_faculty_name" value=<?=$faculty->th_faculty_name;?> readonly>
                            </td>
                            <td>
                                <input class="form-control" name="en_faculty_name" id="en_faculty_name"  value=<?=$faculty->en_faculty_name;?> readonly>
                            </td>
                            <td>
                                <button type="submit" class="btn btn-primary" value="edit">
                                    <i class="fa fa-pencil"></i>
                                </button>
                                <!-- <a href="<?=base_url();?>faculty/load_edit_faculty_page" class="btn btn-primary">
                                    <i class="fa fa-pencil"></i>
                                </a> -->
                                <!-- <a href="<?=base_url();?>faculty/delete_faculty/<?=$faculty->faculty_id;?>" class="btn btn-danger">
                                    <i class="fa fa-trash"></i>
                                </a> -->
                                <button id="delete" class="btn btn-danger">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </td>
	            		</tr>
                    </fieldset>
                </form>
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