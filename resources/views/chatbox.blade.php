@extends('layouts.master')

@section('content')
<div class="container">
    <div class="messaging">
        <div class="inbox_msg">
            <div class="inbox_people">
                <div class="headind_srch">
                    <div class="recent_heading">
                        <h4>Chat</h4>
                    </div>
                </div>
                <div class="inbox_chat" id="inbox_chat">
                @role(['kab_kota', 'provinsi'])
                    <div class="chat_list active_chat">
                        <div class="chat_people">
                            <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                            <div class="chat_ib">
                                <h5>Admin {{ $data->username }} <span class="badge bg-danger">{{ $new ? $new[0]->count : 0 }}</span></h5>
                            </div>
                        </div>
                        <input type="hidden" class="user_to_id" value="{{ $data->id }}">
                    </div>
                @endrole
                </div>
            </div>
            <div class="mesgs">
                <div class="msg_history" id="msg_history">
                    
                </div>
                <div class="type_msg" style="display: none;">
                    <div class="input_msg_write">
                        <textarea cols="5" rows="5" class="write_msg" id="write_msg" placeholder="Type a message"></textarea>
                        <input type="hidden" id="msg_user_id">
                        <button class="msg_send_btn" id="msg_send_btn" type="button"><i class="fa-solid fa-paper-plane fa-xs"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
    <style>
        .container {
            max-width:1170px;
            margin:auto;
        }
        img {
            max-width:100%;
        }
        .inbox_people {
            background: #f8f8f8 none repeat scroll 0 0;
            float: left;
            overflow: hidden;
            width: 40%;
            border-right:1px solid #c4c4c4;
        }
        .inbox_msg {
            border: 1px solid #c4c4c4;
            clear: both;
            overflow: hidden;
        }
        .top_spac{
            margin: 20px 0 0;
        }
        .recent_heading {
            float: left;
            width:40%;
        }
        .srch_bar {
            display: inline-block;
            text-align: right;
            width: 60%;
        }
        .headind_srch {
            padding:10px 29px 10px 20px;
            overflow:hidden;
            border-bottom:1px solid #c4c4c4;
        }
        .recent_heading h4 {
            color: #eb4c50;
            font-size: 21px;
            margin: auto;
        }
        .srch_bar input {
            border:1px solid #cdcdcd;
            border-width:0 0 1px 0;
            width:80%;
            padding:2px 0 4px 6px;
            background:none;
        }
        .srch_bar .input-group-addon button {
            background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
            border: medium none;
            padding: 0;
            color: #707070;
            font-size: 18px;
        }
        .srch_bar .input-group-addon {
            margin: 0 0 0 -27px;
        }
        .chat_ib h5{
            font-size:15px;
            color:#464646;
            margin:0 0 8px 0;
        }
        .chat_ib h5 span{
            font-size:13px;
            float:right;
        }
        .chat_ib p{
            font-size:14px;
            color:#989898;
            margin:auto;
            text-overflow: ellipsis;
            display: -webkit-box;
            -webkit-line-clamp: 2; /* number of lines to show */
                    line-clamp: 2; 
            -webkit-box-orient: vertical;
        }
        .chat_img {
            float: left;
            width: 11%;
        }
        .chat_ib {
            float: left;
            padding: 10px 0 0 15px;
            width: 88%;
        }
        .chat_people{
            overflow:hidden;
            clear:both;
        }
        .chat_list {
            border-bottom: 1px solid #c4c4c4;
            margin: 0;
            padding: 18px 16px 10px;
        }
        .inbox_chat {
            height: 620px;
            overflow-y: scroll;
        }
        .active_chat{
            background:#ebebeb;
        }
        .incoming_msg_img {
            display: inline-block;
            width: 6%;
        }
        .received_msg {
            display: inline-block;
            padding: 0 0 0 10px;
            vertical-align: top;
            width: 92%;
        }
        .received_withd_msg p {
            background: #ebebeb none repeat scroll 0 0;
            border-radius: 3px;
            color: #646464;
            font-size: 14px;
            margin: 0;
            padding: 5px 10px 5px 12px;
            width: 100%;
        }
        .time_date {
            color: #747474;
            display: block;
            font-size: 12px;
            margin: 8px 0 0;
        }
        .received_withd_msg {
            width: 57%;
        }
        .mesgs {
            float: left;
            padding: 30px 15px 0 25px;
            width: 60%;
        }
        .sent_msg p {
            background: #eb4c50 none repeat scroll 0 0;
            border-radius: 3px;
            font-size: 14px;
            margin: 0;
            color:#fff;
            padding: 5px 10px 5px 12px;
            width:100%;
        }
        .outgoing_msg{
            overflow:hidden;
            margin:26px 0 26px;
        }
        .sent_msg {
            float: right;
            width: 46%;
        }
        .input_msg_write textarea {
            background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
            border: medium none;
            color: #4c4c4c;
            font-size: 15px;
            min-height: 48px;
            width: 100%;
            border: none;
            outline: none;
            overflow: hidden;
            padding-right: 45px;
        }
        .type_msg {
            border-top: 1px solid #c4c4c4;
            position: relative;
        }
        .msg_send_btn {
            background: #eb4c50 none repeat scroll 0 0;
            border: medium none;
            border-radius: 50%;
            color: #fff;
            cursor: pointer;
            /* font-size: 17px; */
            height: 33px;
            position: absolute;
            right: 0;
            top: 11px;
            width: 33px;
        }
        .messaging {
            padding: 0 0 50px 0;
        }
        .msg_history {
            height: 516px;
            overflow-y: auto;
        }

    </style>
