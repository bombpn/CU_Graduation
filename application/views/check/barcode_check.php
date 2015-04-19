<!DOCTYPE html>
<html lang="th">

<head>
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
</head>

<body style="margin:0;padding:0">
<!-- Page Heading -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    เช็คชื่อ
                </h1>
                <div class="col-lg-9">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            FORM
                        </div>
                        <!--div class="panel-body">
                            Panel content
                        </div-->
                    </div>
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <!--h3 class="panel-title">Panel title</h3-->
                                <div class="col-xs-6">
                                    <img src="<?=base_url();?>GradPic/_blank_person.jpg" class="img-thumbnail" width="100%">
                                </div>
                                <div class="col-xs-6" align="center" valign="middle">
                                    <h3><i class="fa fa-fw fa-check-square"></i> บันทึกสำเร็จ</h3>
                                    <h3><i class="fa fa-fw fa-warning"></i> มีการข้ามลำดับ</h3>
                                    <h3><i class="fa fa-fw fa-times"></i> มีข้อผิดพลาด</h3>
                                    <h1 style="font-size:1100%;"># NO</h1>
                                    <h3>นายชื่อ นามสกุล</h3>
                                    <h3>Mr.Name Surname</h3>
                                    <h3>คณะวิศวกรรมศาสตร์</h3>
                                </div>
                            </div>
                        </div>
                        <!--div class="panel-body">
                            Panel content
                        </div-->
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">Panel title</h3>
                        </div>
                        <div class="panel-body">
                            <ul>
                            <?php
                            if(count($allgroup_in_schedule)>0){
                                foreach($allgroup_in_schedule as $group){
                                    //echo $schedule->schedule_id . " " . $schedule->date . " " . $schedule->start_time . " - " . $schedule->end_time . "<br>";
                            ?>
                                    
                                    <li><?=$group->attendance_order;?> : <?=$group->th_group_name;?></li>
                            <?php
                                }
                            }
                            ?>
                            </ul>
                        </div>
                    </div>
                </div>
                    
            </div>
        </div>   
    </div>
</div>
<!-- /.row -->
</body>
</html>
