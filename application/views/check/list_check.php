<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>CU Graduation</title>
    <!-- Bootstrap Core CSS -->
    <link href="<?=base_url();?>/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?=base_url();?>/css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?=base_url();?>/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- jQuery -->
    <script src="<?=base_url();?>/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?=base_url();?>/js/bootstrap.min.js"></script>


    <script type="text/javascript">
        function edit_transaction(student_id,schedule_id,operations){
            var url = "<?=base_url();?>index.php/check/";
            if(operations=='create') url = url + "create_transaction/";
            else if(operations=='remove') url = url + "remove_transaction/";
            url = url + student_id + "/" + schedule_id;
            
            $.ajax({
                type: "post",
                url: url,
                cache: false,               
                data: $('#userForm').serialize(),
                success: function(json){                        
                    try{        
                        var obj = jQuery.parseJSON(json);
                        //alert( obj['STATUS']);
                                
                        
                    }catch(e) {     
                        //alert('Exception while request..' + e);
                    }       
                },
                error: function(){                      
                    //alert('Error while request..');
                }
            });
            /*
            //alert(student_id + " " + schedule_id + " " + operations);
            
            //document.write(number + " " + result);
            var url = "<?=base_url();?>check/";
            if(operations=='create') url = url + "create_transaction/";
            else if(operations=='remove') url = url + "remove_transaction/";
            url = url + student_id + "/" + schedule_id;
            var pmeters = "CU_GRAD";
            

            receiveReq = new getHttpRequest();
            receiveReq.open("POST",url,true);
            
            alert("xxx");
            receiveReq.setRequestHeader("Content-type","application/x-www-form-urlencoded");
            receiveReq.setRequestHeader("Content-length",pmeters.length);
            receiveReq.setRequestHeader("Connection","close");
            receiveReq.send(pmeters);
            
            receiveReq.onreadystatechange = function(){
                if(receiveReq.readyState==3){
                    //document.getElementById("resultx").innerHTML = "Loading";
                }
                
                if(receiveReq.readyState==4){
                    if(receiveReq.status==200){
                        //document.getElementById("resultx").innerHTML = receiveReq.responseText;
                        alert("XXX");
                    }
                }
            }
            */
            
        }
    </script>
</head>

<body style="margin-top:15px;padding:0">
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <!--button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">CU Graduation</a-->

            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> กลุ่มที่มีการซ้อม วันที่ <?=$schedule_detail->date;?>
                                เวลา <?=$schedule_detail->start_time;?> - <?=$schedule_detail->end_time;?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <?php
                            $has_some_group = false;
                            if(count($allgroup_in_schedule)>0){
                                $has_some_group = true;
                                foreach($allgroup_in_schedule as $group){
                                    //echo $schedule->schedule_id . " " . $schedule->date . " " . $schedule->start_time . " - " . $schedule->end_time . "<br>";
                            ?>
                                    
                                    <li <?php if($attendance_order == $group->attendance_order) echo "class='active'";?>>
                                        <a href="<?=base_url();?>check/list_check/<?=$schedule_detail->schedule_id;?>/<?=$group->attendance_order;?>"><?=$group->attendance_order;?> : <?=$group->th_group_name;?></a>
                                    </li>
                            <?php
                                }
                            }
                            ?>
                            <li <?php if($attendance_order == 0 || !$has_some_group) echo "class='active'";?>>
                                <a href="<?=base_url();?>check/list_check/<?=$schedule_detail->schedule_id;?>/0">ผู้ที่ซ้อมนอกรอบ</a>
                            </li>
                            
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
<!-- Page Heading -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12">
                <br>
                <h1 class="page-header">
                    เช็คชื่อ
                </h1>
                <div>
                    <?php
                    foreach($name_list as $student){
                    ?>
                        <div class="panel panel-<?=$student->color;?>" id="<?=$student->student_id;?>">
                            <div class="panel-heading">
                                <div class="row">
                                    <!--h3 class="panel-title">Panel title</h3-->
                                    <div class="col-xs-6 col-sm-4 col-md-2">
                                        <?php
                                        if(file_exists("GradPic/".$student->picture_path)) $imagePath = $student->picture_path;
                                        else $imagePath = "_blank_person.jpg"; 
                                        //if(!$has_data) $imagePath = "_blank_person.jpg"; 
                                        //else $imagePath = "";
                                        ?>
                                        <img src="<?=base_url();?>GradPic/<?=$imagePath;?>" class="img-thumbnail" width="100%">
                                    </div>
                                    <div class="col-xs-6 col-sm-4 col-md-2">
                                        <div class="btn-group" id = "<?=$student->student_id;?>" data-toggle="buttons">
                                            <label class="btn btn-default <?php if($student->checked == true) echo 'active';?>">
                                                <input type="radio" name="<?=$student->student_id;?>" id="<?=$student->student_id;?>" autocomplete="off" onchange="javascript:edit_transaction(<?=$student->student_id;?>,<?=$schedule_detail->schedule_id;?>,'create')" <?php if($student->checked == true) echo 'checked';?>> <i class="fa fa-check-circle fa-2x"></i>
                                            </label>
                                            <label class="btn btn-default  <?php if($student->checked == false) echo 'active';?>">
                                                <input type="radio" name="<?=$student->student_id;?>" id="<?=$student->student_id;?>" autocomplete="off" onchange="javascript:edit_transaction(<?=$student->student_id;?>,<?=$schedule_detail->schedule_id;?>,'remove')" <?php if($student->checked == false) echo 'checked';?>> <i class="fa fa-times-circle fa-2x"></i>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-4 col-md-8">
                                        <div class="col-xs-12">
                                            <?php if($student->prerequisite){ ?>
                                                <h3><i class="fa fa-fw fa-times"></i> มาซ้อมไม่ครบ</h3>
                                            <?php }?>
                                            <h4># <?=$student->order;?> (<?=$student->student_id;?>)</h4>
                                            <h4><?=$student->th_prefix;?><?=$student->th_firstname;?> <?=$student->th_lastname;?></h4>
                                            <h4><?=$student->en_prefix;?><?=$student->en_firstname;?> <?=$student->en_lastname;?></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
                    
            </div>
        </div>   
    </div>
</div>
<!-- /.row -->
</body>
</html>
