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
            <h1>Blogs </h1>
            <br>

            {{ session()->get('Message')  }}

              {{   'Welcome , '.  auth()->user()->name  }}




        </div>

        <a href="{{url('/Blog/create')}}">+ Blog</a> || <a href="{{url('/Student/logOut')}}">LogOut</a>

        <table class='table table-hover table-responsive table-bordered'>
            <!-- creating our table heading -->
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Content</th>
                <th>Image</th>
                <th>Date</th>
                <th>User Name </th>
                <th>action</th>
            </tr>



       @foreach ($data as $Raw )



            <tr>

                <td>{{$Raw->id}}</td>
                <td>{{$Raw->title}}</td>
                <td>{{   Str::substr($Raw->content,0,70).' .... ' }}</td>
                 <td> <img src="{{url('/blogs/'.$Raw->image)}}" width="80" height="80"> </td>

                 <td>{{date('d/m/Y' , $Raw->date)}}</td>

                 <td>{{$Raw->username}}</td>

                <td>
                    <a href='' data-toggle="modal" data-target="#modal_single_del{{$Raw->id}}" class='btn btn-danger m-r-1em'>Remove </a>



                    <a href="{{url('/Blog/'.$Raw->id.'/edit')}}" class='btn btn-primary m-r-1em'>Edit</a>
                </td>

            </tr>







            <div class="modal" id="modal_single_del{{$Raw->id}}" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">delete confirmation</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                       </button>
                        </div>

                        <div class="modal-body">
                          Remove   {{$Raw->title}}  !!!!
                        </div>
                        <div class="modal-footer">
                            <form action="{{url('Blog/'.$Raw->id)}}"  method="post">

                               @method('delete')
                               @csrf

                                <div class="not-empty-record">
                                    <button type="submit" class="btn btn-primary">Delete</button>
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">close</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>





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
