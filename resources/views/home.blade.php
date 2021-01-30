@extends('layouts.welcome')

@section('content')
<div id="home-header"></div>
<div id="news-section">
    @foreach($articles as $item)
        <div>
            <div class="newsImage"><img src="{{Storage::disk('local')->url($item->smallPic)}}" alt="{{$item->title}}"></div>
            <a href="/news/{{$item['id']}}"><h2>{{$item['title']}}</h2></a>
            <p>{{$item->description}}</p>
        </div>

    @endforeach
</div>
<div id="video">
    <iframe width="627" height="355" src="https://www.youtube.com/embed/1O6Qstncpnc?start=3"
            frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
            allowfullscreen>
    </iframe>
    <p>This is the legacy</p>
</div>
<div id="description">
    <div id="home-image"></div>
    <div class="game-description-container">
        <h1>This is Hogwarts...</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum amet pharetra quisque eu nisi, arcu leo ultrices velit. Vulputate tincidunt in nulla lobortis et montes, quis. Et, sem morbi enim tincidunt eros, amet pulvinar. Id odio tincidunt mauris magna nam sed natoque. Quis morbi elit, sit in erat velit est quis fermentum. Nec, fermentum mi et, velit sit viverra mattis neque. Laoreet gravida eu egestas placerat massa. Et libero ipsum pellentesque pellentesque varius diam arcu, ullamcorper elementum.
            <br><br>
            Vitae at adipiscing erat dui volutpat pellentesque vulputate. Aenean feugiat vitae volutpat, donec ligula varius massa nulla sapien. Aliquet faucibus urna sed gravida ullamcorper in. Dui diam felis fringilla nisi gravida urna, ultrices mi viverra. Tempor sed sapien turpis etiam. Gravida tempor egestas hac habitant diam nulla sed.
            <br><br>
            Luctus elit eget nec accumsan commodo, ultrices proin in ac. Ullamcorper sagittis arcu ut enim, purus. Mauris.
            <br><br>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis fringilla faucibus egestas. Vivamus eget ante suscipit, luctus tellus eget, pellentesque tellus. Sed porttitor est nisi, vel fringilla eros blandit quis. Vivamus sed velit vel odio feugiat sollicitudin. Aliquam gravida risus luctus, consectetur lacus non, sagittis felis. Nullam facilisis dui enim, a ullamcorper urna elementum pretium. Mauris ultrices metus a turpis dapibus, eu efficitur quam scelerisque.

            Sed hendrerit, enim nec cursus dignissim, ipsum tellus consequat magna, porta vehicula nunc tellus eu nulla. Duis ut quam ullamcorper, feugiat massa nec, lacinia leo. Mauris vitae ante et nibh condimentum gravida. Etiam sed tempus leo. Ut eget tincidunt nisl, et cursus enim. Cras mattis lacus nec orci euismod, sed venenatis sapien mollis. Nulla nec ipsum sit amet neque dignissim gravida ut tristique arcu. Donec id maximus arcu.
            <br><br>
            Donec velit risus, tristique vestibulum luctus vitae, blandit sit amet odio. Morbi quis facilisis tellus. Nullam egestas nisl quis dui convallis vehicula. Nunc commodo nunc vel dolor tristique, quis ullamcorper turpis bibendum. Donec venenatis, nisi sed ullamcorper vulputate, augue nulla viverra sapien, ut euismod nisi elit a nulla. Maecenas non lorem nec ante ultricies sagittis vel et erat. Etiam vitae condimentum lacus. Vivamus ac egestas arcu, in aliquam orci.
            <br><br>
            Mauris eros libero, ultrices sit amet finibus at, finibus aliquet sem. In vel efficitur magna. Praesent lacus tortor, sollicitudin eget velit sit amet, vehicula auctor ex. Nullam tincidunt vehicula magna, at gravida tortor pharetra in. Sed pharetra, erat sed pretium egestas, quam enim auctor magna, id consequat ligula lacus id quam. Vivamus vitae turpis dui. Suspendisse posuere et mi a pellentesque. In consectetur dui urna, ut egestas enim vehicula eu. Etiam quis orci dolor. Donec eros sapien, convallis et lectus ut, dignissim malesuada libero.
        </p>
    </div>

</div>
@endsection
