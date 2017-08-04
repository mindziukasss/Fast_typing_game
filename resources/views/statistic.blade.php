<!DOCTYPE html>
<html>
<head>
    <style>
        body {font-family: "Lato", sans-serif;}

        /* Style the tab */
        div.tab {
            overflow: hidden;
            border: 1px solid #ccc;
            background-color: #f1f1f1;
        }

        /* Style the buttons inside the tab */
        div.tab button {
            background-color: inherit;
            float: left;
            border: none;
            outline: none;
            cursor: pointer;
            padding: 14px 16px;
            transition: 0.3s;
            font-size: 17px;
        }

        /* Change background color of buttons on hover */
        div.tab button:hover {
            background-color: #ddd;
        }

        /* Create an active/current tablink class */
        div.tab button.active {
            background-color: #ccc;
        }

        /* Style the tab content */
        .tabcontent {
            display: none;
            padding: 6px 12px;
            border: 1px solid #ccc;
            border-top: none;
        }
    </style>
</head>
<body>
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
    </table>
</div>
@endif</div>

<div id="Normal" class="tabcontent">
    <h3>Normal</h3>
    <p>Paris is the capital of France.</p>
</div>

<div id="Hard" class="tabcontent">
    <h3>Hard</h3>
    <p>Tokyo is the capital of Japan.</p>
</div>

<script>
    function levels(evt, level) {
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
        evt.currentTarget.className += " active";
    }
</script>

</body>
</html>
