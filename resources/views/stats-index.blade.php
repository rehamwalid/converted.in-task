<!DOCTYPE html>
    <body class="antialiased">
    <table border="1">
        <thead>
        <tr>
            <th> User Name</th>
            <th> Number Of Tasks</th>
        </tr>
        </thead>
        <tbody>
        @foreach($stats as $stat)
            <tr>
                <td> {{$stat->user->name}} </td>
                <td> {{$stat->tasks_no}} </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    </body>
</html>
