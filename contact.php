<?php 
include_once("model/data.php"); ?>
<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title></title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
  <link rel="stylesheet" href="css/contact.css">
</script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>
  <?php 
  if (!isset($_SESSION["login"])) {
    header('Location: login.php');
  }
  if(isset($_REQUEST['logout'])){
    session_unset();
    header('Location: login.php');
  }
  if (isset($_REQUEST['submitadd'])) {
    $tenadd   = $_REQUEST['tenadd'];
    $emailadd = $_REQUEST['emailadd'];
    $phoneadd = $_REQUEST['phoneadd'];
    $ctyadd = $_REQUEST['ctyadd'];
    $addNhom  = $_REQUEST['addNhom'];

    danhba::addDB($tenadd, $emailadd, $phoneadd,$addNhom);
    header('Location: /contact.php');
  }
  elseif (isset($_REQUEST['submitnhomadd'])) {
    $nhomadd= $_REQUEST['nhomadd'];
    if ($nhomadd !="") {
      nhom::addNhom($nhomadd);
      header('Location: /contact.php');
    }
  }
  ?>
  <div class="modal fade" id="exampleModalnhom" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document" style="margin-top: 110px;">
      <form action="" method="get" accept-charset="utf-8">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Thêm nhãn</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">

            <div class="form-group row">
              <label for="inputEmail10" class="col-sm-2 col-form-label">Tên Nhãn:</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="nhomadd" id="inputEmail10" placeholder="Tên nhãn..">
              </div>
            </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="submitnhomadd" class="btn btn-primary" >Save changes</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document" style="margin-top: 110px;">
      <form action="" method="get" accept-charset="utf-8">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tạo địa chỉ liên hệ mới</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">

            <div class="form-group row">
              <label for="inputEmail3" class="col-sm-2 col-form-label"></label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="tenadd" id="inputEmail3" placeholder="Name">
              </div>
            </div>
            <div class="form-group row">
              <label for="inputEmail4" class="col-sm-2 col-form-label"></label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="emailadd" id="inputEmail4" placeholder="Email">
              </div>
            </div>
            <div class="form-group row">
              <label for="inputEmail5" class="col-sm-2 col-form-label"></label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="phoneadd" id="inputEmail5" placeholder="Số điện thoại..">
              </div>
            </div>
            <div class="form-group row">
              <label for="inputEmail5" class="col-sm-2 col-form-label"></label>
              <div class="col-sm-10">
                <input type="text" class="form-control" name="phoneadd" id="inputEmail5" placeholder="Chức danh và công ty...">
              </div>
            </div>
            <div class="form-group">
              <label for="exampleFormControlSelect1">Chọn nhóm</label>
              <select class="form-control" id="exampleFormControlSelect1" name="addNhom">
               <?php 
               $listnhom= nhom::getListNhom();
               foreach ($listnhom as $value) { ?>
                <option value="<?php echo $value->maNhom; ?>"><?php echo $value->tenNhom; ?></option>
              <?php }
              ?>

            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" name="submitadd" class="btn btn-primary" >Save changes</button>
        </div>
      </form>
    </div>
  </div>
</div>
<div class="page-topbar">
 <div class="logo-area"> </div>
 <div class="quick-area">
<button id="shiled-button"><i class="fa fa-bars" aria-hidden="true"></i></button>
  <ul class="pull-left info-menu  user-notify">
    <a class="danh-ba" href="contact.php">
      <img src="img/contacts_48dp.png" alt="contacts" id="menu_contacts"> <span id="danhba"> Danh bạ</span>
    </a>

  </ul>

  <div class="search-container">
    <form action="/action_page.php" class="search">
      <input type="text" placeholder="Search.." name="search" id="search">
      <button type="submit"><i class="fa fa-search"></i></button>
    </form>
  </div>
  
  <ul class="info-menu user-info info-top">
   <li class="profile">
     <a href="#" data-toggle="dropdown" class="toggle" aria-expanded="false">
       <img src="img/contacts_48dp.png" class="">
       <span style="color: #5f6368; font-weight: 600; font-family: 'Google Sans',Roboto,Arial,sans-serif;letter-spacing: 0.5px;"><?php 
       $asds = danhba::showname();
       echo $asds; ?><i class="fa fa-angle-down"></i></span>
     </a>
     <ul class="dropdown-menu profile fadeIn " style="top: -40px;">
      <li>
        <a href="#settings">
          <i class="fa fa-wrench"></i>
          Chào <span style="color: #5f6368; font-weight: 600;"><?php 
          $asds = danhba::showname();
          echo $asds; ?></span>
        </a>
      </li>
      <li>
        <a href="#profile">
          <i class="fa fa-user"></i>
          Profile
        </a>
      </li>

      <li class="last">
        <a href="?logout">
          <i class="fa fa-lock"></i>
         Log Out
        </a>
      </li>
    </ul>


  </li>
</ul>

</div>
</div>

