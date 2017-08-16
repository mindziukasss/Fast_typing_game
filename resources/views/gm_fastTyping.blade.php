@extends('core')
@section('content')

    <div class="box">
        <div id="register" class="hidden">
            <h2>Welcome to the game!</h2>
            <label>Please register</label>
            <input id="name" type="text" class="form-control" placeholder="Player name">
            <button id="go" class="btn btn-primary">Register to game</button>
            <br>
            <br>
            <a id="link" href='{{ route('app.fastTyping.statistic') }}'>Game statistic</a>
        </div>
        <div id="level" class="hidden">
            <h4> Player name: <span id="gamerName"></span></h4>
            <h2>Select level</h2>
            <input type="radio" name="play" value="7" checked><label>Easy</label>
            <input type="radio" name="play" value="4"><label>Normal</label>
            <input type="radio" name="play" value="2"><label>Hard</label>
            <button id="play" class="btn btn-success">Go play!</button>
            <br>
            <br>
            <a id="link" href='{{ route('app.fastTyping.statistic') }}'>Game statistic</a>
        </div>
        <div id="game" class="hidden">
            <div class="col-md-6">
                <h5>Name:<span id="gamer"></span></h5>
            </div>
            <div class="col-md-6">
                <h4>Score:<span id="score">0</span></h4>
            </div>
            <h3>Play now!!!</h3>

            <h2 class="button" id="point"></h2>

            <div class="col-md-6">
                <h4>Live:<span id="live">+3</span></h4>
            </div>
            <div class="col-md-6">
                <h5>time:<span id="second"></span>s</h5>
            </div>
        </div>
        <div id="gameOver" class="hidden">
            <h2>GAME OVER!!!</h2>
            <h4>Name: <span id="gamers"></span></h4>
            <h4>Score: <span id="scores"></span></h4>
            <h4>Game time: <span id="gameTime"></span>min.</h4>
            <button id="newGame" class="btn btn-success">New game</button>
            <a href='{{ route('app.fastTyping.statistic') }}'>
                <button class="btn btn-primary">Statistic</button>
            </a>
        </div>
    </div>
@endsection