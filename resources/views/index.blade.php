<!DOCTYPE html>
<html lang = "en">

<head>
    <title>DictioNorLax</title>
    <meta charset = "UTF-8">
    <meta http-equiv = "X-UA-Compatible" content = "IE=edge">
    <meta name =" viewport" content="width=device-width, initial-scale=1.0">
    <link href = "https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel = "stylesheet">
    <link rel = "icon" href = "/images/favicon.ico" type = "image/x-icon"> 
    <link rel = "stylesheet" href = "{{ asset('css/style.css') }}">
</head>
<body>
  <nav class = "navbar" style = "height: 70px;">
    <div class = "snorlax">
      <img style = "height: 50px;" src = "/images/snorlax.png">
    </div>
    <a class = "title" href = "/"><h3>DictioNorLax</h3></a>
    <form method = "POST" action = "/search/{term}">
      @csrf
      <input class = "form-control" type = "text" placeholder = "Type the word here..." name = "term" value = "@isset($term){{ $term }}@endisset">
      <button class = "btn" type = "submit" name = "search-btn">Search</button>
    </form>
    <img style = "padding-right: 10px;" class = "about" src = "https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/f/8e6c39c7-7710-4e4b-a7b4-8ab11887e367/d72rwr7-4b8208fd-24d7-4f5a-86d1-aec935d06e37.png?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJ1cm46YXBwOjdlMGQxODg5ODIyNjQzNzNhNWYwZDQxNWVhMGQyNmUwIiwiaXNzIjoidXJuOmFwcDo3ZTBkMTg4OTgyMjY0MzczYTVmMGQ0MTVlYTBkMjZlMCIsIm9iaiI6W1t7InBhdGgiOiJcL2ZcLzhlNmMzOWM3LTc3MTAtNGU0Yi1hN2I0LThhYjExODg3ZTM2N1wvZDcycndyNy00YjgyMDhmZC0yNGQ3LTRmNWEtODZkMS1hZWM5MzVkMDZlMzcucG5nIn1dXSwiYXVkIjpbInVybjpzZXJ2aWNlOmZpbGUuZG93bmxvYWQiXX0.Jga2XHTHIpj4WOaz2sTgcUJlMCdTxamCwjNYIfDXY2k">
    <a href = "/about" style="color: #FFC107;">About</a>
  </nav>
  <div class = "container">
    <label>
      @isset($term)
        {{ $term }}
      @endisset
    </label>
    <div class="meaning">
      <p>
        @isset($result1)
          {{ $result1}}
        @endisset
      </p>
    </div>
    <div class = "meaning">
      <p>
        @isset($result2)
          {{ $result2 }}
        @endisset
      </p>
    </div>
    <div class = "meaning">
      <p>
        @isset($result3)
          {{ $result3 }}
        @endisset
      </p>
      </div>
    </div>
    <div class = "vocabularyLabel">
      <label>New Vocabulary</label>
    </div>
    <div class = "newVocabulary">
      <p>
        <big><u>{{$vocabulary1Array['0']['word']}}</u></big><br>
        <small><i>{{$vocabulary1Array['0']['pronunciation']}}</i></small><br>
        ___________________ <br> {{ $vocabulary1Array['0']['definition'] }}
      </p>
    </div>
    <div class = "newVocabulary">
      <p>
        <big><u>{{$vocabulary2Array['0']['word']}}</u></big><br>
        <small><i>{{$vocabulary2Array['0']['pronunciation']}}</i></small><br>
        ___________________ <br> {{ $vocabulary2Array['0']['definition'] }}
      </p>
    </div>
    <div class = "newVocabulary">
      <p>
        <big><u>{{$vocabulary3Array['0']['word']}}</u></big><br>
        <small><i>{{$vocabulary3Array['0']['pronunciation']}}</i></small><br>
        ___________________ <br> {{ $vocabulary3Array['0']['definition'] }}
      </p>
    </div>
    <div class = "wordOfTheDay">
      <label style = "margin-top: 30px">Word of the day: <u> {{ucfirst($wordofthedayArray['word'])}}</u><br><label>
      <p style = "margin-left: 20px">{{$wordofthedayArray['definitions'][0]['text']}}</p>
    </div>
</body>

</html>