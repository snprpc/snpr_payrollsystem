<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/admin/login.css">

    <title>管理员登陆</title>
  </head>
  <body>
  <div class="container">
  <div class="col-md-offset-2 col-md-8">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h5>登录</h5>
      </div>
      <div class="panel-body">


      <form class="form-group" role="form" action="{{ route('admin.store') }}" method="POST">
        {{ csrf_field() }}
        <div class="form-group form-inline">
          <label for="anme" class="col-sm-2 control-label">用户名</label>
          <input type="text" class="form-control" name="aname" id="aname" placeholder="请输入用户名" />
          @if (session('false_name'))
              <div class="alert alert-success">
                  {{ session('false_name') }}
              </div>
          @endif
        </div>
        <div class="form-group form-inline">
          <label for="apasswd" class="col-sm-2 control-label">密&nbsp;&nbsp;&nbsp;码</label>
          <input type="password" class="form-control" name="apasswd" id="apasswd" placeholder="请输入密码" />
          @if (session('false_passwd'))
              <div class="alert alert-success">
                  {{ session('false_passwd') }}
              </div>
          @endif
        </div>
        <div class="form-group ">
          <div class="col-sm-offset-2 col-sm-10 form-inline">
            <div class="checkbox">
              <label>
                <input class="checkbox" type="checkbox" id="checkbox" />&nbsp;&nbsp;请记住我
              </label>
            </div>
            <div class="col-sm-offset-2 col-sm-10 ">
              <button type="submit" class="btn btn-default btn-login ">登录</button>
            </div>
          </div>
        </div>
      </form>
      </div>
    </div>
  </div>
  </div>
  </body>

</html>
