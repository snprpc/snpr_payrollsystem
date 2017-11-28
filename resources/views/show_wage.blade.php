<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script type="text/javascript" src="/js/num-alignment.js"></script>
    <title>修改工资</title>
  </head>
  <body>

    <h2>员工工资信息</h2>
    <div class="panel panel-info">
      <div class="panel-heading">
          <h3 class="panel-title">员工公司信息面板</h3>
      </div>
      <div class="panel-body">
        <table class="table table-hover">
          <thead>
            <tr>
              <th>姓名</th>
              <th>账户</th>
              <th>&nbsp;&nbsp;&nbsp;&nbsp;底&nbsp;&nbsp;&nbsp;&nbsp;薪&nbsp;&nbsp;&nbsp;&nbsp;</th>
              <th>奖金</th>
              <th>加班费</th>
              <th>税金</th>
              <th>修改</th>
            </tr>
          </thead>
          @for ($i = 0; $i < $length; $i++)
          <tbody>
            <tr>
              <td>{{ $wages[$length+$i]['ename'] }}</td>
              <td>{{ $wages[$length+$i]['eaccout'] }}</td>
              <td>
                <input id="wpay{{ $wages[$i]['eid'] }}" name="wpay" data-step="10" data-min="0" data-max="100000" data-edit="true" data-digit="0" value="{{$wages[$i]['wpay']}}"/>
              </td>
              <td>
                <input id="wallowance{{ $wages[$i]['eid'] }}" name="wallowance" data-step="10" data-min="0" data-max="100000" data-edit="true" data-digit="0" value="{{ $wages[$i]['wallowance'] }}"/>
              </td>
              <td>
                <input id="wovertime{{ $wages[$i]['eid'] }}" name="wovertime" data-step="10" data-min="0" data-max="100000" data-edit="true" data-digit="0" value="{{ $wages[$i]['wovertime'] }}"/>
              </td>
              <td>
                <input id="wwithholding{{ $wages[$i]['eid'] }}" name="wwithholding" data-step="10" data-min="0" data-max="100000" data-edit="true" data-digit="0" value="{{ $wages[$i]['wwithholding'] }}"/>
              </td>
              <td>
                <button type="button" name="submit" class="btn btn-info" onclick="changeWage({{$wages[$i]['wid']}})">确定</button>
              </td>
            </tr>
          @endfor
          </tbody>
        </table>
      </div>
    </div>
    <script>
  		// 自定义类型：参数为数组，可多条数据
  		alignmentFns.createType([{"test": {"step" : 10, "min" : 10, "max" : 999, "digit" : 0}}]);
  		// 初始化
  		alignmentFns.initialize();
  		// 销毁
  		alignmentFns.destroy();
  		// js动态改变数据
  		$("#4").attr("data-max", "12")
  		// 初始化
  		alignmentFns.initialize();
  	</script>
  </body>


</html>
