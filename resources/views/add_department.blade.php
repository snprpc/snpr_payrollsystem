<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="/css/bootstrap.css">
    <title></title>
  </head>
  <body>
    <h2>添加部门信息</h2>
    <div class="col-md-6 col-md-offset-3 addtable">
    <form id="adddepartment" class="form-group" action="{{ route('store_department',['id' => 1]) }}" method="POST">
      {{ csrf_field() }}
      <section>
        <div class="addform">

        <div class="form-group has-feedback form-inline">
          <label for="dep_name">&nbsp;部&nbsp;门&nbsp;名&nbsp;</label>
            <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-bookmark"></span></span>
                <input class="form-control" id="dep_name" name="dep_name" type="text" placeholder="请输入部门名" />
            </div>
            <span class="tips" style="color:red;display: none;"></span>
            <span class=" glyphicon glyphicon-remove form-control-feedback" style="display: none;"></span>
            <span class="glyphicon glyphicon-ok form-control-feedback" style="display: none;"></span>
        </div>
        <div class="form-group has-feedback form-inline">
          <label for="dep_no">部门编号</label>
            <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-star"></span></span>
                <input class="form-control" id="dep_no" name="dep_no" type="text" placeholder="请输入部门编号" />
            </div>
            <span class="tips" style="color:red;display: none;"></span>
            <span class=" glyphicon glyphicon-remove form-control-feedback" style="display: none;"></span>
            <span class="glyphicon glyphicon-ok form-control-feedback" style="display: none;"></span>
        </div>
        <div class="form-group has-feedback form-inline">
          <label for="dep_phone">部门电话</label>
            <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-earphone"></span></span>
                <input class="form-control" id="dep_phone" name="dep_phone" type="text" placeholder="请输入部门电话号" />
            </div>
            <span class="tips" style="color:red;display: none;"></span>
            <span class=" glyphicon glyphicon-remove form-control-feedback" style="display: none;"></span>
            <span class="glyphicon glyphicon-ok form-control-feedback" style="display: none;"></span>
        </div>
        <button type="button" class="btn btn-primary save" name="submit" onclick="saveDepartment()">保存</button>

      </div>
      </section>

    </form>
  </div>
  </body>
</html>
