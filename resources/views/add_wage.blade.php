<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>添加工资</title>
  </head>
  <body>
    <h2>录入员工工资信息</h2>
    <div class="">
      <div class="">
        <h3>当前操作</h3>
        <p>&nbsp;&nbsp;&nbsp;&nbsp;{{ $employee->ename }}</p>
        <form class="form-inline" id="addwage" role="form" method="POST" action="{{ route('wageinfo.store',['id' => 1]) }}">
            <!-- <label class="col-sm-2 control-label" for="eid">序号：</label> -->
            {{ csrf_field() }}
            <input type="text" class="form-control" name="eid"  id="eid" value="{{ $employee->eid }}" style="display:none;"/>

          <div class="form-group">
            底薪:<div class="input-group">
            <!-- <label class="col-sm-2 control-label" for="wpay">底薪</label> -->
            <input type="text" class="form-control" name="wpay" id="wpay" placeholder="请输入该员工底薪：" />
            <span class="input-group-addon">￥</span>
            </div>
          </div>
          <div class="form-group">
            &nbsp;&nbsp;奖金:<div class="input-group">
            <!-- <label class="col-sm-2 control-label" for="wallowance">奖金</label> -->
            <input type="text" class="form-control" name="wallowance" id="wallowance" placeholder="请输入该员工奖金："/>
            <span class="input-group-addon">￥</span>
            </div>
          </div>
          <div class="form-group">
            &nbsp;&nbsp;加班费:<div class="input-group">
            <!-- <label class="col-sm-2 control-label" for="wovertime">加班费</label> -->
            <input type="text" class="form-control" name="wovertime" id="wovertime" placeholder="请输入该员工加班费："/>
            <span class="input-group-addon">￥</span>
            </div>
          </div>
          <div class="form-group">
            &nbsp;&nbsp;税金:<div class="input-group">
              <!-- <label class="col-sm-2 control-label" for="wwithholding">税金</label> -->
              <input type="text" class="form-control" name="wwithholding" id="wwithholding" placeholder="请输入该员工所得税："/>
              <span class="input-group-addon">￥</span>
            </div>
          </div>
          <button type="button" class="btn btn-default" onclick="saveWage()">确定</button>
        </form>

      </div>

      <h3>未操作</h3>
      <div class="panel panel-warning">
          <div class="panel-heading">
              <h3>当前未录入信息的员工</h3>
          </div>
          <div class="panel-body">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>姓名</th>
                  <th>性别</th>
                  <th>部门</th>
                  <th>名族</th>
                  <th>政治面貌</th>
                  <th>账户</th>
                </tr>
              </thead>
              <tbody>
            @foreach ($employee_unset as $unemployee)
              <tr>
                <td>{{ $unemployee->ename }}</td>
            @if ($unemployee->esex == "male")
                <td>男</td>
            @else
                <td>女</td>
            @endif
                <td>未知</td>
                <td>{{ $unemployee->enation }}</td>
                <td>{{ $unemployee->estatus }}</td>
                <td>{{ $unemployee->eaccout }}</td>
                <!-- <td>{{ $unemployee->ename }}</td> -->
              </tr>
            @endforeach


              </tbody>
            </table>
          </div>
      </div>

    </div>
  </body>
</html>
