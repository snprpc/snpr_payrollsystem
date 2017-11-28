<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="/css/bootstrap.css">
    <title>添加员工</title>
  </head>
  <body>
    <h2>添加员工信息</h2>
    <div class="col-md-6 col-md-offset-3">
        <form id="addemployee" class="form-group" action="{{ route('store_employee',['id' => 1]) }}" method="POST">
          {{ csrf_field() }}
          <section class="addtable">



            <div class="form-group has-feedback form-inline">
              <label for="ebirth">姓&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;名&nbsp;&nbsp;</label>
                <div class="input-group">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                    <input class="form-control" id="ename" name="ename" type="text" placeholder="请输入员工姓名">
                </div>
                <span class="tips" style="color:red;display: none;"></span>
                <span class=" glyphicon glyphicon-remove form-control-feedback" style="display: none;"></span>
                <span class="glyphicon glyphicon-ok form-control-feedback" style="display: none;"></span>
            </div>
            <div class="form-group has-feedback form-inline">
              <label for="ephone">手&nbsp;机&nbsp;号&nbsp;&nbsp;</label>
                <div class="input-group">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-phone"></span></span>
                    <input class="form-control" id="ephone" name="ephone" type="text" placeholder="请输入手机号码">
                </div>
                <span class="tips" style="color:red;display: none;"></span>
                <span class="glyphicon glyphicon-remove form-control-feedback" style="display: none;"></span>
                <span class="glyphicon glyphicon-ok form-control-feedback" style="display: none;"></span>
            </div>
            <div class="form-group has-feedback form-inline">
                <label for="esex">性&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;别&nbsp;&nbsp;</label>
                <div class="input-group col-lg-6" id="esexcheckbox" style="border-top:0px;background:white;">
                  <span class="input-group-addon">
                      <input type="radio" name="esex" value="1"></span>
                  <input type="text" class="form-control" id="inp-display-male" value="男" readonly style="border:0px;outline:none;background:white;"/>
                  <span class="input-group-addon">
                      <input type="radio" name="esex" value="2"></span>
                  <input type="text" class="form-control" id="inp-display-female"value="女" readonly style="border:0px;outline:none;background:white;"/>
                </div>
                <span class="tips" style="color:red;display: none;"></span>
                <span class="glyphicon glyphicon-remove form-control-feedback" style="display: none;"></span>
                <span class="glyphicon glyphicon-ok form-control-feedback" style="display: none;"></span>
            </div>

            <div class="form-group has-feedback form-inline">
                <label for="ebirth">出&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;日&nbsp;&nbsp;</label>
                <div class="input-group">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                    <input class="form-control" id="ebirth" name="ebirth" type="month" placeholder="请输入出生年月" style="width:227px;"/>
                </div>
                <span class="tips" style="color:red;display: none;"></span>
                <span class="glyphicon glyphicon-remove form-control-feedback" style="display: none;"></span>
                <span class="glyphicon glyphicon-ok form-control-feedback" style="display: none;"></span>
            </div>
            <div class="form-group has-feedback form-inline">
                <label for="eplace">籍&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;贯&nbsp;&nbsp;</label>
                <div class="input-group">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-home"></span></span>
                    <input class="form-control" id="eplace" name="eplace" type="text" placeholder="请输入籍贯" />
                </div>
                <span class="tips" style="color:red;display: none;"></span>
                <span class="glyphicon glyphicon-remove form-control-feedback" style="display: none;"></span>
                <span class="glyphicon glyphicon-ok form-control-feedback" style="display: none;"></span>
            </div>
            <div class="form-group has-feedback form-inline">
                <label for="enation">名&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;族&nbsp;&nbsp;</label>
                <div class="input-group">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-home"></span></span>
                    <input class="form-control" id="enation" name="enation" type="text" placeholder="请输入籍贯" />
                </div>
                <span class="tips" style="color:red;display: none;"></span>
                <span class="glyphicon glyphicon-remove form-control-feedback" style="display: none;"></span>
                <span class="glyphicon glyphicon-ok form-control-feedback" style="display: none;"></span>
            </div>
            <div class="form-group has-feedback form-inline">
                <label for="epicture">照&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;片&nbsp;&nbsp;</label>
                <div class="input-group">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-picture"></span></span>
                    <input class="form-control" id="epicture" name="epicture" type="text" placeholder="请输入政治面貌" />
                </div>
                <span class="tips" style="color:red;display: none;"></span>
                <span class="glyphicon glyphicon-remove form-control-feedback" style="display: none;"></span>
                <span class="glyphicon glyphicon-ok form-control-feedback" style="display: none;"></span>
            </div>
            <div class="form-group has-feedback form-inline">
                <label for="eaccout">帐&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;户&nbsp;&nbsp;</label>
                <div class="input-group">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                    <input class="form-control" id="eaccout" name="eaccout" type="text" placeholder="请输入银行卡号" />
                </div>
                <span class="tips" style="color:red;display: none;"></span>
                <span class="glyphicon glyphicon-remove form-control-feedback" style="display: none;"></span>
                <span class="glyphicon glyphicon-ok form-control-feedback" style="display: none;"></span>
            </div>
            <div class="form-group has-feedback form-inline">
                <label for="estatus">政治面貌&nbsp;</label>
                <div class="input-group">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-flag"></span></span>
                    <input class="form-control" id="estatus" name="estatus" type="text" placeholder="请输入政治面貌" />
                </div>
                <span class="tips" style="color:red;display: none;"></span>
                <span class="glyphicon glyphicon-remove form-control-feedback" style="display: none;"></span>
                <span class="glyphicon glyphicon-ok form-control-feedback" style="display: none;"></span>
            </div>
            <div class="form-group has-feedback form-inline">

            <div class="form-group has-feedback form-inline">
            	<label for="dep_name">所属部门&nbsp;</label>
              <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-globe"></span></span>
              	<select class="form-control" name="dep_name" id="dep_name"style="width:227px;">
                  <option selected>请选择该员工所在部门</option>
                  @if (isset($departments))
                    @foreach ($departments as $department)
                      <option>{{ $department->dep_name}}</option>
                    @endforeach
                  @else
                    <a  href="#" onclick="addDepartment({{$admin->aid}})">
                      <option>没有部门数据，请前往添加</option></a>
                  @endif
              	</select>
            </div>
            <span class="tips" style="color:red;display: none;"></span>
            <span class="glyphicon glyphicon-remove form-control-feedback" style="display: none;"></span>
            <span class="glyphicon glyphicon-ok form-control-feedback" style="display: none;"></span>
            </div>
          <button type="button" class="btn btn-primary save" name="button" onclick="saveEmployee()">保存</button>

        </section>
      </form>
    </div>
  </body>
</html>
