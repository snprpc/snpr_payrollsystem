<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="/css/bootstrap.css">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/jquery-confirm.css">
    <link rel="stylesheet" href="/css/lu/chat.css">

    <title>医生问诊界面</title>
  </head>

  <body>
      <h2>为您诊疗</h2>
        <div id="chat_screen" class="screen">

        </div>
        <div class="input-board">
          <form id="doctor_input_table" class="doctor_inputinfo" action="{{ route('doctor_store') }}" method="GET">
              <input id="channel_id" type="hidden" class="form-control" name="channel_id" value="{{ $channel->channel_id }}" />
              <input id="msg_director" type="hidden" class="form-control" name="msg_director" value="0" />
              <input id="msg_id" type="hidden" class="form-control" name="msg_id" value="{{ $channel->msg_id }}"/>
              <div class="input-group">
                <input id="doctor_input_context" name="msg_context" type="text" class="form-control" />
                <span class="input-group-btn">
                  <button type="button" class="btn btn-primary" onclick="doctorSendMsg()"
                    title="警告"  data-container="body" data-toggle="popover" data-placement="top"
  			              data-content="请输入内容后再发送">
                      <span class="glyphicon glyphicon-send"></span> &nbsp;&nbsp;发&nbsp;&nbsp;&nbsp;送&nbsp;&nbsp;
                  </button>
                </span>
              </div><!-- /input-group -->
          </form>
        </div>
    <input type="button" name="btn-test" value="" id="btn-test" hidden="true"/>
    <script src="/js/jquery-1.8.3.min.js" charset="utf-8"></script>
    <script src="/js/bootstrap.min.js" charset="utf-8"></script>
    <script src="/js/lu/chat.js" charset="utf-8"></script>
    <script src="/js/jquery-confirm.js" charset="utf-8"></script>
    <script  type="text/javascript">

      $(document).ready(function() {
        ajaxReq2();
      });
      function sleep(n) { //n表示的毫秒数
               var start = new Date().getTime();
               while (true) if (new Date().getTime() - start > n) break;
      }
      function ajaxReq2(){
        // console.log(1);
        var host = "/snprpc/lu/chat/doctor1/";
        var msg_id = $("#msg_id").val();
        var tmp = parseInt(msg_id)-1;

        $("#btn-test").bind("click",function(){
          $.ajax({
            url:host+"recusrmsg",
            data:$('#doctor_input_table').serialize(),
            type:'GET', //GET
            headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            dataType:'json',    //返回的数据格式：json/xml/html/script/jsonp/text
            success:function(data){
              // console.log(data);
              if(data.length == 0){
                //console.log(data);
                sleep(700);
                $('#btn-test').trigger('click');
              }else{
                console.log(data);
                var chatEmplement =
                '<div class="media media-doctor"><a href="#" class="media-left"><img class="img-circle header media-object" src="/pic/ui_jenny.jpg" alt="媒体对象"></a><p>'+data.msg_context+'</p></div>'
                $("#msg_id").attr("value",++msg_id);
                console.log("tmp:"+tmp);
                console.log("msg_id:"+data.msg_id);
                if (tmp+1 == data.msg_id){
                  $("#chat_screen").append(chatEmplement);
                  tmp = tmp+2;
                }
                sleep(2000);
                $('#btn-test').trigger("click");
              }
            },
            //Ajax请求超时，继续查询
            error:function(XMLHttpRequest,textStatus,errorThrown){
                sleep(700);
                console.log(222222222222);
                $('#btn-test').trigger('click')
            }
          });
        });
        console.log(222222222222);
        $('#btn-test').trigger('click');
      }
  </script>
  </body>
</html>
