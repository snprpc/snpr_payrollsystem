function addEmployee (id)
{
  var host = "/snprpc/payrollsystem/admin/";
  var id = id;
//  console.log(id);

  $.ajax({
    url:host+id+"/addemployee",

    type:'GET', //GET
    headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    dataType:'html',    //返回的数据格式：json/xml/html/script/jsonp/text
    // beforeSend:function(xhr){
    //         console.log();
    //         console.log(xhr);
    //         console.log('发送前');
    // },
    success:function(data){
    //    console.log(data);
         $('.jumbotron').html(data);
    }
  })
}
function saveEmployee ()
{
  var host = "/snprpc/payrollsystem/admin/";
  var ename = $(" #ename ").val();
  var esex_str = '';
  var esex = $('input:radio:checked').val();
  console.log(esex);
  if (esex==2) {
    esex_str = '女';
  }else {
    esex_str = '男';
  }
  var ebirth =  $(" #ebirth ").val();
  var eplace = $(" #eplace ").val();
  var enation = $(" #enation ").val();
  var estatus =  $(" #estatus ").val();
  var epicture = $(" #epicture ").val();
  var ephone = $(" #ephone ").val();
  var eaccout =  $(" #eaccout ").val();
  var dep_name =  $(" #dep_name ").val();
  $.confirm({
      title: '确认员工信息!',
      content: '姓名：'+ename+'<br>'+'手机号：'+ephone+'<br>'+'性别：'+esex_str+'<br>'
        +'出生年月：'+ebirth+'<br>'+'籍贯：'+eplace+'<br>'+'名族：'+enation+'<br>'+'政治面貌：'
        +estatus+'<br>'+'账户：'+eaccout+'<br>'+'所属部门:'+dep_name,
      confirm: function(){
        $.ajax({
          url:host+"1/storeemployee",
          data:$('#addemployee').serialize(),

          type:'GET', //GET
          headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          dataType:'html',    //返回的数据格式：json/xml/html/script/jsonp/text

          success:function(data){
            //  console.log(data);
               $('.jumbotron').html(data);
          },
          complete:function(data){
            $.alert('添加成功!');
          }
        })
      },
      cancel: function(){
        $.alert('请重新填写!');
        $.ajax({
          url:host+"1/addemployee",
          //data:id,
          type:'GET', //GET
          headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          dataType:'html',    //返回的数据格式：json/xml/html/script/jsonp/text
          // beforeSend:function(xhr){
          //         console.log();
          //         console.log(xhr);
          //         console.log('发送前');
          // },
          success:function(data){
          //    console.log(data);
               $('.jumbotron').html(data);
          }
        })
      }
  });
}

