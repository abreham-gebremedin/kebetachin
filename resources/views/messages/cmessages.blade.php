@extends('layouts.app')

@section('content')

<style>
    section {
        padding-top: 10px;
        padding-bottom: 60px;
        background: #f5f5f5;
    }


    .chat-list-box {
        display: inline-block;
        width: 100%;
        background: #fff;
        box-shadow: 0px 10px 30px 0px rgba(50, 50, 50, 0.16);
    }

    .flat-icon li {
        display: inline-block;
        padding: 0px 8px;
        vertical-align: middle;
        position: relative;
        top: 7px;
    }

    .flat-icon a img {
        width: 22px;
        border-radius: unset !important;
    }

    ul.list-inline.text-left.d-inline-block.float-left {
        margin-bottom: 0;
    }

    .chat-list-box ul li img {
        border-radius: 50px;
    }

    .message-box {
        display: inline-block;
        width: 100%;
        background: #fff;
        box-shadow: 0px 10px 30px 0px rgba(50, 50, 50, 0.16);
    }

    .msg-box li {
        display: inline-block;
        padding-left: 10px;
    }

    .msg-box img {
        border-radius: 50px;
    }

    .msg-box li span {
        padding-left: 8px;
        color: #545454;
        font-weight: 550;
    }

    .head-box {
        display: flow-root;
        padding: 10px;
        background: green;
    }

    .head-box ul li a {
        color: #fff;
    }

    .chat-person-list {
        padding: 14px;
    }

    .chat-person-list ul li img {
        width: 30px;
        border-radius: 50px;
    }

    .chat-person-list ul li span {
        padding-left: 20px;
    }

    .chat-person-list ul li {
        line-height: 55px;
    }

    .chat-person-list ul li:hover {
        background: #b35900;
        color: #ffffff;

    }

    span.chat-time {
        float: right;
        font-size: 12px;
    }

    .head-box-1 {
        display: flow-root;
        padding: 10px;
        background: green;
    }

    .head-box-1 ul li i {
        color: #fff;
        cursor: pointer;
    }

    .head-box-1 ul li span {
        color: #fff;
        position: relative;
        top: -10px;
    }

    .msg_history {
        padding: 10px;
        height: 280px;
        overflow: overlay;
    }

    .incoming_msg_img {
        display: inline-block;
        width: 6%;
    }

    .timee {
        position: absolute;
        left: 115px;
        top: 30px;
        color: #fff;
    }

    .received_msg {
        display: inline-block;
        padding: 0 0 0 10px;
        vertical-align: top;
        width: 92%;
    }

    .received_withd_msg {
        width: 57%;
    }

    .received_withd_msg p {
        background: green none repeat scroll 0 0;
        border-radius: 3px;
        color: #ffffff;
        font-size: 14px;
        margin: 0;
        padding: 5px 10px 5px 22px;
        width: 100%;
        border-bottom-right-radius: 50px;
        border-top-left-radius: 50px;
    }

    .time_date {
        color: #747474;
        display: block;
        font-size: 12px;
        margin: 8px 0 0;
    }

    .incoming_msg_img img {
        width: 100%;
        border-radius: 50px;
        float: left;
    }

    .outgoing_msg {
        overflow: hidden;
        margin: 10px 0 10px;
    }

    .sent_msg {
        float: right;
        width: 46%;
    }

    .sent_msg p {
        background: #b35900;
        border-radius: 3px;
        font-size: 14px;
        margin: 0;
        color: #ffffff;
        padding: 5px 10px 5px 22px;
        width: 100%;
        border-bottom-right-radius: 50px;
        border-top-left-radius: 50px;
    }

    .chat-person-list ul li a {
        color: #545454;
        text-decoration: none;
    }

    .attachement {
        background: #777;
        position: absolute;
        width: 220px;
        right: 30%;
        top: 42px;
        display: none;
    }



    .attachement ul li a {
        color: #fff;
    }

    .setting-drop {
        display: none;
        position: absolute;
        width: 130px;
        height: 148px;
        right: 0;
        top: 42px;
        background: #ffffff;
        color: #545454;
        box-shadow: 1px 1px 15px 1px #0000001f;
    }

    .send-message {
        padding: 15px;
        background: #b35900;
        height: auto;
    }

    .send-message textarea:focus {
        box-shadow: none;
        outline: none;
        border-color: #ddd;
    }



    .send-message ul li i {
        color: #0056b3;
    }

    .send-message ul li a {
        color: #0056b3;
    }

    .send-message ul {
        position: absolute;
        right: 45px;
        top: 88%;
        border-left: 1px solid #9c9a9a;
    }

    .send-message .form-control {
        border-radius: 50px;
    }

    .input_msg_write .control {
        background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
        border: medium none;
        color: #4c4c4c;
        font-size: 15px;
        min-height: 48px;
        width: 80%;

    }

    .type_msg {
        border-top: 1px solid #c4c4c4;
        position: relative;
    }

    .msg_send_btn {
        background: green none repeat scroll 0 0;
        border: medium none;
        border-radius: 50%;
        color: #fff;
        cursor: pointer;
        font-size: 17px;
        height: 33px;
        position: absolute;
        right: 0;
        top: 11px;
        width: 33px;
    }

    @media only screen and (max-width: 800px) {

        .message-box {
            display: none;
            position: relative;
            top: -50%;

        }

    }
