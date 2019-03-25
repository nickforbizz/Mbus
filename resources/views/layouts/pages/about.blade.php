@extends('layouts.webfront')


@section('content')
    <!-- space  -->
    <div class="m-5"></div>
	<!-- Room -->

	<div class="room d-flex flex-lg-row flex-column align-items-start justify-content-start p-2">
		<div class="room_content">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="room_title">
							<div class="section_title_container_2">
								<div class="section_title"><h1>M - Bus</h1></div>
							</div>
							<div class="room_price">Operates <span>Day</span> and <span>Night</span> </div>
						</div>
						<div class="room_list">
							<ul>
								<li class="d-flex flex-row align-items-start justify-content-start">
									<div><div>Bus:</div></div>
									<div>                                    
                                        <div class="card">
                                            <div class="card-header text-dark" onclick="aboutMoreData('bus')">                      View Buses
                                            </div>                                                
                                        </div>                                        
                                    </div>
								</li>
								<li class="d-flex flex-row align-items-start justify-content-start">
                                    <div><div>Drivers:</div></div>
                                    <div class="card">
                                        <div class="card-header text-dark" onclick="aboutMoreData('drivers')">                      
                                             Drivers
                                        </div>                                                
                                    </div>
								</li>
								<li class="d-flex flex-row align-items-start justify-content-start">
									<div><div>Bus Routes:</div></div>
									<div class="card">
                                        <div class="card-header text-dark" onclick="aboutMoreData('busroutes')">       
                                                Bus Routes
                                        </div>                                                
                                    </div>
								</li>
								<li class="d-flex flex-row align-items-start justify-content-start">
									<div><div>Conductor:</div></div>
									    <div class="card">
                                            <div class="card-header text-dark" onclick="aboutMoreData('conductor')">       
                                                    Conductors
                                            </div>                                                
                                        </div>
								</li>
								<li class="d-flex flex-row align-items-start justify-content-start">
									<div><div>Trips:</div></div>
									<div class="card">
                                        <div class="card-header text-dark" onclick="aboutMoreData('trips')">       
                                                Bus Trips
                                        </div>                                                
                                    </div>
								</li>
							</ul>
						</div>
						<div class="button room_button trans_200"><a href="{{ url('/ticket') }}">book now</a></div>
					</div>
				</div>
			</div>
		</div>
		<div class="room_image">
			<div class="background_image" style="background-image:url({{ asset('web_assets/images/cartoon-bus.jpg') }})"></div>
		</div>
	</div>

	<!-- Facilities -->

	<div class="facilities">
		<div class="container">
			<div class="row icon_box_row">

				<!-- Icon Box -->
				<div class="col-lg-4">
					<div class="icon_box text-center">
						<div class="icon_box_icon"><img src="{{ asset('web_assets/images/icon_1.svg') }}" alt="https://www.flaticon.com/authors/monkik"></div>
						<div class="icon_box_title"><h2>Our Offices</h2></div>
						<div class="icon_box_text">
							<p>
                                our <b>Offices</b> are currently located at Nairobi, Mama Ngina Street. Mobex house 4th floor, Room 123. We have other offices located in other regions of the country. 
                                <ul>
                                    <li> <b> Ruiru </b> </li>
                                    <li> <b> Mombasa </b> </li>
                                    <li> <b> Thika </b> </li>
                                    <li> <b> Chuka </b> </li>
                                    <li> <b> Meru ... </b> </li>
                                </ul>
                            </p>
						</div>
					</div>
				</div>

				<!-- Icon Box -->
				<div class="col-lg-4">
					<div class="icon_box text-center">
						<div class="icon_box_icon"><img src="{{ asset('web_assets/images/icon_2.svg') }}" alt="https://www.flaticon.com/authors/monkik"></div>
						<div class="icon_box_title"><h2>Bus Means:-</h2></div>
						<div class="icon_box_text">
							<p>Bus is a clipped form of the Latin adjective omnibus ("for all"), the dative plural of omnis-e ("all"). The theoretical full name is in French voiture omnibus[1] ("vehicle for all") and thus in Latin vehiculum[4] omnibus. The name originates from a mass-transport service started in 1823 by a French corn-mill owner named Stanislas Baudry in Richebourg, a suburb of Nantes.</p>
						</div>
					</div>
				</div>

				<!-- Icon Box -->
				<div class="col-lg-4">
					<div class="icon_box text-center">
						<div class="icon_box_icon"><img src="{{ asset('web_assets/images/icon_3.svg') }}" alt="https://www.flaticon.com/authors/monkik"></div>
						<div class="icon_box_title"><h2>Passanger Comfort</h2></div>
						<div class="icon_box_text">
							<p>
                                Passangers are our clients and we treat them with the best quality services as we can. Fares are generally fair. We encourage each of our client to leave any issue on the contact page and we'll defenetry look at it. <br>
                                <b>Thanks for your esteemed loyalty</b>
                            </p>
						</div>
					</div>
				</div>

			</div>
        </div>
        @component('web.utils.default',["title"=>"Book A Ticket"])

        @endcomponent
	</div>
    @endsection