function addDepartment (id)
{
  var host = "/snprpc/payrollsystem/admin/";
  var id = id;
  console.log(id);
  $.ajax({
    url:host+id+"/adddepartment",
    //data:id,
    type:'GET', //GET
    headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    dataType:'html',    //返回的数据格式：json/xml/html/script/jsonp/text
    // beforeSend:function(xhr){
    //         console.log();
    //         console.log(xhr);
    //         console.log('发送前');
    // },
    success:function(data){
        console.log(data);
         $('.jumbotron').html(data);
    }
  })
}
function saveDepartment ()
{
  var host = "/snprpc/payrollsystem/admin/";
  var dep_name = $(" #dep_name ").val();
  var dep_no = $(" #dep_no ").val();
  var dep_phone =  $(" #dep_phone ").val();
  var is_confirm = false;
  $.confirm({
      title: '确认部门信息!',
      content: '部门名：'+dep_name+'<br>'+'部门编号：'+dep_no+'<br>'+'部门电话：'+dep_phone,
      confirm: function(){
        $.ajax({
          url:host+"1/storedepartment",
          data:$('#adddepartment').serialize(),

          type:'GET', //GET
          headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          dataType:'html',    //返回的数据格式：json/xml/html/script/jsonp/text

          success:function(data){
              console.log(data);
               $('.jumbotron').html(data);
          },
          complete:function(data){
            $.alert('添加成功!');
          }
        })
      },
      cancel: function(){
        $.alert('请重新填写!');
        $.ajax({
          url:host+"1/adddepartment",
          //data:id,
          type:'GET', //GET
          headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          dataType:'html',    //返回的数据格式：json/xml/html/script/jsonp/text
          // beforeSend:function(xhr){
          //         console.log();
          //         console.log(xhr);
          //         console.log('发送前');
          // },
          success:function(data){
              console.log(data);
               $('.jumbotron').html(data);
          }
        })
      }
  });
}
function addDirector(id)
{
  var host = "/snprpc/payrollsystem/admin/";
  $.ajax({
    url:host+id+"/adddirector",
    //data:id,
    type:'GET', //GET
    headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    dataType:'html',    //返回的数据格式：json/xml/html/script/jsonp/text

    success:function(data){
        // console.log(data);
         $('.jumbotron').html(data);
    }
  })
}
function searchEmployee (dep_id)
{
  var host = "/snprpc/payrollsystem/admin/";
  $.ajax({
    url:host+"1/searchemployee",
    data:{"dep_id":dep_id},
    type:'GET', //GET
    headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    dataType:'json',    //返回的数据格式：json/xml/html/script/jsonp/text
    success:function(data){
      console.log(data.length);
      console.log(data);
      $("#employee").html("");
      if(data.length == 0){

      }else{
       //  console.log(data);
        var sex = "男";

        for(var i=0,l=data.length;i<l;i++){
           console.log(data[i]['ename']);
           var sex
           if(data[i]['esex'] == "female"){
              sex="女";
           }

           var nameEmplement =
           '<div class="text-info col-sm-10"><table class="table table-hover" style="width:1050px;"><thead><tr><th>姓名</th><th>性别</th><th>联系方式</th><th>出生年月</th><th>名族</th><th>政治面貌</th><th>账户</th><th>任命</th></tr></thead><tbody><tr><td>'
           +data[i]["ename"]+'</td><td>'+sex+'</td><td>'
           +data[i]["ephone"]+'</td><td>'+data[i]["ebirth"]+'</td><td>'
           +data[i]["enation"]+'</td><td>'+data[i]["estatus"]+'</td><td>'+data[i]["eaccout"]+
            '</td><td><button type="button" class="btn btn-info btn-sm" value="'+data[i]["eid"]+
            '" onclick="addEmpToDir('+data[i]["eid"]+')"><span class="glyphicon glyphicon-share-alt"></span> 任命</button></td></tr></tbody></table></div>'
           $("#employee").append(nameEmplement);
       }
      }
    }
  })
}

function addEmpToDir (eid)
{
  var host = "/snprpc/payrollsystem/admin/";
  $.ajax({
    url:host+"1/addtodir",
    data:{"eid":eid},
    type:'GET', //GET
    headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    dataType:'html',    //返回的数据格式：json/xml/html/script/jsonp/text

    success:function(data){
        $alert("任命成功！");
    }
  })

}

function wageManage (id)
{
  var host = "/snprpc/payrollsystem/admin/";
  $.ajax({
    url:host+id+"/wageinfo",
    //data:id,
    type:'GET', //GET
    headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    dataType:'html',    //返回的数据格式：json/xml/html/script/jsonp/text
    // beforeSend:function(xhr){
    //         console.log();
    //         console.log(xhr);
    //         console.log('发送前');
    // },
    success:function(data){
        console.log(data);
         $('.jumbotron').html(data);
    }
  })
}

