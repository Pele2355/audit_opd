
    <nav class="navbar navbar-expand-lg sticky-top navbar-light bg-light justify-content-between">
        <a class="navbar-brand" href="../../audit_opd/">
          <img src="../../audit_opd/img/logo.jpg" class="d-inline-block align-top" alt="LOGO" width="30" height="30" >
  
          <span class="kanit_l textshadow" > ประเมินคุณภาพผู้ป่วยนอก </span>
        </a>
          <!-- Links -->
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
          <il><button class="btn btn-danger btn-sm"> *** ลงชื่อเข้าใช้งานเพื่อแสดงรายชื่อคนไข้ *** -></button></il>
         
        </ul>
   
            <?php if($logined) { ?>
                     
                <a class="my-2 my-sm-0 text-secondary" href="../../audit_opd/" data-toggle="tooltip" title="<?php echo $_SESSION['person']." (".$_SESSION['dep_name'].")"; ?>" data-placement="bottom" > <i class="fas fa-address-book fa-2x mr-3"></i></a>
                
                <a class="my-2 my-sm-0 text-warning" onclick="confirm_out();" id="bt_logout" href="#" data-toggle="tooltip" title="ออกจากระบบ" > <i class="fas fa-power-off fa-2x mr-3"></i></a>
          
            <?php } else { ?>
                <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#md-01" > <i class="fas fa-sign-in-alt mr-2"></i>เข้าสู่ระบบ</button>

            <?php } ?>
       
    </nav>
    <script>
      function confirm_out() {

        Swal.fire({
          title: "ต้องการออกจากระบบใช่ใหม?",
          text: "ควรออกจากระบบทุกครั้ง เมื่อเลิกใช้งาน",
          type: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#f46b02',
          cancelButtonColor: '#e0dcd9',
          confirmButtonText: "ออกจากระบบ",
        }).then((result) => {
          if (result.value) {
            window.location = '../../login/logout.php?url=audit_opd';
          }
        })

      }
      </script>


<!-- The Modal -->
<div class="modal" id="md-01">
    <div class="modal-dialog">
      <div class="modal-content">
  
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">ลงชื่อเข้าใช้ระบบ</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
  
        <!-- Modal body -->
        <div class="modal-body">
                <form id="login_bar" method="post" >
                <input type="hidden" name="url" id="url" value="audit_opd">
                <input type="hidden" name="page" id="page" value="<?php echo $page_logined;?>">
                    <div class="form-group">
                      <label for="email">ชื่อผู้ใช้:</label>
                      <div class="input-group mb-3">
                      <div class="input-group-prepend">
                            <span class="input-group-text"><i class="far fa-envelope"></i></span>
                        </div>
                      <input type="text" class="form-control" id="username" autocomplete="off" placeholder="ชื่อผู้ใช้" required >
                    </div>
                    </div>
                    <div class="form-group">
                      <label for="pwd">รหัสผ่าน:</label>
                      <div class="input-group mb-3">
                            <div class="input-group-prepend">

                                  <span class="input-group-text"><i class="fa fa-key"></i></span>
                              </div>
                      <input type="password" class="form-control" id="password" placeholder="รหัสผ่าน" required>
                      </div>
                    </div>
                    
                    <div class="form-group text-right ">
                      <button type="submit" id="btn_login" class="btn btn-primary "><i class="fas fa-sign-in-alt"></i> เข้าสู่ระบบ</button>
                    </div>
                  </form>
                  <span id="check_login"></span>
        </div>
  
       
  
      </div>
    </div>
  </div>
                    <script>
                    $('#login_bar').submit(function(e){
                      e.preventDefault();
                      var username = $("#username").val();
                      var password = $("#password").val();
                      var url = $("#url").val();
                      var page = $("#page").val();
 
                      $.post("../login/login_check.php",{username: username, password: password, url: url,page: page},
                        function(data){
                          var obj = jQuery.parseJSON(data);
                          //$('#check_login').html(obj.status);

                            if(obj.status=='ok'){

                              Swal.fire({
                                    title: "ลงชื่อเข้าใช้ระบบสำเร็จ",
                                    text: obj.person,
                                    closeOnClickOutside: false,
                                    type: "success"
                              }).then((result) => {
                                    if (result.value) {
                                      window.location = obj.url;
                                    }
                              });

                            } else {

                              Swal.fire({
                                title: "ลงชื่อเข้าใช้ ไม่สำเร็จ",
                                text: obj.warning,
                                closeOnClickOutside: false,
                                confirmButtonColor: '#f46b02',
                                type: "warning"
                                });

                            }

                      });

                    });
 
                    </script>