<div class="page-sidebar expandit">
  <div class="sidebar-inner" id="main-menu-wrapper">
   <div class="profile-info row ">
     <div class="">
      <button class="btn-create-contacts" type="button" data-toggle="modal" data-target="#exampleModal">
        <span>
          <svg width="36" height="36" viewBox="0 0 36 36">
            <path fill="#34A853" d="M16 16v14h4V20z"></path>
            <path fill="#4285F4" d="M30 16H20l-4 4h14z"></path>
            <path fill="#FBBC05" d="M6 16v4h10l4-4z"></path>
            <path fill="#EA4335" d="M20 16V6h-4v14z"></path>
            <path fill="none" d="M0 0h36v36H0z"></path>
          </svg>
        </span>
        <span class="justify-content-center" id="taoLH" >Tạo liên hệ</span>

      </button>   

    </div>

  </div>

  <ul class="wraplist" style="height: auto;"> 
    <!--          <li class="menusection">Main</li>-->
    <li>
      <a href="">
        <span class="sidebar-icon">
          <i class="fas fa-user-alt"></i>
        </span> 
        <span class="menu-title">Danh bạ &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<?php $dsBDa = danhba::getListDB();
         echo count($dsBDa); ?>  </span>
      </a>
    </li>
    <li>
      <a href="">
        <span class="sidebar-icon">
          <i class="fas fa-history"></i>
        </span> 
        <span class="menu-title">Thường xuyên liên hệ</span>
      </a>
    </li>
    <li>
      <a href="">
        <span class="sidebar-icon">
          <i class="fas fa-copy"></i>
        </span> 
        <span class="menu-title">Liên hệ trùng lặp</span>
      </a>
    </li>
    <hr>
    <li class="nhan">
      <a href="#" title="" >
        <span class="sidebar-icon" style="padding-left: 10px;">
          <svg width="20" height="20" viewBox="0 0 24 24" class="NSy2Hd RTiFqe null tranform">
            <path fill="none" d="M0 0h24v24H0V0z"></path>
            <path d="M16.59 8.59L12 13.17 7.41 8.59 6 10l6 6 6-6-1.41-1.41z"></path>
          </svg>
        </span> 
        <span onclick="myFunction()"class="menu-title" style="padding-left: 10px;">Nhãn</span>
      </a>
      
    </li>
    <li>
      <ul class="item-nhan item-show" style="overflow-y: auto;">
        <?php 

        foreach ($listnhom as $value) { ?>
          <li><a href="?mn=<?php echo $value->maNhom; ?>" title="">
            <svg width="20" height="20" viewBox="0 0 24 24" class="NSy2Hd RTiFqe undefined"><path fill="none" d="M0 0h24v24H0V0z"></path><path d="M17.63 5.84C17.27 5.33 16.67 5 16 5L5 5.01C3.9 5.01 3 5.9 3 7v10c0 1.1.9 1.99 2 1.99L16 19c.67 0 1.27-.33 1.63-.84L22 12l-4.37-6.16zM16 17H5V7h11l3.55 5L16 17z"></path></svg>
            <?php echo $value->tenNhom; ?></a></li>
          <?php }
          ?>
          <li><a href="#" data-toggle="modal" data-target="#exampleModalnhom" title="#">
            <svg width="20" height="20" viewBox="0 0 24 24" class="NSy2Hd RTiFqe null"><path fill="none" d="M0 0h24v24H0V0z"></path><path d="M19 13h-6v6h-2v-6H5v-2h6V5h2v6h6v2z"></path></svg>
          Tạo nhãn</a></li>

      </ul>
    </li>
    <hr>
    <li>
      <a href="">
        <span class="sidebar-icon pl-2">
          <svg width="20" height="20" viewBox="0 0 24 24" class="NSy2Hd RTiFqe undefined"><path d="M4 15h2v3h12v-3h2v3c0 1.1-.9 2-2 2H6c-1.1 0-2-.9-2-2m4.41-7.59L11 7.83V16h2V7.83l2.59 2.59L17 9l-5-5-5 5 1.41 1.41z"></path></svg>
        </span> 
        <span class="menu-title">Nhập</span>
      </a>
    </li>
    <li>
      <a href="">
        <span class="sidebar-icon pl-2">
          <svg width="20" height="20" viewBox="0 0 24 24" class="NSy2Hd RTiFqe undefined"><path fill="none" d="M0 0h24v24H0V0z"></path><path d="M19.35 10.04C18.67 6.59 15.64 4 12 4 9.11 4 6.6 5.64 5.35 8.04 2.34 8.36 0 10.91 0 14c0 3.31 2.69 6 6 6h13c2.76 0 5-2.24 5-5 0-2.64-2.05-4.78-4.65-4.96zM19 18H6c-2.21 0-4-1.79-4-4 0-2.05 1.53-3.76 3.56-3.97l1.07-.11.5-.95C8.08 7.14 9.94 6 12 6c2.62 0 4.88 1.86 5.39 4.43l.3 1.5 1.53.11c1.56.1 2.78 1.41 2.78 2.96 0 1.65-1.35 3-3 3zm-5.55-8h-2.9v3H8l4 4 4-4h-2.55z"></path></svg>
        </span> 
        <span class="menu-title">Xuất</span>
      </a>
    </li>
    <li>
      <a href="">
        <span class="sidebar-icon pl-2">
          <svg width="20" height="20" viewBox="0 0 24 24" class="NSy2Hd RTiFqe undefined"><path fill="none" d="M0 0h24v24H0V0z"></path><path d="M19 8h-1V3H6v5H5c-1.66 0-3 1.34-3 3v6h4v4h12v-4h4v-6c0-1.66-1.34-3-3-3zM8 5h8v3H8V5zm8 12v2H8v-4h8v2zm2-2v-2H6v2H4v-4c0-.55.45-1 1-1h14c.55 0 1 .45 1 1v4h-2z"></path></svg>
        </span> 
        <span class="menu-title">In</span>
      </a>
    </li>
    <hr>
    <li>
      <a href="">
        <span class="sidebar-icon pl-2">
          <svg width="20" height="20" viewBox="0 0 24 24" class="NSy2Hd RTiFqe undefined"><path fill="none" d="M0 0h24v24H0V0z"></path><path d="M20.54 5.23l-1.39-1.68C18.88 3.21 18.47 3 18 3H6c-.47 0-.88.21-1.16.55L3.46 5.23C3.17 5.57 3 6.02 3 6.5V19c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V6.5c0-.48-.17-.93-.46-1.27zM6.24 5h11.52l.81.97H5.44l.8-.97zM5 19V8h14v11H5zm8.45-9h-2.9v3H8l4 4 4-4h-2.55z"></path></svg>
        </span> 
        <span class="menu-title">Liên hệ khác</span>
      </a>
    </li>
  </ul>
  </div>  
