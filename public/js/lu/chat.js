function userSendMsg ()
{

  var host = "/snprpc/lu/chat/1/";
  var context = $(" #user_input_context ").val();
  var msg_id = $("#msg_id").val();
  if (context == '') {
    $.alert('输入内容为空!');
  } else {
    var chatEmplement =
    '<div class="media"><div class="media-body"><h4 class="media-heading">我</h4>'+context+'</div><a href="#" class="media-left"><img class="img-rounded header media-object" src="/pic/ui_jenny.jpg" alt="媒体对象"></a></div>'
    // 1.将内容添加到屏幕
    $("#chat_screen").append(chatEmplement);
    // 2.将消息保存到数据库
    $.ajax({
      url:host+"store",
      data:$('#user_input_table').serialize(),
      type:'GET', //GET
      headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      dataType:'html',    //返回的数据格式：json/xml/html/script/jsonp/text
      success:function(data){
        console.log(data);
        $("#user_input_context").attr("value","");
        $("#msg_id").attr("value",++msg_id);

      }
    })
  }

}