@endsection
@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/all.min.js"></script>
    <script src="//js.pusher.com/3.1/pusher.min.js"></script>
    <script>
        Pusher.logToConsole = true;

        var pusher = new Pusher('8065b88b38209d3beaa9', {
            cluster: 'ap1'
        });

        var channel = pusher.subscribe('channel-chat');
        
        channel.bind('chat-in-out', function(data) {
            @role(['kemendagri'])
            getChatList();
            if ($("#msg_user_id").val()) {
                getConversation($("#msg_user_id").val());
            }
            @endrole

            @role(['kab_kota', 'provinsi'])
                getConversation($("#msg_user_id").val());
            @endrole
        });

        $("#msg_send_btn").on("click", function () {
            let html = ''
            
            $.ajax({
                type: "POST",
                url: "{{ route('chat.store') }}",
                data: {
                    to: $("#msg_user_id").val(),
                    message: $("#write_msg").val(),
                    _token: `{{ csrf_token() }}`
                },
                dataType: "json",
                success: function(response) {
                    $("#write_msg").val('')
                },
                error: function(err) {
                }
            });
        })

        $("#inbox_chat").on("click", ".chat_list", function () {
            let user_to_id = $(this).find('.user_to_id').val()

            getConversation(user_to_id)
            $(".type_msg").show()
        })

        function getConversation(user_to_id) {
            $("#msg_user_id").val(user_to_id)

            $.ajax({
                type: "POST",
                url: "{{ route('chat.conversation') }}",
                data: {
                    from: $("#msg_user_id").val(),
                    _token: `{{ csrf_token() }}`
                },
                dataType: "json",
                success: function (response) {
                    if (response.data) {
                        $("#msg_history").html('')
                        html = ''

                        $.each(response.data, function (index, val) {
                            if (val.from == `{{ Auth::user()->id }}`) {
                                html += `
                                <div class="outgoing_msg" style="margin-top: 20px;">
                                <div class="sent_msg">
                                <p style="white-space: pre-line">${val.message}</p>
                                <span class="time_date">${timeAgo(val.created_at)}</span> 
                                </div>
                                </div>
                                `
                            } else {
                                html += `
                                <div class="incoming_msg" style="margin-top: 20px;">
                                    <div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                                    <div class="received_msg">
                                        <div class="received_withd_msg">
                                            <p style="white-space: pre-line">${val.message}</p>
                                            <span class="time_date">${timeAgo(val.created_at)}</span>
                                        </div>
                                    </div>
                                </div>
                                `
                            }
                        });

                        $("#msg_history").html(html)
                    }
                }
            });
        }

        function getChatList() {
            $.ajax({
                type: "POST",
                url: "{{ route('chat.chat-list') }}",
                data: {
                    _token: `{{ csrf_token() }}`
                },
                dataType: "json",
                success: function (response) {
                    html = ''

                    if (response.data) {
                        $.each(response.data, function (index, val) {
                            console.log(index)
                            html += `
                            <div class="chat_list active_chat">
                                <div class="chat_people">
                                    <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                                    <div class="chat_ib">
                                        <h5>${val.username} <span class="badge bg-danger">${response.new ? response.new[index].count : 0}</span></h5>
                                    </div>
                                </div>
                                <input type="hidden" class="user_to_id" value="${val.id}">
                            </div>
                            `
                        });

                        $("#inbox_chat").html(html)
                    }
                }
            });
        }

        @role(['kemendagri'])
            getChatList();
        @endrole

        const MONTH_NAMES = [
            'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'
        ];


        function getFormattedDate(date, prefomattedDate = false, hideYear = false) {
            const day = date.getDate();
            const month = MONTH_NAMES[date.getMonth()];
            const year = date.getFullYear();
            const hours = date.getHours();
            let minutes = date.getMinutes();

            if (minutes < 10) {
                // Adding leading zero to minutes
                minutes = `0${ minutes }`;
            }

            if (prefomattedDate) {
                // Today at 10:20
                // Yesterday at 10:20
                return `${ prefomattedDate } at ${ hours }:${ minutes }`;
            }

            if (hideYear) {
                // 10. January at 10:20
                return `${ day }. ${ month } at ${ hours }:${ minutes }`;
            }

            // 10. January 2017. at 10:20
            return `${ day }. ${ month } ${ year }. at ${ hours }:${ minutes }`;
        }


        // --- Main function
        function timeAgo(dateParam) {
            if (!dateParam) {
                return null;
            }

            const date = typeof dateParam === 'object' ? dateParam : new Date(dateParam);
            console.log(date)
            const DAY_IN_MS = 86400000; // 24 * 60 * 60 * 1000
            const today = new Date();
            const yesterday = new Date(today - DAY_IN_MS);
            const seconds = Math.round((today - date) / 1000);
            const minutes = Math.round(seconds / 60);
            const isToday = today.toDateString() === date.toDateString();
            const isYesterday = yesterday.toDateString() === date.toDateString();
            const isThisYear = today.getFullYear() === date.getFullYear();


            if (seconds < 5) {
                return 'now';
            } else if (seconds < 60) {
                return `${ seconds } seconds ago`;
            } else if (seconds < 90) {
                return 'about a minute ago';
            } else if (minutes < 60) {
                return `${ minutes } minutes ago`;
            } else if (isToday) {
                return getFormattedDate(date, 'Today'); // Today at 10:20
            } else if (isYesterday) {
                return getFormattedDate(date, 'Yesterday'); // Yesterday at 10:20
            } else if (isThisYear) {
                return getFormattedDate(date, false, true); // 10. January at 10:20
            }

            return getFormattedDate(date); // 10. January 2017. at 10:20
        }
    </script>
@endsection
