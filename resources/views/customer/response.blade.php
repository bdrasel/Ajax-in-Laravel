<table class="table table-striped table-hover table-bordered">
    <thead>
        <th>S1</th>
        <th>Name</th>
        <th>Phone</th>
        <th>Email</th>
        <th>Location</th>
        <th>Register Date</th>
        <th>Manage</th>
    </thead>
    <tbody>
      @php
        $s1 = 1;
      @endphp
      @foreach($data as $row)
        <tr>
            <td>{{$s1++}}</td>
            <td>{{$row->name}}</td>
            <td>{{$row->phone}}</td>
            <td>{{$row->email}}</td>
            <td>{{$row->location}}</td>
            <td>{{date('dM,Y',strtotime($row->created_at))}}</td>
            <td> 
               <a data-toggle="modal" data-target="#viewCustomer" href="{{url('view/customer/data')}}" data-id="{{$row->id}}" id="view" class="btn btn-dark btn-sm" >View</a>

               <a href="{{url('edit/customer/data')}}" data-id="{{$row->id}}" id="edit" class="btn btn-warning btn-sm">Edit</a>

                <a href="{{url('delete/customer/data')}}" data-id="{{$row->id}}" data-toggle="modal" id="delete" class="btn btn-danger btn-sm">Delete</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>