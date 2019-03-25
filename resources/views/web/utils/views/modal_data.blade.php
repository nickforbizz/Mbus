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


@elseif($code=="driver")


<input type="hidden" name="driver_id" value="${data.id}">
{{csrf_field() }}

<div class="form-group col-md-4">
    <label for="deduct">Bus:</label>
    <select name="bus" id="deduct"  class="form-control" required>
        <option selected disabled>Change Bus</option>
        @foreach (App\Models\Bus::where('status', 1)->get() as $bus)
        <option value="{{ $bus->id }}">{{ $bus->bus_number }}</option>
        @endforeach
    </select>
</div>

<div class="form-group col-md-4">
    <label for="shift">Shift:</label>
    <select name="shift" id="shift"  class="form-control" required>
        <option selected disabled>Change Shift</option>
        @foreach (App\Models\Shift::where('status', 1)->get() as $shift)
        <option value="{{ $shift->id }}">{{ $shift->shift_time }}</option>
        @endforeach
    </select>
</div>
<div class="form-group col-md-12">
    <label for="emp_status">Employment:</label>
    <select name="emp_status" id="emp_status"  class="form-control" required>
        <option selected disabled>Change Status</option>
        <option value="1">Active</option>
        <option value="2">Dormant</option>
    </select>
</div>


@elseif($code=="Conductor")


<input type="hidden" name="conductor_id" value="${data.id}">
{{csrf_field() }}

<div class="form-group col-md-4">
    <label for="bus">Bus:</label>
    <input list="bus" name="bus" class="form-control" placeholder="select bus" required>

    <datalist id="bus">
        @foreach (App\Models\Bus::where('status', 1)->get() as $bus)
        <option value="{{ $bus->id }}">Bus NO: {{ $bus->bus_number }}</option>
        @endforeach
    </datalist>
</div>

<div class="form-group col-md-4">
    <label for="shift">Shift:</label>
    <input list="shift" name="shift" class="form-control" placeholder="select Shift" required>

    <datalist id="shift">
        @foreach (App\Models\Shift::where('status', 1)->get() as $shift)
        <option value="{{ $shift->id }}">Shift: {{ $shift->shift_time }}</option>
        @endforeach
    </datalist>
</div>
<div class="form-group col-md-12">
    <label for="emp_status">Employment:</label>
    <input list="emp_status" name="emp_status" class="form-control" placeholder="select emp_status" required>

    <datalist id="emp_status">
        <option value="1">: Active</option>
        <option value="2">: Dormant</option>
    </datalist>
</div>


@elseif($code=="employee")


<input type="hidden" name="employee_id" value="${data.id}">
{{csrf_field() }}

<div class="form-group col-md-4">
    <label for="shift">Shift:</label>
    <input list="shift" name="shift" class="form-control" placeholder="select Shift" required>

    <datalist id="shift">
        @foreach (App\Models\Shift::where('status', 1)->get() as $shift)
        <option value="{{ $shift->id }}">Shift: {{ $shift->shift_time }}</option>
        @endforeach
    </datalist>
</div>
<div class="form-group col-md-12">
    <label for="emp_status">Employment:</label>
    <input list="emp_status" name="emp_status" class="form-control" placeholder="select emp_status" required>

    <datalist id="emp_status">
        <option value="1">: Active</option>
        <option value="2">: Dormant</option>
    </datalist>
</div>


@elseif($code=="Passanger")

<input type="hidden" name="passanger_id" value="${data.id}">
{{csrf_field() }}
<div class="form-group col-md-4">
    <label for="fname">First Name:</label>
    <input type="text" name="fname" class="form-control" value="${ data.fname }" required>
</div>
<div class="form-group col-md-4">
    <label for="lname">Last Name:</label>
    <input type="text" name="lname" class="form-control" value="${ data.lname }" required>
</div>
<div class="form-group col-md-4">
    <label for="sname">SurName:</label>
    <input type="text" name="sname" class="form-control" value="${ data.sname }" required>
</div>
<div class="form-group col-md-4">
    <label for="username">Username:</label>
    <input type="text"  name="username" class="form-control" value="${ data.username }" required>
</div>
<div class="form-group col-md-4">
    <label for="email">Email:</label>
    <input type="email"  name="email" class="form-control" value="${ data.email }" required>
