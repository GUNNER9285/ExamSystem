<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
        <a class="navbar-brand" href="{{URL::to('/exam')}}">ข้อสอบ</a>
        <div class="nav justify-content-end">
            <span style="color: #ffffff;"> {{$user['username']}} :</span>
            <span style="color: #ffffff;">&nbsp;{{$user['score']}} คะแนน</span>
        </div>
    </div>
</nav>