@section('bottom-scripts')
    <script>
        function aboutMoreData(cat) {
           // var t=`@component('web.utils.views.modal_data',["code"=>"About"]) @endcomponent`
           if (cat=="bus") {
            $("#edit").html(`
                <div class="card-body">   
                <h2 class="text-center">  Bus Details </h2>                                              
                        <ul class="list-group">
                            @foreach (\App\Models\Bus::where('status', 1)->get() as $bus)
                            <li class="list-group-item text-dark">
                            <b class="text-dark">Bus No: </b><i class="p-5">{{ $bus->bus_number }}</i>
                            <b class="text-dark">Model: </b> <i  class="pl-5">{{ $bus->model }}</i> 
                            <b class="text-dark pl-3">Capacity</b> <i  class="pl-5">{{ $bus->capacity }}</i> </li>        
                            @endforeach                                                   
                        </ul>
                    </div>
                `);
           }else if (cat=="drivers") {
                $("#edit").html(`
                <div class="card-body">   
                <h2 class="text-center">  Bus Details </h2>                                              
                        <ul class="list-group">
                            @foreach (\App\Models\Driver::where('status', 1)->get() as $driver)
                            <li class="list-group-item text-dark">
                            <b class="text-dark">First Name: </b><i class="p-5">{{ $driver->User->fname }}</i>
                            <b class="text-dark">Age: </b> <i  class="pl-5">{{ $driver->User->age }}</i> 
                            <b class="text-dark pl-3">Bus</b> <i  class="pl-5">{{ $driver->Bus->bus_number }}</i> </li>        
                            @endforeach                                                   
                        </ul>
                    </div>
                `);
           } else if (cat=="busroutes"){
                $("#edit").html(`
                <div class="card-body">   
                <h2 class="text-center">  Bus Details </h2>                                              
                        <ul class="list-group">
                            @foreach (\App\Models\Busroute::where('status', 1)->get() as $busroute)
                            <li class="list-group-item text-dark">
                            <b class="text-dark">Name: </b><i class="p-5">{{ $busroute->name }}</i>
                            <b class="text-dark">Terminal A: </b> <i  class="pl-5">{{ $busroute->a_terminal }}</i> 
                            <b class="text-dark pl-3">Terminal B</b> <i  class="pl-5">{{ $busroute->b_terminal }}</i> </li>        
                            @endforeach                                                   
                        </ul>
                    </div>
                `);
           }else if (cat=="conductor"){
                $("#edit").html(`
                <div class="card-body">   
                <h2 class="text-center">  Bus Details </h2>                                              
                        <ul class="list-group">
                            @foreach (\App\Models\Conductor::where('status', 1)->get() as $conductor)
                            <li class="list-group-item text-dark">
                            <b class="text-dark">conductor No: </b><i class="p-5">{{ $conductor->User->fname }}</i>
                            <b class="text-dark">Model: </b> <i  class="pl-5">{{ $conductor->User->age }}</i> 
                            <b class="text-dark pl-3">Capacity</b> <i  class="pl-5">{{ $conductor->Bus->bus_number }}</i> </li>        
                            @endforeach                                                   
                        </ul>
                    </div>
                `);
           }else if (cat=="trips"){
                $("#edit").html(`
                <div class="card-body">   
                <h2 class="text-center">  Bus Details </h2>                                              
                        <ul class="list-group">
                            @foreach (\App\Models\Trip::where('status', 1)->get() as $trip)
                            <li class="list-group-item text-dark">
                            <b class="text-dark">Bus No: </b><i class="p-5">{{ $trip->Bus->bus_number }}</i>
                            <b class="text-dark">Bus Route: </b> <i  class="pl-5">{{ $trip->Busroute->name }}</i> 
                            <b class="text-dark pl-3">Driver</b> <i  class="pl-5">{{ $trip->Driver->User->fname }}</i> </li>        
                            @endforeach                                                   
                        </ul>
                    </div>
                `);
           }
           
            $("#myModal").modal(); 

        
            
        }
    </script>
@endsection