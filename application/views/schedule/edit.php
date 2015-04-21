<!DOCTYPE html>
<html lang="th">
<head>
    <title>CU Graduation</title>
    <link href= "<?=base_url();?>css/datepicker.css" rel="stylesheet">
    <link href= "<?=base_url();?>css/jquery-ui-timepicker-addon.css" rel="stylesheet">
    <script src="<?=base_url();?>/js/jquery-ui-timepicker-addon.js"></script>
    <script type="text/javascript">
            $("document").ready(function() {
                console.log("<?=$returnObject['date']?>");
                $("#datepicker").datepicker({
                  dateFormat: 'yy-mm-dd',
                });
                $("#starttime").timepicker({
                  showSecond: true,
                  timeFormat: 'HH:mm:ss'
                });
                $("#stoptime").timepicker({
                  showSecond: true,
                  timeFormat: 'HH:mm:ss'
                });
            });
    </script>
</head>

<body>
<!-- Page Heading -->
<div class="col-md-12">
<div class="row clearfix">
    <div class="col-lg-12">
        <h1 class="page-header">แก้ไขข้อมูล
            <small>Edit</small>
        </h1>
ท่านกำลังแก้ไข <br>
                      <table class="table">
                        <thead>
                          <tr>
                            <th>ลำดับที่</th>
                            <th>วันที่</th>
                            <th>เวลาเริ่ม</th>
                            <th>เวลาสิ้นสุด</th>
                          <tr>
                        </thead>
                        <tbody>
                          <?php
                            if(count($individual)>0){
                              foreach($individual as $schedule){
                            ?>
                                <tr>
                                  <td><?=$schedule->schedule_id;?></td>
                                  <td><?=$schedule->date;?></td>
                                  <td><?=$schedule->start_time;?></td>
                                  <td><?=$schedule->end_time;?></td>
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

        <!-- Form -->
            <form class="form-horizontal"><fieldset>

              <!-- Date Picker -->
              <div class="form-group">
                <label class="col-md-4 control-label" for="datepicker">Date : </label>
                <div class="col-md-4">
                  <input class="form-control input-md" type="text" id="datepicker" value="<?=$returnObject['date']?>"></input>
                </div>
              </div>

              <!-- Time Picker -->
              <div class="form-group">
                <label class="col-md-4 control-label" for="starttime">Start time : </label>
                <div class="col-md-4">
                  <input class="form-control input-md" type="text" id="starttime" value="<?=$returnObject['start_time']?>"></input>
                </div>
              </div>

              <!-- Time Picker -->
              <div class="form-group">
                <label class="col-md-4 control-label" for="stoptime">Stop time : </label>
                <div class="col-md-4">
                  <input class="form-control input-md" type="text" id="stoptime" value="<?=$returnObject['end_time']?>"></input>
                </div>
              </div>

                  <!-- Select Basic -->
                  <div class="form-group">
                    <label class="col-md-4 control-label" for="schedule_round">Round : </label>
                    <div class="col-md-4">
                      <select id="schedule_round" name="schedule_round" class="form-control">
                        <option value="1">1</option>
                        <option value="2">2</option>
                      </select>
                    </div>
                  </div>

                  <!-- Select Basic -->
                  <div class="form-group">
                    <label class="col-md-4 control-label" for="schedule_type">Type : </label>
                    <div class="col-md-4">
                      <select id="schedule_type" name="schedule_type" class="form-control">
                        <option value="1" <?php if($returnObject['type']=="Practice")echo "selected=selected"?>>รอบซ้อมรับ</option>
                        <option value="2" <?php if($returnObject['type']=="Graduation")echo "selected=selected"?>>รอบพิธีการจริง</option>
                      </select>
                    </div>
                  </div>

                  <!-- Select Basic -->
                  <div class="form-group">
                    <label class="col-md-4 control-label" for="schedule_group">Group : </label>
                    <div class="col-md-4">
                      <select id="schedule_group" name="schedule_group" class="form-control">
                        <?php
                        if(count($groups>0)){
                            foreach($groups as $row){
                              echo '<option value="'.$row->group_id.'">'.$row->group_id.' : '.$row->th_group_name.'</option>';
                            }
                        }else{
                          echo '<option value="">No Group Available</option>';
                        }
                        ?>
                      </select>
                    </div>
                    <div class="col-md-4">
                          <button id="addGroup" name="addGroup" class="btn btn-primary">Add Group to Schedule</button>
                    </div>
                  </div>

                  <!-- RETURN AJAX FETCH SCHEDULE BY schedule_date -->
                  <div class="form-group">
                  <div class="col-md-4"></div>
                  <div class="col-md-4">
                    <table class="table">
                      List Group in This Schedule
                    <thead>
                      <tr>
                        <th>ลำดับที่</th>
                        <th>กลุ่ม</th>
                      <tr>
                    </thead>
                    <tbody>
                        <td colspan ="5"> no data fetch </td>
                    </tbody>
                  </table>
                    </div>
                  <div class="col-md-4"></div>
                </div>

                  <br>

                  <!-- Select Basic -->
                  <div class="form-group">
                    <label class="col-md-4 control-label" for="schedule_place">Place : </label>
                    <div class="col-md-4">
                      <select id="schedule_place" name="schedule_place" class="form-control">
                        <?php
                        if(count($places>0)){
                            foreach($places as $row){
                              echo '<option value="
                              '.$row->place_id.
                              (($row->place_id==$returnObject['PLACE_place_id'])? '" selected="selected">' : '">').
                              $row->place_id.
                              ' : '
                              .$row->th_building.
                              ' : '.
                              'Floor/Room'.
                              ' : '.
                              $row->floor.
                              '/'.
                              $row->room.
                              '</option>';
                            }
                        }else{
                          echo '<option value="">No Group Available</option>';
                        }
                        ?>
                      </select>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-md-4"></div>
                    <div class="col-md-4"><button id="submit" name="submit" class="btn btn-primary">Submit</button></div>
                    <div class="col-md-4"></div>
                  </div>
                </fieldset></form>

            <hr>
        </div>
    </div>
    </div>

    </body>
    </html>
