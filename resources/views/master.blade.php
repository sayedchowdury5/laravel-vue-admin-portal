<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="{{asset('js/bootstrap.js')}}"></script>
<script src="{{mix('js/app.js')}}"></script>
<link rel="stylesheet" href="{{mix('css/app.css')}}">

<style>
body {
    position: relative;
    overflow-x: hidden;
    background-color: #CFD8DC;
}
body,
html { height: 100%;}
.nav .open > a,
.nav .open > a:hover,
.nav .open > a:focus {background-color: transparent;}

/*-------------------------------*/
/*           Wrappers            */
/*-------------------------------*/

#wrapper {
    padding-left: 0;
    -webkit-transition: all 0.5s ease;
    -moz-transition: all 0.5s ease;
    -o-transition: all 0.5s ease;
    transition: all 0.5s ease;
}

#wrapper.toggled {
    padding-left: 220px;
}

#sidebar-wrapper {
    z-index: 1000;
    left: 220px;
    width: 0;
    height: 100%;
    margin-left: -220px;
    overflow-y: auto;
    overflow-x: hidden;
    background: #1a1a1a;
    -webkit-transition: all 0.5s ease;
    -moz-transition: all 0.5s ease;
    -o-transition: all 0.5s ease;
    transition: all 0.5s ease;
}

#sidebar-wrapper::-webkit-scrollbar {
  display: none;
}

#wrapper.toggled #sidebar-wrapper {
    width: 220px;
}

#page-content-wrapper {
    width: 100%;
    /* padding-top: 70px; */
}

#wrapper.toggled #page-content-wrapper {
    position: absolute;
    margin-right: -220px;
}

/*-------------------------------*/
/*     Sidebar nav styles        */
/*-------------------------------*/
.navbar {
  padding: 0;
}

.sidebar-nav {
    position: absolute;
    top: 0;
    width: 220px;
    margin: 0;
    padding: 0;
    list-style: none;
}

.sidebar-nav li {
    position: relative;
    line-height: 20px;
    display: inline-block;
    width: 100%;
}

.sidebar-nav li:before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    z-index: -1;
    height: 100%;
    width: 3px;
    background-color: #1c1c1c;
    -webkit-transition: width .2s ease-in;
      -moz-transition:  width .2s ease-in;
       -ms-transition:  width .2s ease-in;
            transition: width .2s ease-in;

}
.sidebar-nav li:first-child a {
    color: #fff;
    background-color: #1a1a1a;
}
.sidebar-nav li:nth-child(5n+1):before {
    background-color: #ec1b5a;
}
.sidebar-nav li:nth-child(5n+2):before {
    background-color: #79aefe;
}
.sidebar-nav li:nth-child(5n+3):before {
    background-color: #314190;
}
.sidebar-nav li:nth-child(5n+4):before {
    background-color: #279636;
}
.sidebar-nav li:nth-child(5n+5):before {
    background-color: #7d5d81;
}

.sidebar-nav li:hover:before,
.sidebar-nav li.open:hover:before {
    width: 100%;
    -webkit-transition: width .2s ease-in;
      -moz-transition:  width .2s ease-in;
       -ms-transition:  width .2s ease-in;
            transition: width .2s ease-in;

}

.sidebar-nav li a {
    display: block;
    color: #ddd;
    text-decoration: none;
    padding: 10px 15px 10px 30px;
}