</div>
<div class="form-group col-md-4">
    <label for="gender">Gender:</label>
    <input list="gender_pass"  name="gender" class="form-control" value="${ data.gender }" required>

    <datalist id="gender_pass">
            <option value="MALE">
            <option value="FEMALE">
    </datalist>
</div>
<div class="form-group col-md-4">
    <label for="age">Age:</label>
    <input type="number" name="age" class="form-control" value="${ data.age }" required>
</div>

@elseif($code=="ticket")

<input type="hidden" name="ticket_id" value="${data.id}">
{{csrf_field() }}
<div class="form-group col-md-4">
    <label for="bus_number"> Bus Number:</label>
    <input list="bus_number" name="bus_number" class="form-control" placeholder="${ data.bus.bus_number }" required>

    <datalist id="bus_number">
        @foreach (App\Models\Bus::where('status', 1)->get() as $bus)
        <option value="{{ $bus->id }}">: {{ $bus->bus_number }}</option>
        @endforeach
    </datalist>
</div>
<div class="form-group col-md-4">
    <label for="busroute"> Bus Route:</label>
    <input list="busroute" name="busroute" class="form-control" placeholder="${ data.busroute.name }" required>

    <datalist id="busroute">
        @foreach (App\Models\Busroute::where('status', 1)->get() as $busroute)
        <option value="{{ $busroute->id }}">: {{ $busroute->name }}</option>
        @endforeach
    </datalist>
</div>

<div class="form-group col-md-4">
    <label for="amount">Amount:</label>
    <input type="text" name="amount" class="form-control" value="${ data.amount }" required>
</div>

<div class="form-group col-md-4">
    <label for="status">Status:</label>
    <input list="status"  name="status" class="form-control" placeholder="Change Status" required>

    <datalist id="status">
            <option value="1">
            <option value="0">
    </datalist>
</div>


@elseif($code=="trip")


<input type="hidden" name="trip_id" value="${data.id}">
{{csrf_field() }}
<div class="form-group col-md-4">
    <label for="time_trip_started">Time Trip Started:</label>
    <input type="time" name="time_trip_started" class="form-control" value="${ data.time_trip_started }" required>
</div>
<div class="form-group col-md-4">
    <label for="timespan">Trip Timespan:</label>
    <input type="text" name="timespan" class="form-control" value="${ data.timespan }" required>
</div>
<div class="form-group col-md-4">
    <label for="status">Status:</label>
    <input list="thestatus" name="status" class="form-control" value="${ data.status }" required>

    <datalist id="thestatus">
        <option value="1">
        <option value="2">
    </datalist>
</div>

<div class="form-group col-md-4">
    <label for="driver">Driver :</label>
    <input list="driver" name="driver" class="form-control" placeholder="select Driver" required>

    <datalist id="driver">
        @foreach (App\Models\Driver::where('status', 1)->get() as $driver)
        <option value="{{ $driver->id }}">: {{ $driver->User->username }}</option>
        @endforeach
    </datalist>
</div>
<div class="form-group col-md-4">
    <label for="conductor">Conductor:</label>
    <input list="conductor" name="conductor" class="form-control" placeholder="select conductor" required>

    <datalist id="conductor">
        @foreach (App\Models\Conductor::where('status', 1)->get() as $conductor)
        <option value="{{ $conductor->id }}">conductor: {{ $conductor->User->username }}</option>
        @endforeach
    </datalist>
</div>
<div class="form-group col-md-4">
    <label for="bus">Bus:</label>
    <input list="bus" name="bus" class="form-control" placeholder="select bus" required>

    <datalist id="bus_number">
        @foreach (App\Models\Bus::where('status', 1)->get() as $bus)
        <option value="{{ $bus->id }}">bus: {{ $bus->bus_number }}</option>
        @endforeach
    </datalist>
</div>
<div class="form-group col-md-4">
    <label for="busroute">Busroute:</label>
    <input list="busroute" name="busroute" class="form-control" placeholder="select busroute" required>

    <datalist id="busroute">
        @foreach (App\Models\Busroute::where('status', 1)->get() as $busroute)
        <option value="{{ $busroute->id }}">: {{ $busroute->name }}</option>
        @endforeach
    </datalist>
</div>

@endif
