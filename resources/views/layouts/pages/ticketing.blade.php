@extends('layouts.webfront')
@section('top-styles')
    <style>
        .path-bus{
            border-top: 1px solid #2252b2;
            border-bottom: 1px solid #2252b2;
        }#nxt, #prv{
            cursor: pointer;
            height:423.945px;
            width:635.332px;
            padding-top:20px;
        }.cardTick{
            overflow:hidden;
            transiton:all 0.5s;
        }#prev{
            top:0px;
            padding-top:20px;
            position: absolute;
            transform:translateX(100%);
            display: none;
            transition:all 0.5s;
        }#prevbtn, #nextBtn{
            padding-bottom: 20px;
        }.seat{
            border: 1px solid blue;
            border-radius: 10px;
            cursor: pointer;
        }.booked-seat{
            background-color: grey;
            color: white;
        }

    </style>
@endsection
@section('content')

<!-- -->

<div class="container">
        <div class="row">
            <div class="col-12">
                <div class="alert alert-primary alert-dismissible text-center">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    Click on the a bus route to book ticket
                </div>
            </div>
           <div class="col-12">
            <div class="d-flex justify-content-center">
                <div class="dataTable_wrapper" style="width: -webkit-fill-available;">
                        <table class="table table-striped table-bordered table-hover w-100" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>#id</th>
                                    <th>Name</th>
                                    <th>Distance</th>
                                    <th>Terminal A</th>
                                    <th>Terminal B</th>
                                    <th>Stops</th>
                                    <th>Book Ticket</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach(\App\Models\Busroute::where('status', '1')->get() as $busroute)
                                <tr class="tb_data " data-id='{{$busroute->id}}'>
                                    <td>{{$busroute->id}}</td>
                                    <td>{{$busroute->name}}</td>
                                    <td>{{$busroute->distance}}</td>
                                    <td>{{$busroute->a_terminal}}</td>
                                    <td>{{$busroute->b_terminal}}</td>
                                    <td>{{$busroute->stops}}</td>
                                    <td> <button class="btn btn-primary">Click Here</button> </td>
                                    {{--<td> <a class="btn btn-primary" href="{{ route('ticketRoute',["id"=>$busroute->id]) }}">Click Here</a> </td>--}}
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
           </div>
           </div>
        </div>
    @component('web.utils.default',["title"=>"Book A Ticket"])

    @endcomponent
</div>


<!-- -->


@endsection
@section('bottom-scripts')
<script>
    var ntx=0
    function togglePosition(el){
        // $('#nxt').css("transform","translateX(-100%)")
        // $('#prev').css("transform","translateX(0%)")
        console.log(el);
        $("#prev").css("display","block");
        $("#prev").animate({
            left: '-300px',
            height: '425.945px',
            width: '603px'
        });
    }
    function togglePosition2(el){
        console.log(el);
        $("#prev").css("display","none");
        $("#prev").animate({
            left: '300px',
            height: '425.945px',
            width: '603px'

        });
    }





    $(document).ready(function (params) {
        $(document).on("click",".tb_data", function () {
            var data_id = $(this).attr("data-id");
            // console.log(data_id);
            $.ajax({
                url:'/ticketRoute/' + data_id,
                method:'get',
                success: function (data ) {
                    var ticket_leading_digit = data.Busroute.id;
                    var ticket_next_digit = data.ticketLast.ticket_number + 1;
                    ticket_next_digit += '';
                    ticket_leading_digit += '';
                    var newVal = ticket_leading_digit + ticket_next_digit;

                    $("#edit").html('');
                    $("#edit").html(`
                        @component('web.utils.views.modal_data',["code"=>"Bookticket"])

                        @endcomponent
                        `);
                    $("#drivers").html('');
                    $.each(data.Driver, function (i,val) {
                        $("#drivers").append(`
                          @component('web.utils.views.loopSuccess',["code"=>"drivers"])

                          @endcomponent
                        `);
                    });


                    $("#myModal").modal();

                },
                error: function (params) {
                    console.log(params)
                }
            }); //ajax
        });//tb_data

        $(".update").on('submit', function (event) {
            event.preventDefault();
            $.ajax({
                url: '/bookTicket',
                method: 'post',
                success: function (data) {
                    console.log(data);
                },
                error: function (err) {
                    alert(err);
                }
            });
            //ajax ticket
        });
        // update



    }); //document
    //seats
    booked_seats = Array();
    function busseat(seat, id) {
        $(seat).toggleClass('booked-seat')
        if ($(seat).hasClass('booked-seat')) {
            booked_seats.push(id);
        }else{
            booked_seats.pop(id);
        }
        console.log(booked_seats);

    }
</script>
@endsection
