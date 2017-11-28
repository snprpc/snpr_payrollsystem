<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="/css/bootstrap.css">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/jquery-confirm.css">
    <link rel="stylesheet" href="/css/lu/chat.css">
    <title>用户咨询界面</title>
  </head>
  <body>
    <div class="panel panel-default">
      <div class="panel-heading">
          <h3 class="panel-title">
              用户咨询界面
          </h3>
      </div>
      <div class="panel-body">
        <div id="chat_screen" class="screen">
        </div>
        <div class="input-board">
          <form id="user_input_table" class="user_inputinfo" action="{{ route('chat_store',['uid' => 1]) }}" method="GET">
              <input id="channel_id" type="hidden" class="form-control" name="channel_id" value="{{ $channel->channel_id }}" />
              <input id="msg_director" type="hidden" class="form-control" name="msg_director" value="1"/>
              <input id="msg_id" type="hidden" class="form-control" name="msg_id" value="{{ $channel->msg_id }}"/>
              <div class="input-group">
                <input id="user_input_context" name="msg_context" type="text" class="form-control" />
                <span class="input-group-btn">
                  <button type="button" class="btn btn-primary" onclick="userSendMsg()"
                    title="警告"  data-container="body" data-toggle="popover" data-placement="top"
  			              data-content="请输入内容后再发送">
                      <span class="glyphicon glyphicon-send"></span> 发送
                  </button>
                </span>
              </div><!-- /input-group -->
          </form>
        </div>
      </div>
    </div>
    <div id="msg"></div>
    <input id="btn-test" type="button" value="测试" />
    <script src="/js/jquery-1.8.3.min.js" charset="utf-8"></script>
    <script src="/js/bootstrap.min.js" charset="utf-8"></script>
    <script src="/js/lu/chat.js" charset="utf-8"></script>
    <script src="/js/jquery-confirm.js" charset="utf-8"></script>
    <script  type="text/javascript" >
      $(document).ready(function() {
        ajaxReq();
      });
      function ajaxReq(){
        var host = "/snprpc/lu/chat/1/";
        var msg_id = $("#msg_id").val();
        $("#btn-test").bind("click",function(){
          $.ajax({
            url:host+"recdocmsg",
            data:$('#user_input_table').serialize(),
            type:'GET', //GET
            headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            dataType:'json',    //返回的数据格式：json/xml/html/script/jsonp/text
            success:function(data){
              //console.log(data);
              if(data.length == 0){
                //console.log(data);
                $('#btn-test').trigger("click");
              }else{
                //console.log(data);
                var chatEmplement =
                '<div class="media"><a href="#" class="media-left"><img class="img-rounded header media-object" src="/pic/ui_jenny.jpg" alt="媒体对象"></a><div class="media-body"><h4 class="media-heading">王大夫</h4>'+data.msg_context+'</div></div>'
                $("#msg_id").attr("value",++msg_id);
                $("#chat_screen").append(chatEmplement);
                $('#btn-test').trigger("click");
              }

            },
            //Ajax请求超时，继续查询
            error:function(XMLHttpRequest,textStatus,errorThrown){

                $('#btn-test').trigger("click");
            }
          });
        });
        $('#btn-test').trigger("click");
      }
  </script>
  </body>
</html>
