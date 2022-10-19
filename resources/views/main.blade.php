<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap');
        </style>
    <title>Document</title>
</head>
<body style="overflow: hidden;
">

    <div>
        <h1 style=" display:flex;
                    justify-content: center;"
        >{{$profile_summary->average_item_level}}ILVL</h1>
        <h2 style=" display:flex;
        justify-content: center;">{{$profile_summary->name}}</h2>
        <p style=" display:flex;
        justify-content: center; font-weight:bold; font-size: 24px;"> {{$profile_summary->level}} {{$profile_summary->race}} {{$profile_summary->specialization}} {{$profile_summary->playable_class}}</p>
        <div>
            <div class="items-left" style="float: left; font-family:'Roboto', sans-serif; font-weight: bold; font-size: 20px;">
                @for ($i = 0; $i < count($profile_summary->items) / 2; $i++)
                <div style="margin: 15px">
                    <img src="{{$profile_summary->items[$i]->item_url}}">    
                    <p style="display: inline;">{{$profile_summary->items[$i]->name}} {{$profile_summary->items[$i]->item_level}}</p>
                </div>
                @endfor
            </div>
            <div class="items-right" style="float: right; font-family:'Roboto', sans-serif; font-weight: bold; font-size: 20px;">
                @for ($i = count($profile_summary->items) / 2; $i < count($profile_summary->items) ; $i++)
                <div style="margin: 15px; position:static;">
                    <p style="display: inline;"> {{$profile_summary->items[$i]->name}} {{$profile_summary->items[$i]->item_level}}</p>
                    <img style="display: inline-block;"src="{{$profile_summary->items[$i]->item_url}}">     
                 </div>  
                @endfor       
            </div>
        </div>
        <img style=" display:inline-block;
        justify-content: center;
        width: 40%;
        padding-left: 300px;
        user-drag: none;
        "
        src="{{$profile_summary->image}}">
        
    </div>
</body>
</html>