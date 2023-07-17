<?php
 if (!isset($_SESSION['member_id'])) {
  exit() ;
}

include("../includes/db_connect.php");

$con = connect();


?>

<div class="container mt-5 " style="max-width: 1600px;">

<center> <h3 class="mt-3">แบบตรวจสอบประเมินคุณภาพการบันทึกเวชระเบียนผู้ป่วยนอก/ฉุกเฉิน Mwdical Record Audit Form (OPD/ER)</h3></center>

  <form>
    <div class="input-group">
      <input type="text" class="form-control" name="#" id="#" maxlength="13" placeholder="กรุณากรอกหมายเลข hn" required >
      <button class="btn btn-success" type="button" onclick="search_cid();"  ><i class="fa fa-search"></i> ค้นหาข้อมูล</button>
    </div>
  </form>



<div class="card  mt-5">
<table class=" text-center mt-2 mb-2 "   style="width: 100%;">
    <thead>
      <tr>
      <th style="width: 10%;">Hcode</th>
      <th style="width: 10%;">Hn</th>
      <th style="width: 10%;">Name</th>
      <th style="width: 15%;">Visit Date</th>
      <th style="width: 15%;">ช่วงเวลาที่ตรวจสอบ</th>
      <th style="width: 15%;">ถึง</th>
      <th style="width: 10%;">Diagnosis</th>
      <th style="width: 15%;">1st Visit Date</th>
        
      </tr>
    </thead>
  </table>
</div>



<div class="card mt-5">
<form action="#" method="POST">
<div class="col-12 text-right mt-1 mb-1 ">
<button type="submit" name="#" class="btn btn-primary">คำนวน</button>
</div>
  <table class="table table-striped table-bordered text-center">
    <thead>
      <tr>
        <th>No</th>
        <th>Contents</th>
        <th>NA</th>
        <th>Missing</th>
        <?php
        $sql = "SELECT * FROM tbl_audit_opd_subcontent";
        $r = $con->query($sql);
        while ($row = mysqli_fetch_array($r)) {
            $sc_name = $row["sc_name"];
            echo "<th>" . $sc_name . "</th>";
        }
        ?>
        <th>คะแนนที่ได้</th>
        <th>คะแนนเต็ม</th>
        
      </tr>
      
    </thead>


   
    <tbody class="text-center">
    <?php
        $sql1 = "SELECT * FROM tbl_audit_opd_content";
        $r1 = $con->query($sql1); 
        while ($row1 = mysqli_fetch_array($r1)) {
    ?> 
      <tr>
        <td><?= $row1["content_id"]; ?></td>
        <td><?= $row1["content_name"];?></td>
        <td>
        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="miss1" name="#" value="Y" >
        </div>
        </td>
        <td>
        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="miss2" name="#" value="Y" >
        </div>
        </td>
        <?php
        $sql = "SELECT * FROM tbl_audit_opd_subcontent";
        $r = $con->query($sql);
        $numColumns = mysqli_num_rows($r);
        for ($i = 0; $i < $numColumns; $i++) {
            $row = mysqli_fetch_array($r);
 
            echo '<td>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="cb'.$i.'" name="score'.$i.'" value="1">
                </div>
            </td>';
        }
        ?>
        <td>###</td>
        <td><?php echo $i ;?></td>
      </tr>
      <?php } ?>
    </tbody>
    
    
      <table class=" text-center  mt-2 mb-2 "   style="width: 100%;">
        <thead>
          <tr>
          <th style="width: 50%;">คะแนนเต็ม (Full score)</th>
          <th style="width: 50%;">คะแนนที่ได้ (Sum score)</th>
          </tr>
        </thead>
      </table>
    <hr>

  </table>
      <div class="col-11 text-right mt-3 mb-3">
         
         <button type="submit" name="#" class="btn btn-primary">บันทึก</button>
         <a href="?page=main" type="button" class="btn btn-danger">ยกเลิก</a>
      </div>

  </form>
  </div>








</div>




<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function() {
    // เมื่อกดปุ่ม "คำนวณ"
    $("button[name='#']").click(function(e) {
      e.preventDefault();
      
      var fullScore = 0; // คะแนนเต็ม
      var sumScore = 0; // คะแนนที่ได้

      // วนลูปหาคะแนนเต็มและคะแนนที่ได้ในแถวนั้น ๆ
      $("tbody tr").each(function(index) {
        var contentRow = $(this);
        var contentFullScore = parseInt(contentRow.find("td:last-child").text()); // คะแนนเต็มของแถวนั้น ๆ
        var contentSumScore = 0; // คะแนนที่ได้ในแถวนั้น ๆ

        // วนลูปหาคะแนนที่ได้ในแถวนั้น ๆ
        contentRow.find("input[type='checkbox']:checked").each(function() {
          var checkboxValue = parseInt($(this).val());
          contentSumScore += checkboxValue;
        });

        fullScore += contentFullScore;
        sumScore += contentSumScore;

        contentRow.find("td:last-child").prev().text(contentSumScore); // แสดงคะแนนที่ได้ในแถว
      });

      // แสดงคะแนนเต็มและคะแนนที่ได้ทั้งหมด
      $("table:last th:first-child").text("คะแนนเต็ม (Full score): " + fullScore);
      $("table:last th:last-child").text("คะแนนที่ได้ (Sum score): " + sumScore);


      
    });
  });
</script>

