@if(count($members) > 0)
    @foreach($members as $member)
        {{$member->userId}}<br>
    @endforeach
@else
    No members
@endif