@if ($code=="salary")
    <input type="hidden" name="sal_id" value="${data.id}">
    <div class="form-group col-md-12">
        <label for="title">Title:</label>
        <input type="text" name="utitle" class="form-control" value="${data.category}"  id="title" required>
    </div>
    {{csrf_field() }}
    <div class="form-group col-md-3">
        <label for="costs">Basic Salary:</label>
        <input type="text" name="ucosts" class="form-control"  id="costs" value="${data.basic_salary}"  required>
    </div>
    <div class="form-group col-md-6">
        <label for="emp_status">Deductions:</label>
        <select name="deduct" id="deduct" class="form-control" required>
            <option selected disabled>Change Deductions</option>
            @foreach (App\Models\Deduction::where('status', 1)->get() as $deduct)
            <option value="{{ $deduct->id }}">{{ $deduct->amount }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group col-md-6">
        <label for="damage">Damage:</label>
        <select name="damage" id="damage" class="form-control" required>
            <option selected disabled>Change Damages</option>
            @foreach (App\Models\UserDamage::where('status', 1)->get() as $damage)
            <option value="{{ $damage->id }}">{{ $damage->costs }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group col-md-12">
        <input type="submit" name="submit" class="btn btn-large btn-success">
    </div>

@elseif($code=="Bookticket")


    <div class="container" style="margin-top:5px;">
        <div class="row" >
            <div class="col-md-4">
                <div class="card" style="">
                    <img class="card-img-top" src="{{ asset('web_assets/images/bus.png') }}" alt="Card image">
                    <div class="card-body">
                        <div id="accordion">
                            <div class="card">
                                <div class="card-header">
                                    <a class="card-link" data-toggle="collapse" href="#busDetails">
                                        <ul class="list-group">
                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                Bus Details
                                                <span class="badge badge-primary badge-pill p-2">Click</span>
                                            </li>
                                        </ul>
                                    </a>
                                </div>
                                <div id="busDetails" class="collapse" data-parent="#accordion">
                                    <div class="card-body">
                                        <ul class="list-group">
                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                <p>Bus No <i>${data.bus_number} </i> </p>
                                                {{--<p>Model <i>${data.model} </i> </p>--}}

                                                <span class="badge badge-primary badge-pill p-1">Rated 12*</span>
                                            </li>
                                            <input type="hidden" name="bus_id" value="${data.id}">
                                            <input type="hidden" name="route_id" value="${data.Busroute.id}">
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-header">
                                    <a class="collapsed card-link" data-toggle="collapse" href="#driverDetails">
                                        <ul class="list-group"> </ul>
                                    </a>
                                </div>
                                <div id="driverDetails" class="collapse" data-parent="#accordion">
                                    <div class="card-body">
                                        <div id="drivers">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-text"> <b>Reviews</b> </div>
                    </div>
                </div>
                <hr class="d-sm-none">
            </div>

        <div  class="col-md-8 card shadow cardTick"  id="nxt">
                <div class="d-flex justify-content-end" >
                 <button class="btn btn-primary" id="nextBtn" onclick="togglePosition('nxt')" >Next</button>
                </div>
                <h4>Get Your Ticket</h4>
                <h5>Dated, {{ \Carbon\Carbon::now()->diffForHumans() }}</h5>
                <div classh="card p-4 "" style="float:left;width:-webkit-fill-available;">
                        <div class="rowgfdg ">
                        <div class="form-group col-md-12">
                            <label for="ticket_no">Ticket Number:</label>
                            <span class="badge badge-info" style="height: 30px; width: 30px; text-align: center;padding: 7px;">
                                ${newVal}
                            </span>
                            <input type="hidden" name="ticket_number" value="${newVal}">
                        </div>
                        <div class="d-flex">
                        <div class="form-group pl-2 flex-fill">
                            <label for="passanger_name">Name:</label>
                            <input type="text" name="passanger_name" class="form-control" placeholder="Enter your name"  id="passanger_name" required>
                        </div>
                        <div class="form-group pl-2 flex-fill">
                            <label for="passanger_id">National ID:</label>
                            <input type="number" name="passanger_id" class="form-control" placeholder="Enter your ID"  id="passanger_id" required>
                        </div>
                        </div>
                        <div class="d-flex">
                        <div class="form-group pl-2 flex-fill">
                            <label for="start">From:</label>
                            <input type="text" name="start" class="form-control" value="${data.Busroute.a_terminal}"  id="start" required disabled>
                        </div>
                        <div class="form-group pl-2 flex-fill">
                            <label for="destination">To:</label>
                            <input type="text" name="destination" class="form-control" value="${data.Busroute.b_terminal}"  id="destination" disabled="disabled" required>
                        </div>
                        </div>
                        <div class="d-flex">
                        <div class="form-group pl-2 flex-fill">
                            <label for="booked_at">Time To Travel:</label>
                            <input type="date" name="booked_at" class="form-control" value="{{\Carbon\Carbon::now()->diffForHumans()}}"  id="booked_at" required>
                        </div>
                        <div class="form-group pl-2 flex-fill">
                            <label for="booked_at">Time To Expire:</label>
                            <input type="date" name="exp_at" class="form-control" value="{{\Carbon\Carbon::now()->diffForHumans()}}"  id="booked_at" required>
                        </div>
                        <div class="form-group pl-2 flex-fill">
                            <label for="amount">Amount in ksh/=:</label>
                            <input type="number" name="amount" class="form-control" value="150 "  id="amount" required>
                        </div>
                        </div>
                        <hr> {{csrf_field() }}
                        <div class="col-12">
                            {{-- <input type="submit" value="Get This Ticket" class="btn btn-success btn-lg"> --}}
                        </div>
                        </div>

                </div>

                <br>
            </div>

             <div class="col-md-12 card shadow" id="prev">
                 <div class="d-flex justify-content-end" >
                     <button class="btn btn-primary" id="prevBtn" onclick="togglePosition2('prev')" >Prev</button>
                 </div>
                <h4 class="fa-stop">Select Seat(s)</h4>
                <h5>Dated, {{ \Carbon\Carbon::now()->diffForHumans() }}</h5>

                <div classh="card p-4" style="float:left;width:-webkit-fill-available;">

                    <div class="row">
                        <div class="col-12">
                            <div class="row d-flex justify-content-center">
                                <div class="col-1 p-2 m-2 seat" onclick="busseat(this, 1)">1</div>
                                <div class="col-1 p-2 m-2 seat" onclick="busseat(this, 2)">2</div>
                                <div class="col-1 p-2 m-2 seat" onclick="busseat(this, 3)">3</div>
                                <div class="col-1 p-2 m-2 seat" onclick="busseat(this, 4)">4</div>
                                <div class="col-1 p-2 m-2 seat" onclick="busseat(this, 5)">5</div>
                                <div class="col-1 p-2 m-2 seat" onclick="busseat(this, 6)">6</div>
                            </div>
                        </div>
                        <div class="col-12" >
                            <div class="row d-flex justify-content-center">
                                <div class="col-1 p-2 m-2 seat" onclick="busseat(this, 7)">7</div>
                                <div class="col-1 p-2 m-2 seat" onclick="busseat(this, 8)">8</div>
                                <div class="col-1 p-2 m-2 seat" onclick="busseat(this, 9)">9</div>
                                <div class="col-1 p-2 m-2 seat" onclick="busseat(this, 10)">10</div>
                                <div class="col-1 p-2 m-2 seat" onclick="busseat(this, 11)">11</div>
                                <div class="col-1 p-2 m-2 seat" onclick="busseat(this, 12)">12</div>
                                <hr/>
                            </div>
                        </div>
                        <div class="col-12 p-4 path-bus text-center"><i>Bus Path way </i></div>
                        <div class="col-12">
                            <div class="row d-flex justify-content-center">
                                <hr/>
                                <div class="col-1 p-2 m-2 seat" onclick="busseat(this, 13)">13</div>
                                <div class="col-1 p-2 m-2 seat" onclick="busseat(this, 14)">14</div>
                                <div class="col-1 p-2 m-2 seat" onclick="busseat(this, 15)">15</div>
                                <div class="col-1 p-2 m-2 seat" onclick="busseat(this, 16)">16</div>
                                <div class="col-1 p-2 m-2 seat" onclick="busseat(this, 17)">17</div>
                                <div class="col-1 p-2 m-2 seat" onclick="busseat(this, 18)">18</div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="row d-flex justify-content-center">
                                <div class="col-1 p-2 m-2 seat" onclick="busseat(this, 19)">19</div>
                                <div class="col-1 p-2 m-2 seat" onclick="busseat(this, 20)">20</div>
                                <div class="col-1 p-2 m-2 seat" onclick="busseat(this, 21)">21</div>
                                <div class="col-1 p-2 m-2 seat" onclick="busseat(this, 22)">22</div>
                                <div class="col-1 p-2 m-2 seat" onclick="busseat(this, 23)">23</div>
                                <div class="col-1 p-2 m-2 seat" onclick="busseat(this, 24)">24</div>
                            </div>
                        </div>
                    </div>

                </div>

                <br>
            </div>
        </div>

        </div>

    </div>

@endif
