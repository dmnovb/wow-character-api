<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body style="overflow: hidden">
 
    {{-- @section('content') --}}

    <div>
        {{-- <path xmlns="http://www.w3.org/2000/svg">d="M13.593 18.962l-6.729 7.035c-.135.142-.061.383.128.417l3.932.683a.23.23 0 00.205-.068l3.428-3.584 7.684 7.93 3.927-4.106.346-.362 3.725-3.896-7.684-7.928 3.646-3.814a.252.252 0 00.066-.213l-.654-4.112a.232.232 0 00-.398-.133l-6.853 7.167L7.485 4.401V.428A.42.42 0 007.075 0H.791a.419.419 0 00-.409.428v6.571c0 .236.183.427.409.427h3.512l9.29 11.536zm27.505 15.599l-3.8 3.972-.24.251-3.958 4.139 18.652 19.411L61.562 64l-1.671-9.882-18.793-19.557zM63.209.017h-6.283a.418.418 0 00-.409.428v3.672L45.483 13.83l-6.728-7.034c-.135-.143-.366-.065-.397.132l-.654 4.111a.253.253 0 00.066.214l3.428 3.585L4.002 53.726 2.408 63.983l9.451-1.748 37.336-39.036 3.646 3.812a.23.23 0 00.205.069l3.931-.684c.188-.031.263-.274.128-.415l-6.854-7.166L59.41 7.442h3.799a.418.418 0 00.409-.428V.444a.418.418 0 00-.409-.427z"></path> --}}
        <h1>{{$profile_summary->average_item_level}}ILVL</h1>
        <h2>{{$profile_summary->name}}</h2>
        <p> {{$profile_summary->level}} {{$profile_summary->race}} {{$profile_summary->specialization}} {{$profile_summary->playable_class}}</p>
        {{-- @foreach ($profile_summary->weapons as $weapon)
            <p>{{$weapon}}</p>
        @endforeach --}}
        {{-- <div class="items">
            @foreach ($profile_summary->items as $item)
            <p>{{$item['name']}}</p>
            @endforeach
         </div> --}}
        <div class="item_level">
            {{-- @foreach ($profile_summary->item_level as $item_level)
            <p>{{$item_level}}</p>
            @endforeach --}}
            @for ($i = 0; $i < count($profile_summary->items) / 2; $i++)
                <p>{{$profile_summary->items[$i]->name}}</p>
            @endfor

            @for ($i = count($profile_summary->items) / 2; $i < count($profile_summary->items) ; $i++)
                <p>{{$profile_summary->items[$i]->name}}</p>
            @endfor
         
        </div>
        <img style="width: 100%;
                    position:absolute;
                    justify-content: center;
        "
        src="{{$profile_summary->image}}">
        
    </div>

    {{-- @endsection --}}
</body>
</html>