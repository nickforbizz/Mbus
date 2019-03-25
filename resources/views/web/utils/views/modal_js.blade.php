${ if(category=="bus" ) {
"
<div class="card-body">                                                   
    <ul class="list-group">
        @foreach (\App\Models\Bus::where('status', 1)->get() as $bus)
        <li class="list-group-item text-dark">No: <i class="pr-3">{{ $bus->bus_number }}</i>Model <i>{{ $bus->model }}</i> </li>        
        @endforeach                                                   
    </ul>
</div>


"}
"}


