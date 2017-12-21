<?php

namespace App\Http\Controllers\Lu;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Lu;
class ChatController extends Controller
{
    //
    function doctor (Request $request)
    {
        $user_id = $request->user_id;
        $doc_id = 1;
        $channel = new \App\Model\Lu\Channel;
        $channel = $channel->where('doc_id',$doc_id)->where('user_id',$user_id)->first();
        //判断频道是否存在
        //不存在，创建该频道
        if ( $channel == null ) {
          $channel = new \App\Model\Lu\Channel;
          $channel->doc_id = $doc_id;
          $channel->user_id = $user_id;
          $channel->msg_id = 1;
          // print_r($channel->toArray());
          $channel->save();
        }
        $channel = new \App\Model\Lu\Channel;
        $channel = $channel->where('doc_id',$doc_id)->where('user_id',$user_id)->first();
        // print_r($channel->toArray());
        //将频道号返回给页面
        return view('Lu.doctor_chat',compact('channel'));
        return 1;
    }
    function doctorCometHandle (Request $request)
    {
      // return $request->all();
      // print_r($request->all());

      $msg_id = $request->msg_id;
      $channel_id = $request->channel_id;
      $msg_director = 1;
      $message = \App\Model\Lu\Message::where('msg_id',$msg_id)
        ->where('channel_id',$channel_id)
        ->where('msg_director',$msg_director)
        ->first();
      if ( $message == null ) {
        $message = collect()->toJson();
        return $message;
      }
      return $message;
    }
    function doctorStore (Request $request)
    {
      //print_r($request->all());

      $message = new \App\Model\Lu\Message;

      $message->channel_id = $request->channel_id;
      $message->msg_director = ($request->msg_director == 1)?true:false;
      $message->msg_context = $request->msg_context;
      $msg_id = $message->msg_id = $request->msg_id;
      // print_r($message->toArray());
      $message->save();
      //维护  msg_id
      $msg_id = $msg_id + 1;
      echo $msg_id;
      $channel = \App\Model\Lu\Channel::where('channel_id', $message->channel_id)->update(['msg_id' => $msg_id]);
      // print_r($channel->toArray());
    }


    function index (Request $request, $uid)
    {
      // print_r($request->all());
      $doc_id = $request->doc_id;
      $user_id = $uid;
      $channel = new \App\Model\Lu\Channel;
      $channel = $channel->where('doc_id',$doc_id)->where('user_id',$user_id)->first();
      //判断频道是否存在
      //不存在，创建该频道
      if ( $channel == null ) {
        $channel = new \App\Model\Lu\Channel;
        $channel->doc_id = $doc_id;
        $channel->user_id = $user_id;
        $channel->msg_id = 1;
        // print_r($channel->toArray());
        $channel->save();
      }
      $channel = new \App\Model\Lu\Channel;
      $channel = $channel->where('doc_id',$doc_id)->where('user_id',$user_id)->first();
      // print_r($channel->toArray());
      //将频道号返回给页面
      return view('Lu.user_chat',compact('channel'));
    }

    function creatrChannel () {

      return 1;
    }

    function store (Request $request)
    {
      //print_r($request->all());

      $message = new \App\Model\Lu\Message;

      $message->channel_id = $request->channel_id;
      $message->msg_director = ($request->msg_director == 1)?true:false;
      $message->msg_context = $request->msg_context;
      $msg_id = $message->msg_id = $request->msg_id;
      // print_r($message->toArray());
      $message->save();
      //维护  msg_id
      $msg_id = $msg_id + 1;
      echo $msg_id;
      $channel = \App\Model\Lu\Channel::where('channel_id', $message->channel_id)->update(['msg_id' => $msg_id]);
      // print_r($channel->toArray());
    }

    function userCometHandle (Request $request)
    {
      // print_r($request->all());
      $msg_id = $request->msg_id;
      $channel_id = $request->channel_id;
      $msg_director = 0;
      $message = \App\Model\Lu\Message::where('msg_id',$msg_id)
        ->where('channel_id',$channel_id)
        ->where('msg_director',$msg_director)
        ->first();
      if ( $message == null ) {
        $message = collect()->toJson();
        return $message;
      }
      return $message;
    }
}
