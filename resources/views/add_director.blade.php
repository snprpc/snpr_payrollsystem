<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>任命主管</title>
  </head>
  <body>
    <h2>任命部门主管</h2>
    <ul id="myTab" class="nav nav-tabs">
      @if (isset($departments))
        @foreach ($departments as $department)
        <li>
          <a href="#employee" data-toggle="tab" onclick="searchEmployee({{ $department->dep_id}})">{{ $department->dep_name}}</a>
        </li>
        @endforeach
      @else
        <li>
          <a href="#no_department" data-toggle="tab">无部门</a>
        </li>
      @endif
    </ul>
      <div id="myTabContent" class="tab-content">
          <div class="tab-pane fade in active" id="employee">
      

          </div>
      </div>



  </body>
</html>
