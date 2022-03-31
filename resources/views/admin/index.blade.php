<!DOCTYPE html>
<html>

<head>
    <title>PDO - Read Records - PHP CRUD Tutorial</title>

    <!-- Latest compiled and minified Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />

    <!-- custom css -->
    <style>
        .m-r-1em {
            margin-right: 1em;
        }

        .m-b-1em {
            margin-bottom: 1em;
        }

        .m-l-1em {
            margin-left: 1em;
        }

        .mt0 {
            margin-top: 0;
        }

    </style>

</head>

<body>

    <!-- container -->
    <div class="container">


        <div class="page-header">
            <h1>Read Users </h1>
            <br>

            {{ session()->get('Message')  }}

              {{   'Welcome , '.  auth()->user()->name  }}







        </div>

        <a href="{{url('/all/Create')}}">+ Account</a> ||  <a href="{{url('/Blog')}}">Blogs</a> || <a href="{{url('/all/logOut')}}">LogOut</a>

        <table class='table table-hover table-responsive table-bordered'>
            <!-- creating our table heading -->
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>action</th>
            </tr>



       @foreach ($data as $Raw )

            <tr>

                <td>{{$Raw->id}}</td>
                <td>{{$Raw->name}}</td>
                <td>{{$Raw->email}}</td>
                <td>
                    <a href='{{url('/all/Remove/'.$Raw->id)}}' class='btn btn-danger m-r-1em'>Delete</a>



                    <a href="{{url('/all/Edit/'.$Raw->id)}}" class='btn btn-primary m-r-1em'>Edit</a>
                </td>

            </tr>
            @endforeach


            <!-- end table -->
        </table>

    </div>
    <!-- end .container -->


    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

    <!-- Latest compiled and minified Bootstrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- confirm delete record will be here -->

</body>

</html>





{{--
CRUD   [Tasks ]    [title , desc , expire Data  > current time  ]
--}}
