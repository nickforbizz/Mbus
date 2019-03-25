@extends('admin.layouts.app')
@section('title')
<title>Mbus:  Bus Route</title>
@stop('title')


@section('content')

<div class="row">
    <ol class="breadcrumb">
        <li><a href="#">
            <em class="fa fa-home"></em>
        </a></li>
        <li class="active">Dashboard/Bus/Bus_Route</li>
    </ol>
    <div class="col-lg-12 pl-2">
        <h1 class="page-header">Bus Route</h1>
    </div>
</div><!--/.row-->

<div class="row">
    <div class="bus_route col-sm-12 col-md-12">
        <form class="form" id="add_busroute">
            <div class=""> <b>Add Bus Route</b></div>
            <div class="line"></div>
            {{csrf_field() }}

            <div class="form-group col-md-4">
                <label for="r_name">Name:</label>
                <input type="text" name="r_name" class="form-control"  id="r_name" required>
            </div>
            <div class="form-group col-md-4">
                <label for="r_distance">Distance:</label>
                <input type="number" name="r_distance" class="form-control"  id="r_distance" required>
            </div>
            <div class="form-group col-md-4">
                <label for="r_stops">Stops:</label>
                <input type="number" name="r_stops" class="form-control"  id="r_stops" required>
            </div>
            <div class="form-group col-md-4">
                <label for="terminal_a">Terminal A:</label>
                <input type="text" name="terminal_a" class="form-control"  id="terminal_a" required>
            </div>
            <div class="form-group col-md-4">
                <label for="terminal_b">Terminal B:</label>
                <input type="text" name="terminal_b" class="form-control"  id="terminal_b" required>
            </div>
            <div class="form-group col-md-4">
                <label for="terminal_a_cod">Terminal-A Co-ordinates:</label>
                <input type="text" name="terminal_a_cod" class="form-control"  id="terminal_a_cod" required>
            </div>
            <div class="form-group col-md-4">
                <label for="terminal_b_cod">Terminal-B Co-ordinates:</label>
                <input type="text" name="terminal_b_cod" class="form-control"  id="terminal_b_cod" required>
            </div>
            <div class="col-md-12">
                <button type="submit" class="btn btn-info">Submit</button>
            </div>
        </form>
    </div>


</div><!--/.row-->

<div class="row" style="">
   <div class="panel panel-default ml-2" style="margin:25px">
        <div class="panel-heading">
            <h3 class="pl-2"> Available Routes </h3>
        </div>
        <!-- /.panel-heading -->
        <div class="panel-body">
            <div class="dataTable_wrapper">
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr>
                            <th>#id</th>
                            <th>Name</th>
                            <th>Distance</th>
                            <th>Terminal A</th>
                            <th>Terminal B</th>
                            <th>Stops</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach(\App\Models\Busroute::where('status', '1')->get() as $busroute)
                        <tr class="tb_busroute" data-id='{{$busroute->id}}'>
                            <td>{{$busroute->id}}</td>
                            <td>{{$busroute->name}}</td>
                            <td>{{$busroute->distance}}</td>
                            <td>{{$busroute->a_terminal}}</td>
                            <td>{{$busroute->b_terminal}}</td>
                            <td>{{$busroute->stops}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.table-responsive -->

        </div>
        <!-- /.panel-body -->
    </div>
    <!-- /.panel -->


</div>



  <!-- Modal -->
<div class="modal fade" id="myModal" role="dialog" style="dislay:none">
    <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title h-modal" >Modal Header</h4>
        </div>
        <form id="update_busroute" class="form">
        <div class="modal-body">
            <div id="editBusroute">
            <p class="p-4" id="modal_text">Some text in the modal.</p>
            </div>
        </div>
        </form>
        <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
    </div>
</div>
</div>

</div><!--/.row-->

@stop('content')


@section('bottom-scripts')
<script>

    $(document).ready(function() {
    // get update
    $(document).on("click",".tb_busroute", function () {
        var busroute_id = $(this).attr("data-id");
        $.ajax({
            url:'/getBusroute' + busroute_id,
            method: 'get',
            success: function (data) {

                $("#editBusroute").html('');
                $("#editBusroute").html(`
                    <input type="hidden" name="busroute_id" value="${data.id}">
                    <div class="form-group col-md-12">
                        <label for="title">Name:</label>
                        <input type="text" name="uname" class="form-control" value="${data.name}"  id="title" required>
                    </div>
                    {{csrf_field() }}
                    <div class="form-group col-md-12">
                        <label for="costs">Stops:</label>
                        <input type="text" name="ustops" class="form-control"  id="costs" value="${data.stops}"  required>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="a_terminal">Terminal A:</label>
                        <input type="text" name="a_terminal" class="form-control"  id="a_terminal" value="${data.a_terminal}"  required>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="b_terminal">Terminal B:</label>
                        <input type="text" name="b_terminal" class="form-control"  id="b_terminal" value="${data.b_terminal}"  required>
                    </div>
                    <div class="form-group col-md-12">
                        <input type="submit" name="submit" class="btn btn-large btn-success">
                    </div>
                `);
                $("#myModal").modal();
            },
            error: function (err) {console.log(err);}
        })
    });
    // Update
    $("#update_busroute").on("submit", function (event) {
        event.preventDefault();
        $.ajax({
            url:"{{url('/updateBusroute')}}",
            method: 'post',
            data: $("#update_busroute").serializeArray(),
            success: function (data) {
                console.log(data );

                $("#editBusroute").html(`<div class="text-center"> <h3>Busroute Updated.</h3> <p>Bye</p></div>`)
            },error: function (data) {
                $("#editBusroute").html(`<div class="text-center"> <h3>Error Updating...</h3> <p>Bye</p></div>`);
                console.log(data);

            }
        })
    })


    $(document).on("click",".maintenance_get", function () {
        var maintenance_id = $(this).attr("data-id");

    });

    });

    $("#add_busroute").on("submit", function (event) {
        event.preventDefault();

        $.ajax({
            url:"{{ url('/addBusroute')}}",
            method: 'post',
            data: $("#add_busroute").serializeArray(),
            success: function (data) {
                console.log(data);
                $('#add_busroute')[0].reset();
                if(data.code==0){
                    // call modal here
                    // window.location="{{ url('/user')}}";
                }else{
                    $('#modal_text').html("");
                    $('#modal_text').append(JSON.stringify(data.errors) );
                }

            },
            error: function (data) {
                $('#modal_text').html("");
                $('#modal_text').append(JSON.stringify(data) );
            }
        });
    })

    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition);
        } else {
            x.innerHTML = "Geolocation is not supported by this browser.";
        }
    }

    function showPosition(position) {
        Latitude=position.coords.latitude;
        Longitude=position.coords.longitude;
        pos = (Latitude+"-"+Longitude)
        $("#terminal_a_cod").val(pos)
    }
    getLocation()
</script>
@endsection
