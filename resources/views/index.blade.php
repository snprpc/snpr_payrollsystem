<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">

    <link rel="stylesheet" href="/css/bootstrap.css">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/jquery-confirm.css">

    <title>工资管理系统</title>
  </head>
  <body>
    <section  id="container" >
    <header class="header black-bg">

      <a href="" class="logo"><b>snpr工资管理系统</b></a>

      <div class="top-menu">
        <ul class="nav pull-right top-menu">
          <li><a class="logout" href="login.html">登出</a></li>
        </ul>
      </div>
    </header>
      <!--sidebar start-->
    <aside>
        <div id="sidebar"  class="nav-collapse ">
            <!-- sidebar menu start-->
            <ul class="sidebar-menu" id="nav-accordion">
              <p class="centered"><a href=" "><img src="/pic/ui_jenny.jpg" class="img-circle" width="80"></a></p>
              <h5 class="centered">{{ $admin->aname }}</h5>
                <li class="sub-menu">
                    <a class="active" href="javascript:;">
                        <i class="fa fa-dashboard"></i>
                        <span>资料录入</span>
                    </a>
                    <ul class="sub">
                        <li><a  href="#" onclick="addEmployee({{$admin->aid}})">员工资料</a></li>
                        <li><a  href="#" onclick="addDepartment({{$admin->aid}})">部门资料</a></li>
                        <li><a  href="#" onclick="addDepartment({{$admin->aid}})">主管任命</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="#"  onclick="wageManage({{$admin->aid}})">
                        <i class="fa fa-desktop"></i>
                        <span>工资信息</span>
                    </a>
                    <ul class="sub">
                        <li><a  href="#" onclick="addWage ({{$admin->aid}})">录入工资</a></li>
                        <li><a  href="#" onclick="updateWage ({{$admin->aid}})">修改工资</a></li>
                        <li><a  href="#" onclick="searchWage ({{$admin->aid}})">查询工资</a></li>
                    </ul>
                </li>

                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-cogs"></i>
                        <span>工资汇总</span>
                    </a>
                    <ul class="sub">
                        <li><a  href="#" onclick="">报表输出</a></li>
                        <li><a  href="#" onclick="">报表打印</a></li>
                        <li><a  href="#" onclick="">工工资条打印 List</a></li>
                    </ul>
                </li>
                <li class="sub-menu">
                    <a href="javascript:;" >
                        <i class="fa fa-book"></i>
                        <span>系统维护</span>
                    </a>
                    <ul class="sub">
                        <li><a  href="#" onclick="">添加用户</a></li>
                        <li><a  href="#" onclick="">修改密码</a></li>
                    </ul>
                </li>

            </ul>
            <!-- sidebar menu end-->
        </div>
    </aside>
    <section id="main-content">
      <section class="wrapper">
        <div class="row">

          <div class="jumbotron" style="padding:10px 30px;">
            <div class="bgpic">
              <img src="/pic/login_background.jpg" alt="">
            </div>
            <h1>欢迎使用snpr工资管理系统！</h1>
            <p>最近登陆时间&nbsp;&nbsp;&nbsp;变量最近登录时间.登陆Ip&nbsp;&bnsp;&nbsp;变量最近Ip</p>
            <p>本次登陆Ip</p>
          </div>
        </div>
      </section>
    </section>

    <script src="/js/jquery-1.8.3.min.js" charset="utf-8"></script>
    <script src="/js/jquery-confirm.js" charset="utf-8"></script>
    <script src="/js/bootstrap.min.js" charset="utf-8"></script>
    <script class="include" src="/js/jquery.dcjqaccordion.2.7.js" charset="utf-8"></script>
    <script src="/js/jquery.scrollTo.min.js" charset="utf-8"></script>
    <script src="/js/common-scripts.js" charset="utf-8"></script>
    <script src="/js/snprpc.js" charset="utf-8"></script>
    <script type="text/javascript" src="/js/num-alignment.js"></script>
  </body>
</html>
