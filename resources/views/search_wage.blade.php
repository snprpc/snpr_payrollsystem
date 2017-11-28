<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>查询工资表</title>
  </head>
  <body>
    <h2>查询员工工资信息</h2>
    <div class="">
        <ul id="myTab" class="nav nav-tabs">
          @if (isset($paymethod))
          <li>
              <a href="#home" data-toggle="tab">
                  根据姓名查询
              </a>
          </li>
          <li class="active">
              <a href="#ios" data-toggle="tab">
                  根据区间查询
              </a>
          </li>
          @else
          <li class="active">
              <a href="#home" data-toggle="tab">
                  根据姓名查询
              </a>
          </li>
          <li>
              <a href="#ios" data-toggle="tab">
                  根据区间查询
              </a>
          </li>
          @endif
        </ul>
<div id="myTabContent" class="tab-content">
  @if (isset($paymethod))
    <div class="tab-pane fade" id="home">
  @else
    <div class="tab-pane fade in active" id="home">
  @endif
      <div class="search">
        <form id="namesearch" action="index.html" method="post">
          {{ csrf_field() }}
        <div class="input-group">
          <input id="input_name" type="text" name="input_name" class="form-control" placeholder="请输入员工姓名查询！"/>
          <span class="input-group-btn">
            <button type="button" class="btn btn-info" onclick="nameSearch()">
              <span class="glyphicon glyphicon-search"></span> 查询
            </button>
          </span>
        </div><!-- /input-group -->
        </form>
      </div>
        @if (isset($namewages))
        <div class="">
          <table class="table table-hover">
            <thead>
              <tr>
                <th>姓名</th>
                <th>账户</th>
                <th>底薪</th>
                <th>奖金</th>
                <th>加班费</th>
                <th>税金</th>
              </tr>
            </thead>

            <tbody>
              <tr>
                <td>{{ $namewages['ename'] }}</td>
                <td>{{ $namewages['eaccout'] }}</td>
                <td>
                  {{$namewages['wpay']}}
                </td>
                <td>
                  {{ $namewages['wallowance'] }}
                </td>
                <td>
                  {{ $namewages['wovertime'] }}
                </td>
                <td>
                  {{ $namewages['wwithholding'] }}
                </td>
              </tr>

            </tbody>

          </table>
        </div>
        @else
            我没有任何记录！
        @endif
    </div>
    @if (isset($paymethod))
      <div class="tab-pane fade in active" id="ios">
    @else
      <div class="tab-pane fade" id="ios">
    @endif
      <div class="search">
        <form id="paysearch" action="index.html" method="post">

        <div class="input-group">
          <input type="text" class="form-control" name="minpay" id="minpay" placeholder="请输入最低工资">
          <span class="input-group-addon">~</span>
          <input type="text" class="form-control" name="maxpay" id="maxpay" placeholder="请输入最高工资">
          <span class="input-group-btn">
            <button type="button" class="btn btn-info" onclick="paySearch()">
              <span class="glyphicon glyphicon-search"></span> 查询
            </button>
          </span>
        </div><!-- /input-group -->
        </form>
      </div>
      <div class="">
        @if (isset($paywages))
        <div class="">
          <table class="table table-hover">
            <thead>
              <tr>
                <th>姓名</th>
                <th>账户</th>
                <th>&nbsp;&nbsp;&nbsp;&nbsp;底&nbsp;&nbsp;&nbsp;&nbsp;薪&nbsp;&nbsp;&nbsp;&nbsp;</th>
                <th>奖金</th>
                <th>加班费</th>
                <th>税金</th>
              </tr>
            </thead>
            @for ($i = 0; $i < $length; $i++)
            <tbody>
              <tr>
                <td>{{ $paywages[$length+$i]['ename'] }}</td>
                <td>{{ $paywages[$length+$i]['eaccout'] }}</td>
                <td>
                  {{$paywages[$i]['wpay']}}
                </td>
                <td>
                  {{ $paywages[$i]['wallowance'] }}
                </td>
                <td>
                  {{ $paywages[$i]['wovertime'] }}
                </td>
                <td>
                  {{ $paywages[$i]['wwithholding'] }}
                </td>
              </tr>
            @endfor
            </tbody>

          </table>
        </div>
        @else
            我没有任何记录！
        @endif
      </div>
    </div>
</div>

    </div>
  </body>
</html>