</div>
<section id="main-content">
 <section class="wrapper main-wrapper row">        
  <div class="row dsDanhBa">
    <div class="col-3">
      <span class="pl-5">Tên</span>
    </div>
    <div class="col-4">
      <span class="pl-5">Email</span>
    </div>
    <div class="col-2">
      <span>Số điện thoại</span>
    </div>
    <div class="col-3">
      <span>Chức danh và công ty</span>
    </div>
  </div>
  <hr style="width: 98%">
  <?php 
  if (isset($_REQUEST['mn'])) {
    $mn      = $_REQUEST['mn'];
    $dsBD = danhba::getListDBforNhom($mn);
  }
  else{
    $dsBD = danhba::getListDB(); }
    foreach ($dsBD as $value) { ?>
      <div class="form-check myrow">
       

          <div class="row pt-1 ">
            <div class="col-3">
              <span class="pl-4" style="color: #5f6368;"><?php echo $value->tendb; ?></span>
            </div>
            <div class="col-4">
              <span style="color: #5f6368;"><?php echo $value->emaildb; ?></span>
            </div>
            <div class="col-2">
              <span style="color: #5f6368;"><?php echo $value->sdtdb; ?></span>
            </div>
            <div class="col-3">
              <span style="color: #5f6368;"><?php echo $value->ctydb; ?></span>
            </div>
          </div>

        </label>
      </div>
    <?php }

    ?>

  </section>
</section>
<script type="text/javascript">
  $(document).ready(function() {
    
    $('button#shiled-button').click(function() {
      if ($('.page-sidebar').hasClass('expandit')){
        $('.page-sidebar').addClass('collapseit');
        $('.page-sidebar').removeClass('expandit');
        $('.profile-info').addClass('short-profile');
        $('.logo-area').addClass('logo-icon');
        $('#main-content').addClass('sidebar_shift');
        $('.menu-title').css("display", "none");
        $('#taoLH').css('display', 'none');
      } else {
        $('.page-sidebar').addClass('expandit');
        $('.page-sidebar').removeClass('collapseit');
        $('.profile-info').removeClass('short-profile');
        $('.logo-area').removeClass('logo-icon');
        $('#main-content').removeClass('sidebar_shift');
        $('.menu-title').css("display", "inline-block");
        $('#taoLH').css({'display': 'inline-block', 'transition' : 'all 5s'});
      }
    });

    $('li.nhan').click(function() {
      if ( $('svg.NSy2Hd.RTiFqe.null').hasClass('notranform')) {
       $('svg.NSy2Hd.RTiFqe.null').addClass('tranform');
       $('svg.NSy2Hd.RTiFqe.null').removeClass('notranform');
       $('.item-nhan').addClass('item-show');
       $('.item-nhan').removeClass('item-hidden');
     } else{
      $('svg.NSy2Hd.RTiFqe.null').removeClass('tranform');
      $('svg.NSy2Hd.RTiFqe.null').addClass('notranform');

      $('.item-nhan').addClass('item-hidden');
      $('.item-nhan').removeClass('item-show');

    }
  });
    $("#search").on("keyup", function() {
      var value = $(this).val().toLowerCase();
      $(".myrow").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
      });
    });
    function myFunction() {
  alert("Hello! I am an alert box!");
}
  });
</script>
</body>
</html>