.sidebar-nav li a:hover,
.sidebar-nav li a:active,
.sidebar-nav li a:focus,
.sidebar-nav li.open a:hover,
.sidebar-nav li.open a:active,
.sidebar-nav li.open a:focus{
    color: #fff;
    text-decoration: none;
    background-color: transparent;
}
.sidebar-header {
    text-align: center;
    font-size: 20px;
    position: relative;
    width: 100%;
    display: inline-block;
}
.sidebar-brand {
    height: 65px;
    position: relative;
    background:#212531;
    background: linear-gradient(to right bottom, #2f3441 50%, #212531 50%);
   padding-top: 1em;
}
.sidebar-brand a {
    color: #ddd;
}
.sidebar-brand a:hover {
    color: #fff;
    text-decoration: none;
}
.dropdown-header {
    text-align: center;
    font-size: 1em;
    color: #ddd;
    background:#212531;
    background: linear-gradient(to right bottom, #2f3441 50%, #212531 50%);
}
.sidebar-nav .dropdown-menu {
    position: relative;
    width: 100%;
    padding: 0;
    margin: 0;
    border-radius: 0;
    border: none;
    background-color: #222;
    box-shadow: none;
}
.dropdown-menu.show {
    top: 0;
}
/*Fontawesome icons*/
.nav.sidebar-nav li a::before {
    font-family: fontawesome;
    content: "\f12e";
    vertical-align: baseline;
    display: inline-block;
    padding-right: 5px;
}
a[href*="#home"]::before {
  content: "\f015" !important;
}
a[href*="#about"]::before {
  content: "\f129" !important;
}
a[href*="#events"]::before {
  content: "\f073" !important;
}
a[href*="#events"]::before {
  content: "\f073" !important;
}
a[href*="#team"]::before {
  content: "\f0c0" !important;
}
a[href*="#works"]::before {
  content: "\f0b1" !important;
}
a[href*="#pictures"]::before {
  content: "\f03e" !important;
}
a[href*="#videos"]::before {
  content: "\f03d" !important;
}
a[href*="#books"]::before {
  content: "\f02d" !important;
}
a[href*="#art"]::before {
  content: "\f1fc" !important;
}
a[href*="#awards"]::before {
  content: "\f02e" !important;
}
a[href*="#services"]::before {
  content: "\f013" !important;
}
a[href*="#contact"]::before {
  content: "\f086" !important;
}
a[href*="#followme"]::before {
  content: "\f099" !important;
  color: #0084b4;
}
/*-------------------------------*/
/*       Hamburger-Cross         */
/*-------------------------------*/

.hamburger {
  position: fixed;
  /* top: 20px; */
  z-index: 999;
  display: block;
  width: 32px;
  height: 32px;
  margin-left: 15px;
  background: transparent;
  border: none;
}
.hamburger:hover,
.hamburger:focus,
.hamburger:active {
  outline: none;
}
.hamburger.is-closed:before {
  content: '';
  display: block;
  width: 100px;
  font-size: 14px;
  color: #fff;
  line-height: 32px;
  text-align: center;
  opacity: 0;
  -webkit-transform: translate3d(0,0,0);
  -webkit-transition: all .35s ease-in-out;
}
.hamburger.is-closed:hover:before {
  opacity: 1;
  display: block;
  -webkit-transform: translate3d(-100px,0,0);
  -webkit-transition: all .35s ease-in-out;
}

.hamburger.is-closed .hamb-top,
.hamburger.is-closed .hamb-middle,
.hamburger.is-closed .hamb-bottom,
.hamburger.is-open .hamb-top,
.hamburger.is-open .hamb-middle,
.hamburger.is-open .hamb-bottom {
  position: absolute;
  left: 0;
  height: 4px;
  width: 100%;
}
.hamburger.is-closed .hamb-top,
.hamburger.is-closed .hamb-middle,
.hamburger.is-closed .hamb-bottom {
  background-color: #1a1a1a;
}
.hamburger.is-closed .hamb-top {
  top: 5px;
  -webkit-transition: all .35s ease-in-out;
}
.hamburger.is-closed .hamb-middle {
  top: 50%;
  margin-top: -2px;
}
.hamburger.is-closed .hamb-bottom {
  bottom: 5px;
  -webkit-transition: all .35s ease-in-out;
}

.hamburger.is-closed:hover .hamb-top {
  top: 0;
  -webkit-transition: all .35s ease-in-out;
}
.hamburger.is-closed:hover .hamb-bottom {
  bottom: 0;
  -webkit-transition: all .35s ease-in-out;
}
.hamburger.is-open .hamb-top,
.hamburger.is-open .hamb-middle,
.hamburger.is-open .hamb-bottom {
  background-color: #1a1a1a;
}
.hamburger.is-open .hamb-top,
.hamburger.is-open .hamb-bottom {
  top: 50%;
  margin-top: -2px;
}
.hamburger.is-open .hamb-top {
  -webkit-transform: rotate(45deg);
  -webkit-transition: -webkit-transform .2s cubic-bezier(.73,1,.28,.08);
}
.hamburger.is-open .hamb-middle { display: none; }
.hamburger.is-open .hamb-bottom {
  -webkit-transform: rotate(-45deg);
  -webkit-transition: -webkit-transform .2s cubic-bezier(.73,1,.28,.08);
}
.hamburger.is-open:before {
  content: '';
  display: block;
  width: 100px;
  font-size: 14px;
  color: #fff;
  line-height: 32px;
  text-align: center;
  opacity: 0;
  -webkit-transform: translate3d(0,0,0);
  -webkit-transition: all .35s ease-in-out;
}
.hamburger.is-open:hover:before {
  opacity: 1;
  display: block;
  -webkit-transform: translate3d(-100px,0,0);
  -webkit-transition: all .35s ease-in-out;
}

/*-------------------------------*/
/*            Overlay            */
/*-------------------------------*/

.overlay {
    position: fixed;
    display: none;
    width: 100%;
    height: 100%;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: rgba(250,250,250,.8);
    z-index: 1;
}
</style>
</head>
<body>

<div id="wrapper">
  <div class="overlay"></div>
  <!-- Sidebar -->
  <nav class="navbar navbar-inverse fixed-top" id="sidebar-wrapper" role="navigation">
    <!-- <ul class="nav navbar-nav sidebar-nav"> -->
    <ul class="navbar-nav sidebar-nav">
      <div class="sidebar-header">
        <div class="sidebar-brand">
        <a href="#">Admin</a>
        </div>
      </div>
      <li class="nav-item">
        <a class="nav-link" href="#"> <i class="fa fa-home ml-2"></i> Dashboard</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"><i class="fa fa-home ml-2"></i> Floor</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle ml-2" href="#" id="product" data-toggle="dropdown"><i class="fa fa-home"></i> Product</a>
        <ul class="dropdown-menu animated fadeInLeft" role="menu">
          <div class="dropdown-header">Products Heading</div>
          <li class="nav-item">
            <a class="nav-link ml-2" href="#"> Category</a>
          </li>
          <li class="nav-item">
            <a class="nav-link ml-2" href="#"> Product</a>
          </li>
          <li class="nav-item">
            <a class="nav-link ml-2" href="#">Brand</a>
          </li>
          <li class="nav-item">
            <a class="nav-link ml-2" href="#"> Sub Brand</a>
          </li>
          <li class="nav-item">
            <a class="nav-link ml-2" href="#">Sub Brand (Details)</a>
          </li>
        </ul>
      </li>
      <li class="nav-item">
        <a class="nav-link ml-2" href="#"><i class="fa fa-home"></i> Mall</a>
      </li>
      <li class="nav-item">
        <a class="nav-link ml-2" href="#"><i class="fa fa-home"></i> Merchant</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle ml-2" href="#" id="navbardrop" data-toggle="dropdown"><i class="fa fa-home"></i> Shop</a>
        <ul class="dropdown-menu animated fadeInLeft" role="menu">
          <div class="dropdown-header">Shops heading</div>
          <li class="nav-item">
            <a class="nav-link ml-2" href="#"> Selling Identity</a>
          </li>
          <li class="nav-item">
            <a class="nav-link ml-2" href="#"> GSM New</a>
          </li>
          <li class="nav-item">
            <a class="nav-link ml-2" href="#"> GSM Used</a>
          </li>
          <li class="nav-item">
            <a class="nav-link ml-2" href="#"> Othermall</a>
          </li>
        </ul>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle ml-2" href="#" id="navbardrop" data-toggle="dropdown"><i class="fa fa-home"></i> Stock</a>
        <ul class="dropdown-menu animated fadeInLeft" role="menu">
          <div class="dropdown-header">Stocks heading</div>
          <li class="nav-item">
            <a class="nav-link ml-2" href="#"> GSM New</a>
          </li>
          <li class="nav-item">
            <a class="nav-link ml-2" href="#"> GSM Used</a>
          </li>
          <li class="nav-item">
            <a class="nav-link ml-2" href="#"> Othermall</a>
          </li>
        </ul>
      </li>
      <li class="nav-item">
        <a class="nav-link ml-2" href="#"><i class="fa fa-user"></i> Voucher</a>
      </li>
      <li class="nav-item">
        <a class="nav-link ml-2" href="#"><i class="fa fa-user"></i> Promotion / Updates</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle ml-2" href="#" id="navbardrop" data-toggle="dropdown"><i class="fa fa-home"></i> Advertisement</a>
        <ul class="dropdown-menu animated fadeInLeft" role="menu">
          <div class="dropdown-header">Advertisement heading</div>
          <li class="nav-item">
            <a class="nav-link ml-2" href="#"> Create AD Client</a>
          </li>
          <li class="nav-item">
            <a class="nav-link ml-2" href="#"> Create AD</a>
          </li>
          <li class="nav-item">
            <a class="nav-link ml-2" href="#"> AD Schedule</a>
          </li>
        </ul>
      </li>
      <li class="nav-item">
        <a class="nav-link ml-2" href="#"><i class="fa fa-user"></i> User Profile</a>
      </li>
      <li class="nav-item">
        <a class="nav-link ml-2" href="#"><i class="fa fa-home"></i> Sales</a>
      </li>
      <li class="nav-item">
        <a class="nav-link ml-2" href="#"><i class="fa fa-home"></i> Transaction</a>
      </li>
      <li class="nav-item">
        <a class="nav-link ml-2" href="#"><i class="fa fa-home"></i> Reports</a>
      </li>
      <li class="nav-item">
        <a class="nav-link ml-2" href="#"><i class="fa fa-home"></i> Manage Admin</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle ml-2" href="#" id="navbardrop" data-toggle="dropdown"><i class="fa fa-home"></i> Settings</a>
        <ul class="dropdown-menu animated fadeInLeft" role="menu">
          <div class="dropdown-header">Dropdown heading</div>
          <li class="nav-item">
            <a class="nav-link ml-2" href="#"> 1</a>
          </li>
          <li class="nav-item">
            <a class="nav-link ml-2" href="#"> 2</a>
          </li>
        </ul>
      </li>

      <!-- <li class="nav-item">
      <a class="nav-link" href="#home"><i class="fa fa-home"></i> Home</a>
      </li>
      <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
      <li class="nav-item"><a class="nav-link" href="#events">Events</a></li>
      <li class="nav-item"><a class="nav-link" href="#team">Team</a></li>
      <li class="dropdown">
        <a href="#works" class="dropdown-toggle"  data-toggle="dropdown">Works <span class="caret"></span></a>
        <ul class="dropdown-menu animated fadeInLeft" role="menu">
          <div class="dropdown-header">Dropdown heading</div>
          <li><a href="#pictures">Pictures</a></li>
          <li><a href="#videos">Videeos</a></li>
          <li><a href="#books">Books</a></li>
          <li><a href="#art">Art</a></li>
          <li><a href="#awards">Awards</a></li>
        </ul>
      </li>
      <li class="nav-item"><a class="nav-link" href="#services">Services</a></li>
      <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
      <li class="nav-item"><a class="nav-link" href="#followme">Follow me</a></li> -->
    </ul>
  </nav>
  <!-- /#sidebar-wrapper -->

  <!-- Page Content -->
  <div id="page-content-wrapper">
    <div class="d-flex">
        <div class="mt-3">
          <button type="button" class="hamburger animated fadeInLeft is-closed" data-toggle="offcanvas">
            <span class="hamb-top"></span>
            <span class="hamb-middle"></span>
            <span class="hamb-bottom"></span>
          </button>
        </div>
        <div class="ml-5">
            <img src="https://thegreen.studio/images/gsm.png" alt="GSM Logo" width="150" height="100">
        </div>
        <div class="ml-auto">
          <h5 class="mt-3 mr-3 ml-auto"><strong>Admin Name <i class="fa fa-user"></i></strong></h5>
        </div>
    </div>
    <div id="app" class="">
        @yield('content')
    </div>
  </div>
  <!-- /#page-content-wrapper -->

</div>
<!-- /#wrapper -->
<script>
$(document).ready(function () {
  var trigger = $('.hamburger'),
      overlay = $('.overlay'),
     isClosed = false;

    trigger.click(function () {
      hamburger_cross();
    });

    function hamburger_cross() {

      if (isClosed == true) {
        overlay.hide();
        trigger.removeClass('is-open');
        trigger.addClass('is-closed');
        isClosed = false;
      } else {
        overlay.show();
        trigger.removeClass('is-closed');
        trigger.addClass('is-open');
        isClosed = true;
      }
  }

  $('[data-toggle="offcanvas"]').click(function () {
        $('#wrapper').toggleClass('toggled');
  });
});
</script>
</body>
</html>
