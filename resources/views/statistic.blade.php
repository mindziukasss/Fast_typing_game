@extends('core')
@section('content')
<p>Click on the buttons inside the tabbed menu:</p>
<div class="tab">
    <button class="tablinks" onclick="levels(event, 'Easy')">Easy</button>
    <button class="tablinks" onclick="levels(event, 'Normal')">Normal</button>
    <button class="tablinks" onclick="levels(event, 'Hard')">Hard</button>
</div>

<div id="Easy" class="tabcontent">
    <h4>Best results of Easy level</h4>
    <table class="table table-hover">
        @if(isset($level7))
            @if(sizeof($level7)>0)
                <thead>
                <tr>
                    <th>NAME</th>
                    <th>SCORE</th>
                    <th>TIME</th>
                    <th>AVERAGE SPEED</th>
                    <th>LEVEL</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($level7 as $key => $record)
                    <tr>
                        @foreach ($record as $key => $value)

                            <td>{{$value}}</td>

                        @endforeach

                    </tr>

                @endforeach

                </tbody>
            @else
                <h3>No items in database!</h3>
            @endif
        @endif
    </table>
</div>


<div id="Normal" class="tabcontent">
    <h3>Normal</h3>
    <p>Paris is the capital of France.</p>
</div>

<div id="Hard" class="tabcontent">
    <h3>Hard</h3>
    <p>Tokyo is the capital of Japan.</p>
</div>

@endsection