@extends('core')
@section('content')
<p>Click on the buttons inside the tabbed menu:</p>
<div class="tab">
    <button class="tablinks" onclick="levels(event, 'Easy')" id="defaultOpen">Easy</button>
    <button class="tablinks" onclick="levels(event, 'Normal')">Normal</button>
    <button class="tablinks" onclick="levels(event, 'Hard')">Hard</button>
</div>

<div id="Easy" class="tabcontent">
    <h4>Best 5 players results of Easy level</h4>
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
    <h4>Best 5 players results of Normal level</h4>
    <table class="table table-hover">
        @if(isset($level4))
            @if(sizeof($level4)>0)
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
                @foreach ($level4 as $key => $record)
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

<div id="Hard" class="tabcontent">
    <h4>Best 5 players results of Hard level</h4>
    <table class="table table-hover">
        @if(isset($level2))
            @if(sizeof($level2)>0)
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
                @foreach ($level2 as $key => $record)
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

<script>
    function levels(event, level) {
        var i, tabcontent, tablinks;

        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(level).style.display = "block";
        event.currentTarget.className += " active";

    }
    document.getElementById("defaultOpen").click();
</script>
@endsection

