<!DOCTYPE html>
<html lang="th">

<head>

    <title>CU Graduation</title>
    <!-- Ajax -->
    <script src="<?=base_url();?>/js/jquery_ajax.js"></script>
    <!-- Form -->
    <script src="<?=base_url();?>/js/jquery.form.js"></script>
    
    <script type="text/javascript">
        $("document").ready(function() {
            // $("#search").click(function(){
            //   //PREPARE FORM DATA
            //   event.preventDefault();
            //   var formData = { faculty_id : $("#faculty_id_search").val(),
            //                   th_faculty_name : $("#th_faculty_name_search").val(),
            //                   en_faculty_name : $("#en_faculty_name_search").val()
            //   };
            //   console.log(formData);
            //   //BRING AJAX REQUEST ON!
            //   $.ajax({
            //         type: "POST",
            //         url: '<?php echo base_url();?>faculty/search_faculty/>',
            //         dataType: 'json',
            //         data: formData,
            //         success: function(res){
            //           //alert(res.message);
            //           //window.location.href = res.redirect;
            //           // $('#123 td:nth-child(2)').html('<i class="fa fa-pencil"></i>');
            //         }
            //     });
            // });//search

            $('table#table1 tbody td div button.delete').click(function()
            {
                if (confirm("คุณต้องการลบใช่หรือไม่?"))
                {
                    var parent = $(this).parent().parent().parent();
                    var formData = { faculty_id : $(this).parent().parent().siblings('.faculty_id').children().text(),
                              th_faculty_name : $(this).parent().parent().siblings('.th_faculty_name').children().text(),
                              en_faculty_name : $(this).parent().parent().siblings('.en_faculty_name').children().text()
                    };
                    console.log(formData);
                    $.ajax(
                    {
                           type: "POST",
                           url: '<?php echo base_url();?>faculty/delete_faculty/>',
                           data: formData,
                           cache: false,
                        
                           success: function()
                           {
                                // alert("msg " + res.message);
                                parent.fadeOut('fast', function() {$(this).remove();});
                           }
                     });                
                }
            });
            $('table#table1 tbody td div button.edit').click(function()
            {
                th_name = $(this).parent().parent().siblings('.th_faculty_name');
                en_name = $(this).parent().parent().siblings('.en_faculty_name');
                th_name.children(".form-control").attr("value",th_name.children(".text").text());
                th_name.children(".form-control").attr("style","display: block;");
                th_name.children(".text").attr("style","display: none;");
                en_name.children(".form-control").attr("value",en_name.children(".text").text());
                en_name.children(".form-control").attr("style","display: block;");
                en_name.children(".text").attr("style","display: none;");
                

                $(this).parent().attr('style',"display: none;");
                $(this).parent().siblings('.edit').attr('style',"display: block;");
                // console.log($(this).siblings('.confirm').attr('style'));
            });
           
           $('table#table1 tbody td div button.confirm').click(function()
            {
                if (confirm("คุณต้องการบันทึกค่าที่แก้ไขใช่หรือไม่?"))
                {
                    var formData = { faculty_id : $(this).parent().parent().siblings('.faculty_id').children('.form-control').text(),
                                  th_faculty_name : $(this).parent().parent().siblings('.th_faculty_name').children('.form-control').attr("value"),
                                  en_faculty_name : $(this).parent().parent().siblings('.en_faculty_name').children('.form-control').attr("value")
                        };
                    // $(this).parent().parent().siblings('.th_faculty_name').children().prop('readonly',true);
                    // $(this).parent().parent().siblings('.en_faculty_name').children().prop('readonly',true);

                    th_name = $(this).parent().parent().siblings('.th_faculty_name');
                    en_name = $(this).parent().parent().siblings('.en_faculty_name');
                    th_name.children(".text").text(th_name.children(".form-control").attr('value'));
                    th_name.children(".form-control").attr("style","display: none;");
                    th_name.children(".text").attr("style","display: block;");
                    en_name.children(".text").text(en_name.children(".form-control").attr('value'));
                    en_name.children(".form-control").attr("style","display: none;");
                    en_name.children(".text").attr("style","display: block;");

                    $(this).parent().siblings('.manage').attr('style',"display: block;");
                    $(this).parent().attr('style',"display: none;");
                    // $(this).siblings('.confirm').value = "none";

                    console.log(formData);
                    $.ajax(
                    {
                           type: "POST",
                           url: '<?php echo base_url();?>faculty/edit_faculty/>',
                           data: formData,
                           cache: false,
                     });
                }
            });
            
            $('table#table1 tbody td div button.cancel').click(function()
            {
                if (confirm("คุณต้องการยกเลิกใช่หรือไม่?"))
                {
                    // $(this).parent().parent().siblings('.th_faculty_name').children().prop('readonly',true);
                    // $(this).parent().parent().siblings('.en_faculty_name').children().prop('readonly',true);
                    // $(this).siblings('.confirm').value = "none";

                    th_name = $(this).parent().parent().siblings('.th_faculty_name');
                    en_name = $(this).parent().parent().siblings('.en_faculty_name');
                    // th_name.children(".form-control").text(th_name.children(".text").attr('value'));
                    th_name.children(".form-control").attr("style","display: none;");
                    th_name.children(".text").attr("style","display: block;");
                    // en_name.children(".form-control").text(th_name.children(".text").attr('value'));
                    en_name.children(".form-control").attr("style","display: none;");
                    en_name.children(".text").attr("style","display: block;");


                    $(this).parent().siblings('.manage').attr('style',"display: block;");
                    $(this).parent().attr('style',"display: none;");
                }
            });

            // $('table#table1 tbody tr td button.search').click(function()
            // {
            //     var formData = { faculty_id : $(this).parent().siblings('.faculty_id').children().attr("value"),
            //                       th_faculty_name : $(this).parent().siblings('.th_faculty_name').children().attr("value"),
            //                       en_faculty_name : $(this).parent().siblings('.en_faculty_name').children().attr("value")
            //             };
            // });




        });
            // $('.button-primary').click(function(){
            //     alert("reach ajax Hooray!!!");
            //     console.log('submit clicked!!');
            //     id = $(this).prev('.id').text();
            //     p_type = $(this).prev('.p_type').text();

            //     value = [id ,p_type];
            //     //ajax POST
            //     $.ajax({
            //         url: '<?php echo base_url();?>faculty/search_faculty/>',
            //         type: 'POST',
            //         data: value,
            //         success: function() {

            //             console.log('result is show!!');
            //         }
            //     });
            // });   
    </script>
