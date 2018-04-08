<style media="screen">
.notice {
  padding: 15px;
  background-color: #fafafa;
  border-left: 6px solid #7f7f84;
  margin-bottom: 10px;
  -webkit-box-shadow: 0 5px 8px -6px rgba(0,0,0,.2);
     -moz-box-shadow: 0 5px 8px -6px rgba(0,0,0,.2);
          box-shadow: 0 5px 8px -6px rgba(0,0,0,.2);
}
.notice-sm {
  padding: 10px;
  font-size: 80%;
}
.notice-lg {
  padding: 35px;
  font-size: large;
}
.notice-success {
  border-color: #80D651;
}
.notice-success>strong {
  color: #80D651;
}
.notice-info {
  border-color: #45ABCD;
}
.notice-info>strong {
  color: #45ABCD;
}
.notice-warning {
  border-color: #FEAF20;
}
.notice-warning>strong {
  color: #FEAF20;
}
.notice-danger {
  border-color: #d73814;
}
.notice-danger>strong {
  color: #d73814;
}
</style>
<div class="col-md-3">
  <div class="profile-sidebar">
    <!-- SIDEBAR USERPIC -->
    <div class="profile-userpic">
      <img src="http://www.bengaluruite.biz/web/it_forms/assets/pages/media/profile/profile_user.jpg" class="img-responsive" alt="">
    </div>
    <!-- END SIDEBAR USERPIC -->
    <!-- SIDEBAR USER TITLE -->
    <div class="profile-usertitle">
      <div class="profile-usertitle-name">
        <span class="hidden-xs">{{$DataCustomer->nama}}</span>
      </div>
      <div class="profile-usertitle-job">
      </div>
    </div>
    <!-- END SIDEBAR USER TITLE -->
    <!-- SIDEBAR MENU -->
    <?php
    $uri = Request::segment(2);
    ?>
    <div class="profile-usermenu">
      <ul class="nav">
        <li class="<?=($uri == 'dashboard') ? 'active':'';?>">
          <a href="/customer/dashboard">
          <i class="fa fa-user"></i>
          <span class="hidden-xs">Profile<span> </a>
        </li>
        <li class="<?=($uri == 'alamat') ? 'active':'';?>">
          <a href="/customer/alamat">
          <i class="fa fa-home"></i>
          <span class="hidden-xs">Alamat<span> </a>
        </li>
        <li class="<?=($uri == 'transaksi') ? 'active':'';?>">
          <a href="/customer/transaksi">
          <i class="fa fa-shopping-cart"></i>
          <span class="hidden-xs">Transaksi<span></a>
        </li>
        <!-- <li>
          <a href="#">
          <i class="glyphicon glyphicon-flag"></i>
          <span class="hidden-xs">My Wishlist <span></a>
        </li>
                        <li>
          <a href="#">
          <i class="glyphicon glyphicon-shopping-cart"></i>
          <span class="hidden-xs">Shopping Bag<span> </a>

        </li> -->

      </ul>
    </div>
    <!-- END MENU -->
  </div>
</div>