function addWage (id)
{
  var host = "/snprpc/payrollsystem/admin/";
  $.ajax({
    url:host+id+"/wageinfo/create",
    //data:id,
    type:'GET', //GET
    headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    dataType:'html',    //返回的数据格式：json/xml/html/script/jsonp/text

    success:function(data){
        console.log(data);
         $('.jumbotron').html(data);
    }
  })
}
function updateWage (id)
{
  var host = "/snprpc/payrollsystem/admin/";
  var uid = id.toString();
  //console.log($('#wpay1').serialize());
  $.ajax({
    url:host+id+"/wageinfo/updatewage",
    //data:$('#wpay1').serialize(),
    //   $('#wallowance'+uid).serialize(),
    //   $('#wovertime'+uid).serialize(),
    //   $('#wwithholding'+uid).serialize(),
    // },
    type:'GET', //GET
    headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    dataType:'html',    //返回的数据格式：json/xml/html/script/jsonp/text

    success:function(data){
      //  console.log(data);
         $('.jumbotron').html(data);
    }
  })
}
function searchWage (id)
{
  console.log('123123123');
  var host = "/snprpc/payrollsystem/admin/";
  $.ajax({
    url:host+id+"/search/wage",
    //data:id,
    type:'GET', //GET
    headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    dataType:'html',    //返回的数据格式：json/xml/html/script/jsonp/text

    success:function(data){
      //  console.log(data);
         $('.jumbotron').html(data);
    }
  })
}
function changeWage (wid)
{
  var host = "/snprpc/payrollsystem/admin/";
  var wpay = $('#wpay'+wid ).val();
  var wallowance = $('#wallowance'+wid ).val();
  var wovertime = $('#wovertime'+wid ).val();
  var wwithholding = $('#wwithholding'+wid ).val();
  //console.log($('#wpay'+wid).serialize());
  $.alert({
      title: '确认!',
      content: '工资表已更新！',
      confirm: function(){
          $.ajax({
            url:host+"1/wageinfo/"+wid+"/updatewage",
            data:{
              "wid":wid,
              "wpay":wpay,
              "wallowance":wallowance,
              "wovertime":wovertime,
              "wwithholding":wwithholding
            },
            type:'GET', //GET
            headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            dataType:'html',    //返回的数据格式：json/xml/html/script/jsonp/text

            success:function(data){
                //console.log(data);
                 $('.jumbotron').html(data);
            }
          })
      }
  });

}
function saveWage ()
{
  var host = "/snprpc/payrollsystem/admin/";
  var wpay = $(" #wpay ").val();
  var wallowance = $(" #wallowance ").val();
  var wovertime =  $(" #wovertime ").val();
  var wwithholding =  $(" #wwithholding ").val();
  var is_confirm = false;
  $.confirm({
      title: '确认员工工资信息!',
      content:'底薪：'+wpay+'<br>'+'奖金：'+wallowance+'<br>'+'加班费：'+wovertime+'<br>'+'税金：'+wwithholding,
      confirm: function(){
        $.ajax({
          url:host+"1/wageinfo",
          data:$('#addwage').serialize(),
          type:'POST', //GET
          headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          dataType:'html',    //返回的数据格式：json/xml/html/script/jsonp/text

          success:function(data){
              console.log(data);
               $('.jumbotron').html(data);
          }
        })
      },
      cancel: function(){
        $.alert('请重新填写!');
        $.ajax({
          url:host+"1/wageinfo/create",
          //data:id,
          type:'GET', //GET
          headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          dataType:'html',    //返回的数据格式：json/xml/html/script/jsonp/text
          // beforeSend:function(xhr){
          //         console.log();
          //         console.log(xhr);
          //         console.log('发送前');
          // },
          success:function(data){
              console.log(data);
               $('.jumbotron').html(data);
          }
        })
      }
  });

}

function nameSearch()
{
  console.log('nameSearch');
  var host = "/snprpc/payrollsystem/admin/";
  var input = $(" #input_name ").val();
  if (input !== "") {
    $.ajax({
      url:host+"1/search/wagebyname",
      data:$('#namesearch').serialize(),
      type:'GET', //GET
      headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      dataType:'html',    //返回的数据格式：json/xml/html/script/jsonp/text

      success:function(data){
          //console.log(data);
           $('.jumbotron').html(data);
      }
    })
  }else{
    $.alert({
        title: '输入为空!',
        content: '请输入员工姓名后查询',
    })
  }
}
function paySearch()
{
  console.log('paySearch');
  var host = "/snprpc/payrollsystem/admin/";
  var input1 = $(" #minpay ").val();
  var input2 = $(" #maxpay ").val();
  if (input1 !== "" || input2 !== "") {

    $.ajax({
      url:host+"1/search/wagebypay",
      data:$('#paysearch').serialize(),
      type:'GET', //GET
      headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      dataType:'html',    //返回的数据格式：json/xml/html/script/jsonp/text

      success:function(data){
          //console.log(data);
           $('.jumbotron').html(data);
      }
    })
  }else{
    $.alert({
        title: '输入为空!',
        content: '请输入最低工资或最高工资后查询！',
    })
  }
}


var settings = {
    e: 'idcode',
    codeType: {
        name: 'follow',
        len: 4
    }, //len是修改验证码长度的
    codeTip: '换个验证码?',
    inputID: 'idcode-btn' //验证元素的ID
};