</style>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">

<section>

    <section>
        <div class="row">
            <div class="col-md-4">
                <div class="chat-list-box">
                    <div class="head-box">
                        <ul class="list-inline text-left d-inline-block float-left">
                            <li> <img src="https://i.ibb.co/fCzfFJw/person.jpg" alt="" width="40px"> </li>
                        </ul>
                        <ul class="flat-icon list-inline text-right d-inline-block float-right">
                            <li> <a href="#"> <i class="fas fa-search"></i> </a> </li>
                            <li> <a href="#"> <i class="fas fa-ellipsis-v"></i> </a> </li>
                        </ul>
                    </div>

                    <div class="chat-person-list" class="flip">
                        <ul class="list-inline">
                            @foreach($contracts as $contract)
                            <li> <a href="{{url('view/'.$contract->proposal->id.'/cmessages')}}" class="flip"> <img
                                        src="https://i.ibb.co/6JpcfrK/p4.png" alt="">
                                    <span>{{$contract->freelancer->user->name}}({{$contract->proposal->job->name}})
                                    </span>
                                    <span class="chat-time">12:00 Am</span> </a> </li>
                            @endforeach
                        </ul>
                    </div>

                </div>
            </div> <!-- col-md-4 closed -->

            <div class="col-md-8">
                <div class="message-box">
                    <div class="head-box-1">

                        <ul class="msg-box list-inline text-left d-inline-block float-left">
                            <li> <i class="fas fa-arrow-left" id="back"></i> </li>
                            <li> <img src="https://i.ibb.co/fCzfFJw/person.jpg" alt="" width="40px">
                                <span>{{$firstmessage->proposal->freelancer->user->name}}
                                    {{$firstmessage->proposal->freelancer->user->last_name}}
                                </span> <br>
                                <small class="timee"> 12:45 Pm </small> </li>
                        </ul>


                    </div>

                    <div class="msg_history">
                        <div class="incoming_msg">
                            <div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png"
                                    alt="sunil"> </div>

                        </div>

                        @widget('recentMessages',['id'=>$firstmessage->proposal->id])


                    </div>
                    <script>
                        $('body').keypress(function (e) {
                            if (e.keyCode == 13) {
                                $('#messageform').submit();
                            }
                        });
                    </script>
                    <div class="send-message">
                        <form id="quickForm" action="/sendmessage" method="POST" id="messageform">
                            @csrf
                            <input type="hidden" value="{{$firstmessage->proposal->id}}" name="proposal">
                            <textarea cols="10" rows="2" class="form-control" name="message"
                                placeholder="Type your message here ..."> </textarea>
                            <button class="btn btn-lg btn-success float-right" type="submit">Send <span
                                    class="fas fa-paper-plane"></span>
                            </button>
                        </form>
                    </div>



                </div>
            </div>

        </div>
        <script>
            flip();
        </script>
    </section>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <script>
        $("#attach").click(function () {
            $(".attachement").toggle();
        });
    </script>
    <script>
        $("#dset").click(function () {
            $(".setting-drop").toggle('1000');
        });
    </script>

    <script>
        $(document).ready(function () {

            $(".message-box").show("slide", {
                direction: "right"
            }, 10000);

        });

        function flip() {
            $(".flip").click(function () {
                $(".message-box").show("slide", {
                    direction: "right"
                }, 10000);
            });
        }
    </script>
    <script>
        $(document).ready(function () {
            $("#back").click(function () {
                $(".message-box").hide("slide", {
                    direction: "left"
                }, 10000);
            });
        });
    </script>
    <script type="text/javascript">
 
        $('#quickForm').validate({
          rules: {
            proname: {
              lettersonly: true,
              required: true,
              minlength: 3,
      
             },
            overview: {
              required: true,
              minlength: 40,
            },
            terms: {
              required: true
            },
          },
          messages: {
            proname: {
              required: "Please enter your professional name  e.g Article writer",
              minlength: " must be at least 3 characters long"
      
             },
            overview: {
              required: "Please provide a description",
              minlength: "Your password must be at least 40 characters long"
            },
            terms: "Please accept our terms"
          },
          errorElement: 'span',
          errorPlacement: function (error, element) {
            error.addClass('invalid-feedback');
            element.closest('.form-group').append(error);
          },
          highlight: function (element, errorClass, validClass) {
            $(element).addClass('is-invalid');
          },
          unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
          }
        });
       
      </script>
    @endsection