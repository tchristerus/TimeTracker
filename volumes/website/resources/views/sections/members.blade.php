<div class="bs-component">
    <div class="list-group">

        @foreach ($users as $user)
            <div class="list-group-item">
                <div class="row-picture">
                    <img class="circle" src="/img/profileImage.jpg" alt="icon">
                </div>
                <div class="row-content">
                    <h4 class="list-group-item-heading">{{$user->forename}} {{$user->surname}}</h4>

                    <p class="list-group-item-text">{{$user->email}}</p>
                </div>
            </div>
            <div class="list-group-separator"></div>
        @endforeach
    </div>
</div>