var _set = {
    storeLable: 'codeval',
    store: '#ehong-code-input',
    codeval: '#ehong-code'
}
$.idcode = {
    getCode: function(option) {
        _commSetting(option);
        return _storeData(_set.storeLable, null);
    },
    setCode: function(option) {
        _commSetting(option);
        _setCodeStyle("#" + settings.e, settings.codeType.name, settings.codeType.len);

    },
    validateCode: function(option) {
        _commSetting(option);
        var inputV;
        if (settings.inputID) {
            inputV = $('#' + settings.inputID).val();

        } else {
            inputV = $(_set.store).val();
        }
        if (inputV.toUpperCase() == _storeData(_set.storeLable, null).toUpperCase()) { //修改的不区分大小写
            return true;
        } else {
            _setCodeStyle("#" + settings.e, settings.codeType.name, settings.codeType.len);
            return false;
        }
    }
};

function _commSetting(option) {
    $.extend(settings, option);
}

function _storeData(dataLabel, data) {
    var store = $(_set.codeval).get(0);
    if (data) {
        $.data(store, dataLabel, data);
    } else {
        return $.data(store, dataLabel);
    }
}

function _setCodeStyle(eid, codeType, codeLength) {
    var codeObj = _createCode(settings.codeType.name, settings.codeType.len);
    var randNum = Math.floor(Math.random() * 6);
    var htmlCode = ''
    if (!settings.inputID) {
        htmlCode = '<span><input id="ehong-code-input" type="text" maxlength="4" /></span>';
    }
    htmlCode += '<div id="ehong-code" class="ehong-idcode-val ehong-idcode-val';
    htmlCode += String(randNum);
    htmlCode += '" href="#" onblur="return false" onfocus="return false" oncontextmenu="return false" onclick="$.idcode.setCode()">' + _setStyle(codeObj) + '</div>' + '<span id="ehong-code-tip-ck" class="ehong-code-val-tip" onclick="$.idcode.setCode()">' + settings.codeTip + '</span>';
    $(eid).html(htmlCode);
    _storeData(_set.storeLable, codeObj);
}

function _setStyle(codeObj) {
    var fnCodeObj = new Array();
    var col = new Array('#BF0C43', '#E69A2A', '#707F02', '#18975F', '#BC3087', '#73C841', '#780320', '#90719B', '#1F72D8', '#D6A03C', '#6B486E', '#243F5F', '#16BDB5');
    var charIndex;
    for (var i = 0; i < codeObj.length; i++) {
        charIndex = Math.floor(Math.random() * col.length);
        fnCodeObj.push('<font color="' + col[charIndex] + '">' + codeObj.charAt(i) + '</font>');
    }
    return fnCodeObj.join('');
}

function _createCode(codeType, codeLength) {
    var codeObj;
    if (codeType == 'follow') {
        codeObj = _createCodeFollow(codeLength);
    } else if (codeType == 'calc') {
        codeObj = _createCodeCalc(codeLength);
    } else {
        codeObj = "";
    }
    return codeObj;
}

function _createCodeCalc(codeLength) {
    var code1, code2, codeResult;
    var selectChar = new Array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9');
    var charIndex;
    for (var i = 0; i < codeLength; i++) {
        charIndex = Math.floor(Math.random() * selectChar.length);
        code1 += selectChar[charIndex];

        charIndex = Math.floor(Math.random() * selectChar.length);
        code2 += selectChar[charIndex];
    }
    return [parseInt(code1), parseInt(code2), parseInt(code1) + parseInt(code2)];
}

