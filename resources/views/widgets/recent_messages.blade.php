


@forelse ($firstmessage->proposal->messages as $message)

@if ($message->mymessage!=Auth::user()->id)
<div class="incoming_msg">
    <div class="incoming_msg_img"> <img
            src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
    <div class="received_msg">
        <div class="received_withd_msg">
            <p>  {{$message->message_text}}</p>
            <span class="time_date">
                {{ Carbon\Carbon::parse($message->created_at)->diffForHumans()}} </span>
            </div>
        </div>
    </div>
    @else
    <div class="outgoing_msg">
        <div class="sent_msg">
            <p>  {{$message->message_text}}</p>
            <span class="time_date">
                {{ Carbon\Carbon::parse($message->created_at)->diffForHumans()}} </span>
        </div>
    </div>
    @endif

    @empty
    <p class="bg-danger text-white p-1">No message</p>
    @endforelse

