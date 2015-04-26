<?php
  $url = base_url()."index.php/";
?>

<!DOCTYPE html>
<html lang="th">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Intania Computer Club">
    <meta name="robots" content="noindex">

    <title>CU Graduation</title>

    <!-- Bootstrap core CSS -->
    <link href="<?=base_url();?>css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?=base_url();?>css/cover.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="site-wrapper">

      <div class="site-wrapper-inner">

        <div class="cover-container">

          <div class="masthead clearfix">
            <div class="inner">
              <h3 class="masthead-brand">พิมพ์บาร์โค้ด</h3>
              <ul class="nav masthead-nav">
                <li id="nav-faculties"><a href="javascript:showFaculties()">Faculties</a></li>
                <li id="nav-individual"><a href="javascript:showIndividual()">Individual</a></li>
                <li id="nav-batch"><a href="javascript:showBatch()">Batch</a></li>
              </ul>
            </div>
          </div>

          <div class="inner cover">
            <div id="faculties">
              <h1 class="cover-heading">พิมพ์บัตรบาร์โค้ด <small>ตามคณะ</small></h1>
              <?php
                $n = 0;
                //var_dump($data);
                foreach ($data as $key => $value) {
                  echo "<a href=\"" . $url . "printbarcode/printt?type=1&id="
                   . $value["group_id"] . "\" class=\"btn btn-sm btn-default\"" 
                   . ">[" . $value["group_id"] . "] " 
                   . $value["th_group_name"] . "</a> ";
                }
              ?>
              </p>
            </div>
            <div id="individual">
              <h1 class="cover-heading">พิมพ์บัตรบาร์โค้ด <small>(รายบุคคล)</small></h1>
              <div class="row">
                <div class="input-group input-group-lg">
                  <input type="text" class="form-control" placeholder="พิมพ์เลขประจำตัวนิสิต 10 หลัก" id="individual-student-id">
                  <span class="input-group-addon" id="individual-result"></span>
                  <span class="input-group-btn">
                    <button type="submit" class="btn btn-warning btn-search" id="print-individual-btn">พิมพ์บัตร</button>
                  </span>
                </div>
              </div>
            </div>
            <div id="batch">
              <form id="batch-form" method="post" action="<?=$url?>printbarcode/printt?type=3">
                <h1 class="cover-heading">
                  พิมพ์บัตรบาร์โค้ด <small>(จำนวนมาก)</small>
                  <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modal-batch">
                    <i class="glyphicon glyphicon-list"></i> เลือกคณะ
                  </a>
                    <button type="submit" class="btn btn-warning">
                      <i class="glyphicon glyphicon-print"></i> พิมพ์บัตร
                    </button>
                </h1>
                <?php
                  foreach ($data as $key => $value) {
                    echo "<div id=\"batch-" . $value["group_id"] 
                    . "\" class=\"input-group\"><span class=\"input-group-addon\">[" 
                    . $value["group_id"] . "] " . $value["th_group_name"] 
                    . "</span><input id=\"batch-text-" . $value["group_id"] 
                    . "\" type=\"text\" class=\"form-control batch-text\" placeholder=\"พิมพ์ลำดับที่ หรือเลขประจำตัวนิสิต คั่นด้วยช่องว่าง\"></div>";
                  }
                ?>
                <!-- div id="debug" style="text-shadow:none;color:#333;" class="well well-sm">debug</div -->
                <input type="hidden" id="batch-data" name="batch-data" value="">
              </form>
            </div>
          </div>

          <!--div class="mastfoot">
            <div class="inner">
              <p><a href="http://www.facebook.com/ICC.Chula">Intania Computer Club</a> of <a href="http://www.eng.chula.ac.th">Chula Engineering</a> MMXIV</p>
            </div>
          </div-->

        </div>

      </div>

    </div>

    <div class="modal fade" id="modal-batch" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <h4 class="modal-title" id="myModalLabel">เลือกคณะ <small>คลิกเลือกคณะที่ต้องการ คลิกอีกครั้งเพื่อยกเลิก</small></h4>
          </div>
          <div class="modal-body">
            <div class="btn-group" data-toggle="buttons">

              <?php
                foreach ($data as $key => $value) {
                  echo "<label class=\"btn btn-default btn-sm\"><input id=\"batch-check-" 
                  . $value["group_id"] . "\" type=\"checkbox\">[" 
                  . $value["group_id"] . "] " . $value["th_group_name"] . "</label>";
                }
              ?>
              <!-- label class="btn btn-primary active">
                <input type="checkbox" checked> Option 1
              </label -->
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal">เรียบร้อย</button>
            <!-- button type="button" class="btn btn-primary"></button -->
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?=base_url();?>js/jquery-1.11.1.min.js"></script>
    <script src="<?=base_url();?>js/bootstrap.min.js"></script>
    <script type="text/javascript">
      var printable = false;
      var currentPage = 0;
      var pageID = ["", "#faculties", "#individual", "#batch"];
      function showFaculties() {
        $("#nav-individual").removeClass("active");
        $("#nav-batch").removeClass("active");
        $("#nav-faculties").addClass("active");
        if (currentPage > 0) {
          $(pageID[currentPage]).fadeOut('fast', function() { $("#faculties").fadeIn('fast'); } );
        } else {
          $("#faculties").fadeIn('fast');
        }
        currentPage = 1;
      }
      function showIndividual() {
        $("#nav-faculties").removeClass("active");
        $("#nav-batch").removeClass("active");
        $("#nav-individual").addClass("active");
        if (currentPage > 0) {
          $(pageID[currentPage]).fadeOut('fast', function(){
          $("#individual").fadeIn('fast');
          $("#individual-student-id").focus();
        });
        } else {
          $("#individual").fadeIn('fast');
          $("#individual-student-id").focus();
        }
        currentPage = 2;
      }
      function showBatch() {
        $("#nav-faculties").removeClass("active");
        $("#nav-individual").removeClass("active");
        $("#nav-batch").addClass("active");
        if (currentPage > 0) {
          $(pageID[currentPage]).fadeOut('fast', function() { $("#batch").fadeIn('fast'); } );
        } else {
          $("#batch").fadeIn('fast');
        }
        currentPage = 3;
      }
      function showResult(str) {
        $("#individual-result").html(str);
        $("#individual-result").show();
      }
      function goToIndividualPrint() {
      	if (printable == true) {
      	  var sid = $("#individual-student-id").val();
      	  $("#individual-student-id").val("");
      	  window.location.href = "<?=$url;?>printbarcode/printt?type=2&sid=" + sid;
      	}
      }
      function validateID() {
        if ($("#individual-student-id").val().length == 10) {
        	showResult("โปรดรอสักครู่...");
          $.ajax({
            type: 'POST',
            url: '<?=$url;?>printbarcode/ajax_student_check',
            data: 'sid=' + $("#individual-student-id").val()
          }).done(function(data) {
            if (data == "") {
              showResult("ไม่สามารถค้นหาได้");
              printable = false;
            } else {
              var res = data.split("|");
              if (res[0] == "1") {
                showResult(res[1]);
              	printable = true;
              } else {
                showResult("ไม่พบนิสิต");
              	printable = false;
              }
            }
          });
        } else {
           $("#individual-result").hide();
        }
      }
      function processBatch() {
        var i = 1;
        var out = "";
        $(".batch-text").each(function(){
          var s = $(this).val().trim().split(" ");
          for (j = 0; j < s.length; j++) {
            if (s[j] != "") {
              out += i + "|" + s[j] + " ";
            }
          }
          i++;
          $(this).val("");
        });
        out = out.trim();
        /*$("#debug").html(out);*/
        $("#batch-data").val(out);
      }
      $("#print-individual-btn").click(function(){
      	goToIndividualPrint();
      });
      $("#modal-batch input[type='checkbox']").change(function() {
        if(this.checked) {
          $("#batch-" + $(this).attr("id").substring(12)).show();
        } else {
          $("#batch-" + $(this).attr("id").substring(12)).hide();
          $("#batch-text-" + $(this).attr("id").substring(12)).val("");
        }
      });
      $("#batch-form").submit(function(e){
        e.preventDefault();
        processBatch();
        this.submit();
        return false;
      });
      $(document).ready(function(){
        $("#individual-result").hide();
        showFaculties();
        $("#individual-student-id").attr('maxlength','10');
        $("#individual-student-id").keyup(function (e) {
          validateID();
        });
        $("#individual-student-id").keypress(function (e) {
          if (e.which == 13) {
            e.preventDefault();
            goToIndividualPrint();
          } /*else if (e.which != 8 && e.which != 0 && e.which != 13 && (e.which < 48 || e.which > 57)) {
            return false;
          }*/
        });
        $("#batch .input-group").each(function(){
          $(this).hide();
        });
      });
    </script>
  </body>
</html>