function _createCodeFollow(codeLength) {
    var code = "";
    var selectChar = new Array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z');

    for (var i = 0; i < codeLength; i++) {
        var charIndex = Math.floor(Math.random() * selectChar.length);
        if (charIndex % 2 == 0) {
            code += selectChar[charIndex].toLowerCase();
        } else {
            code += selectChar[charIndex];
        }
    }
    return code;
}
var regUsername = /^[a-zA-Z_][a-zA-Z0-9_]{4,19}$/;
var regPasswordSpecial = /[~!@#%&=;':",./<>_\}\]\-\$\(\)\*\+\.\[\?\\\^\{\|]/;
var regPasswordAlpha = /[a-zA-Z]/;
var regPasswordNum = /[0-9]/;
var password;
var check = [false, false, false, false, false, false];

//校验成功函数
function success(Obj, counter) {
    Obj.parent().parent().removeClass('has-error').addClass('has-success');
    $('.tips').eq(counter).hide();
    $('.glyphicon-ok').eq(counter).show();
    $('.glyphicon-remove').eq(counter).hide();
    check[counter] = true;

}

// 校验失败函数
function fail(Obj, counter, msg) {
    Obj.parent().parent().removeClass('has-success').addClass('has-error');
    $('.glyphicon-remove').eq(counter).show();
    $('.glyphicon-ok').eq(counter).hide();
    $('.tips').eq(counter).text(msg).show();
    check[counter] = false;
}

// 用户名匹配
$('.container').find('input').eq(0).change(function() {


    if (regUsername.test($(this).val())) {
        success($(this), 0);
    } else if ($(this).val().length < 5) {
        fail($(this), 0, '用户名太短，不能少于5个字符');
    } else {
        fail($(this), 0, '用户名只能为英文数字和下划线,且不能以数字开头')
    }

});



// 密码匹配

// 匹配字母、数字、特殊字符至少两种的函数
function atLeastTwo(password) {
    var a = regPasswordSpecial.test(password) ? 1 : 0;
    var b = regPasswordAlpha.test(password) ? 1 : 0;
    var c = regPasswordNum.test(password) ? 1 : 0;
    return a + b + c;

}

$('.container').find('input').eq(1).change(function() {

    password = $(this).val();

    if ($(this).val().length < 8) {
        fail($(this), 1, '密码太短，不能少于8个字符');
    } else {


        if (atLeastTwo($(this).val()) < 2) {
            fail($(this), 1, '密码中至少包含字母、数字、特殊字符的两种')
        } else {
            success($(this), 1);
        }
    }
});


// 再次输入密码校验
$('.container').find('input').eq(2).change(function() {

    if ($(this).val() == password) {
        success($(this), 2);
    } else {

        fail($(this), 2, '两次输入的密码不一致');
    }

});


// 验证码
$.idcode.setCode();

$('.container').find('input').eq(3).change(function() {
    var IsBy = $.idcode.validateCode();
    if (IsBy) {
        success($(this), 3);
    } else {
        fail($(this), 3, '验证码输入错误');
    }
});

// 手机号码
var regPhoneNum = /^[0-9]{11}$/
$('.container').find('input').eq(4).change(function() {
    if (regPhoneNum.test($(this).val())) {
        success($(this), 4);
    } else {
        fail($(this), 4, '手机号码只能为11位数字');
    }
});

//短信验证码
var regMsg = /111111/;
$('.container').find('input').eq(5).change(function() {
    if (check[4]) {
        if (regMsg.test($(this).val())) {
            success($(this), 5);
        } else {
            fail($(this), 5, '短信验证码错误');
        }
    } else {
        $('.container').find('input').eq(4).parent().parent().removeClass('has-success').addClass('has-error');
    }

});


$('#loadingButton').click(function() {

    if (check[4]) {
        $(this).removeClass('btn-primary').addClass('disabled');

        $(this).html('<span class="red">59</span> 秒后重新获取');
        var secondObj = $('#loadingButton').find('span');
        var secondObjVal = secondObj.text();

        function secondCounter() {

            var secondTimer = setTimeout(function() {
                secondObjVal--;
                secondObj.text(secondObjVal);
                secondCounter();
            }, 1000);
            if (secondObjVal == 0) {
                clearTimeout(secondTimer);
                $('#loadingButton').text('重新获取校验码');
                $('#loadingButton').removeClass('disabled').addClass('btn-primary');

            }
        }

        secondCounter();
    } else {
        $('.container').find('input').eq(4).parent().parent().removeClass('has-success').addClass('has-error');
    }

})

$('#submit').click(function(e) {
    if (!check.every(function(value) {
            return value == true
        })) {
        e.preventDefault();
        for (key in check) {
            if (!check[key]) {
                $('.container').find('input').eq(key).parent().parent().removeClass('has-success').addClass('has-error')
            }
        }
    }
});

$('#reset').click(function() {
    $('input').slice(0, 6).parent().parent().removeClass('has-error has-success');
    $('.tips').hide();
    $('.glyphicon-ok').hide();
    $('.glyphicon-remove').hide();
    check = [false, false, false, false, false, false, ];
});
