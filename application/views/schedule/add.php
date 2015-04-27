<!DOCTYPE html>
<html lang="th">
<head>
    <title>CU Graduation</title>
    <script src="<?=base_url();?>/js/chosen.jquery.js"></script>
    <link href= "<?=base_url();?>css/datepicker.css" rel="stylesheet">
    <link href= "<?=base_url();?>css/chosen.css" rel="stylesheet">
    <link href= "<?=base_url();?>css/jquery-ui-timepicker-addon.css" rel="stylesheet">

    <script src="<?=base_url();?>/js/chosen.order.jquery.js"></script>
    <script src="<?=base_url();?>/js/jquery-ui-timepicker-addon.js"></script>
    <script type="text/javascript">
            $("document").ready(function() {
                var schedule_populated = new Array();
                var textGroup = [];
                $('#schedule_group option').each(function(i){
                  textGroup[$(this).val()] = $(this).text();
                });
                $('select[multiple].chosen').chosen();
                var MY_SELECT = $($('select[multiple].chosen').get(0)); // BUG
                $('#groupAdd').click(function(){
                    var selection = MY_SELECT.getSelectionOrder();

                    console.log(textGroup);
                    $("#returnedArrangement").find("tr").remove();
                    $('#s1-order-list').empty();
                    schedule_populated=[];
                    $(selection).each(function(i){
                        $('#returnedArrangement').append("<tr><td>"+(i+1)+"</td><td>"+textGroup[selection[i]]+"</td></tr>");
                        schedule_populated.push(selection[i]);
                    });
                });
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

                $("#submit").click(function(){
                  //PREPARE FORM DATA
                  //event.preventDefault();
                  var formData = { date : $("#datepicker").val(),
                                  start_time : $("#starttime").val(),
                                  end_time : $("#stoptime").val(),
                                  type : $("#schedule_type").val(),
                                  round : $("#schedule_round").val(),
                                  PLACE_place_id : $("#schedule_place").val(),
                                  schedule_group_populated : schedule_populated
                  };
                  console.log(formData);
                  //BRING AJAX REQUEST ON!
                  $.ajax({
                    type: "POST",
                    url: '<?php echo base_url();?>schedule/addResult/',
                    dataType: 'json',
                    data: formData,
                    success: function(res){
                      alert(res.message);
                      window.location.href = res.redirect;
                    }
                  });
                });//submit
            });//document ready
    </script>
    <script type="text/javascript">
    //CHOSEN PLUGIN CONFIG
      var config = {
        '.chosen-select'           : {},
        '.chosen-select-deselect'  : {allow_single_deselect:true},
        '.chosen-select-no-single' : {disable_search_threshold:10},
        '.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
        '.chosen-select-width'     : {width:"95%"}
      }
      for (var selector in config) {
        $(selector).chosen(config[selector]);
      }
    </script>

</head>

<body>
<hr>
<!-- Page Heading -->
<div class="col-md-12">
<div class="row clearfix">
    <div class="col-lg-12">
        <h1 class="page-header">
            เพิ่มข้อมูล
            <small>Add</small>
        </h1>

    <!-- Form action="<?=base_url();?>schedule/formSubmit/" method="POST" -->
        <form class="form-horizontal">

          <!-- Date Picker -->
          <div class="form-group">
            <label class="col-md-4 control-label" for="datepicker">Date : </label>
            <div class="col-md-4">
              <input class="form-control input-md" type="text" name="datepicker" id="datepicker"></input>
            </div>
          </div>

          <!-- Time Picker -->
          <div class="form-group">
            <label class="col-md-4 control-label" for="starttime">Start time : </label>
            <div class="col-md-4">
              <input class="form-control input-md" type="text" name="starttime" id="starttime"></input>
            </div>
          </div>

          <!-- Time Picker -->
          <div class="form-group">
            <label class="col-md-4 control-label" for="stoptime">Stop time : </label>
            <div class="col-md-4">
              <input class="form-control input-md" type="text" id="stoptime" name="stoptime"></input>
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
                    <option value="Practice">รอบซ้อมรับ</option>
                    <option value="2">รอบพิธีการจริง</option>
                  </select>
                </div>
              </div>

              <!-- Select Basic -->
              <div class="form-group">
                <label class="col-md-4 control-label" for="schedule_group">Group : </label>
                <div class="col-md-4">
                  <select id="schedule_group" name="schedule_group" class="form-control chosen" multiple>
                    <option value=""></option>
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
                      <button type="button" id="groupAdd" name="groupAdd" class="btn btn-primary">Add : </button>
                      <div class="col-md-4">  <ol id="s1-order-list"></ol> </div>
                      <input type="hidden" name="schedule_group" id="total" value="">
                </div>
              </div>

              ข้อมูลลำดับกลุ่ม
              <!-- RETURN AJAX FETCH SCHEDULE BY schedule_date -->
              <div class="form-group">
              <div class="col-md-4"></div>
              <div class="col-md-4">
                <table class="table">
                <thead>
                  <tr>
                    <th>ลำดับที่</th>
                    <th>กลุ่ม</th>
                  </tr>
                </thead>
                <tbody id="returnedArrangement">

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
                          echo '<option value="'.$row->place_id.'">'.
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
                      echo '<option value="">ยังไม่มีข้อมูลลำดับกลุ่ม</option>';
                    }
                    ?>
                  </select>
                </div>
              </div>


            </form>
            <input id="submit" type="submit" name="submit" value="Submit" class="btn btn-primary">
        <hr>
    </div>
</div>
</div>

</body>
</html>