</head>

<body>
<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            รายชื่อคณะ
            <small>Faculty</small>
        </h1>
        
        <?php
        if($faculty_id_search == "" && $th_faculty_name_search == "" && $en_faculty_name_search == ""){
        ?>
            <a href="<?=base_url();?>faculty/load_add_faculty_page" class="btn btn-primary">
                เพิ่มคณะ <i class="fa fa-plus"></i>
            </a>
        <?php
            }else{
        ?>
            <h2 class="bg-primary">
            
                <a href="<?=base_url();?>faculty/index" class="btn btn-link">
                    <i class="fa fa-chevron-circle-left fa-2x" style="color: #fff;"></i>
                </a>
                | ผลการค้นหา <small style="color: #FFF;">(Search Result)</small>
            </h2>
            
        <?php
            }
        ?>
        <table class="table table-striped" id="table1">
        	<thead>
        		<tr>
                    <th>รหัสคณะ (id)</th>
                    <th>ชื่อคณะ</th>
                    <th>Faculty Name</th>
                    <th>Manage</th>
                <tr>
        	</thead>
        	<tbody>
            <form action="<?=base_url();?>faculty/search_faculty" method="POST">
            <!-- <form> -->
                <!-- <fieldset> -->
                <tr>
                    <td class="faculty_id">
                        <input class="form-control input-md" name="faculty_id" id="faculty_id" placeholder="รหัสคณะ (id)" value=<?=$faculty_id_search;?>>         
                    </td>
                    <td class="th_faculty_name">
                        <input class="form-control input-md" name="th_faculty_name" id="th_faculty_name" placeholder="ชื่อคณะ" value=<?=$th_faculty_name_search;?>>  
                    </td>
                    <td class="en_faculty_name">
                        <input class="form-control input-md" name="en_faculty_name" id="en_faculty_name" placeholder="Faculty Name" value=<?=$en_faculty_name_search;?>>
                    </td>
                    <td>
                        <!-- <button type="search" class="btn btn-info" id="search" name="search" value="Search">
                            <i class="fa fa-search"></i>
                        </button> -->
                        <input type="submit" class="btn btn-info" value="ค้นหา">
                    </td>
                    
                </tr>
                <!-- </fieldset> -->
            </form>
        		<?php
	            if(count($allfaculty)>0){
                    // $count = 0;
	            	foreach($allfaculty as $faculty){
	            ?>
                <!-- <form action="<?=base_url();?>faculty/load_edit_faculty_page" method="POST"> -->
                <!-- <form id="form1" method="POST"> -->
                    <!-- <fieldset> -->
	            		<tr>
	            			<td class="faculty_id">
                                <text name="faculty_id" id="faculty_id"><?=$faculty->faculty_id;?></text>
                            </td>
                            <td class="th_faculty_name">
                                <text class="text"><?=$faculty->th_faculty_name;?></text>
                                <input class="form-control" name="th_faculty_name" id="th_faculty_name" style="display: none;">
                            </td>
                            <td class="en_faculty_name">
                                <text class="text"><?=$faculty->en_faculty_name;?></text>
                                <input class="form-control" name="en_faculty_name" id="en_faculty_name" style="display: none;">
                            </td>
                            <td>
                                <div class="manage btn-group">
                                    <button type="button" id="edit" class="edit btn btn-primary" value="edit">
                                        <i class="fa fa-pencil"></i>
                                    </button>
                                    <button type="button" id="delete" class="delete btn btn-danger">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </div>
                                <div class="edit btn-group" style="display: none;">
                                    <button type="button" id="confirm" class="confirm btn btn-info" >
                                        <i class="fa fa-check"></i>
                                    </button>
                                    <button type="button" id="cancel" class="cancel btn btn-warning">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </div>
                            </td>
	            		</tr>
                    <!-- </fieldset> -->
                <!--/form-->
                    <!-- <tr>
                        <td class="id"><?=$faculty->faculty_id;?></td>
                        <td class="p_type"><?=$faculty->th_faculty_name;?></td>
                        <td class="en_faculty_name"><?=$faculty->en_faculty_name;?></td>
                        <td><input class="button-primary btn-primary" type="button" value="Delete"></td>
                    </tr> -->
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