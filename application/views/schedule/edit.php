<!DOCTYPE html>
<html lang="th">
<head>
    <title>CU Graduation</title>
    <link href= "<?=base_url();?>css/datepicker.css" rel="stylesheet">
    <link href= "<?=base_url();?>css/jquery-ui-timepicker-addon.css" rel="stylesheet">
    <script src="<?=base_url();?>/js/jquery-ui-timepicker-addon.js"></script>
    <script type="text/javascript">
            $("document").ready(function() {
                $("#datepicker").datepicker();
                $("#starttime").timepicker();
                $("#stoptime").timepicker();
            });
    </script>
</head>

<body>
<hr>
<!-- Page Heading -->
<div class="col-md-12">
<div class="row clearfix">
    <div class="col-lg-12">
        <h1 class="page-header">
            แก้ไขข้อมูล
            <small>Edit</small>
        </h1>

    <!-- Form -->
        <form class="form-horizontal"><fieldset>

          <!-- Date Picker -->
          <div class="form-group">
            <label class="col-md-4 control-label" for="datepicker">Date : </label>
            <div class="col-md-4">
              <input class="form-control input-md" type="text" id="datepicker"></input>
            </div>
          </div>

          <!-- Time Picker -->
          <div class="form-group">
            <label class="col-md-4 control-label" for="starttime">Start time : </label>
            <div class="col-md-4">
              <input class="form-control input-md" type="text" id="starttime"></input>
            </div>
          </div>

          <!-- Time Picker -->
          <div class="form-group">
            <label class="col-md-4 control-label" for="stoptime">Stop time : </label>
            <div class="col-md-4">
              <input class="form-control input-md" type="text" id="stoptime"></input>
            </div>
          </div>

              <!-- Select Basic -->
              <div class="form-group">
                <label class="col-md-4 control-label" for="schedule_round">Round : </label>
                <div class="col-md-4">
                  <select id="schedule_round" name="schedule_round" class="form-control">
                    <option value="1">Option one</option>
                    <option value="2">Option two</option>
                  </select>
                </div>
              </div>

              <!-- Select Basic -->
              <div class="form-group">
                <label class="col-md-4 control-label" for="schedule_type">Type : </label>
                <div class="col-md-4">
                  <select id="schedule_type" name="schedule_type" class="form-control">
                    <option value="1">รอบซ้อมรับ</option>
                    <option value="2">รอบพิธีการจริง</option>
                  </select>
                </div>
              </div>

              <!-- Select Basic -->
              <div class="form-group">
                <label class="col-md-4 control-label" for="schedule_group">Group : </label>
                <div class="col-md-4">
                  <select id="schedule_group" name="schedule_group" class="form-control">
                    <option value="1">Option one</option>
                    <option value="2">Option two</option>
                  </select>
                </div>
                <div class="col-md-4">
                      <button id="singlebutton" name="singlebutton" class="btn btn-primary">Add : </button>
                </div>
              </div>

              <!-- RETURN AJAX FETCH SCHEDULE BY schedule_date -->
              <div class="form-group">
              <div class="col-md-4"></div>
              <div class="col-md-4">
                <table class="table">
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
                    <option value="1">Option one</option>
                    <option value="2">Option two</option>
                  </select>
                </div>
              </div>


            </fieldset></form>
        <hr>
    </div>
</div>
</div>

</body>
</html>
