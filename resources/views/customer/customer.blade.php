@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                   <div class="row">
                       <div class="col-md-6">
                            Customer Data
                       </div>
                       <div class="col-md-6 text-right">
                        <a data-toggle="modal" data-target="#addCustomer" href="#" class="btn btn-primary">Add Customer</a>
                           {{-- <button class="btn btn-primary" ></button> --}}
                       </div>
                   </div>
                </div>

                <div class="card-body table-responsive" id="showAllData">
                   
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

                                    <a data-toggle="modal" data-target="#updateCustomer" href="{{url('edit/customer/data')}}" data-id="{{$row->id}}" id="edit" class="btn btn-warning btn-sm">Edit</a>

                                    <a href="{{url('delete/customer/data')}}" data-id="{{$row->id}}" data-toggle="modal" id="delete" class="btn btn-danger btn-sm">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                    {{$data->links()}}
            </div>
        </div>
    </div>
</div>

<div id="getallData" data-url="{{url('get/customer/data')}}"></div>

<!-- Add Customer Data -->
<div class="modal fade" id="addCustomer" tabindex="-1" role="dialog" aria-labelledby="softdeleteModal" aria-hidden="true">
  <div class="modal-dialog">
    <form action="{{url('add/customer/data')}}" method="POST" id="addCustomerForm">
      @csrf
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="softdeleteModal">Add Customer Data</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">

            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="name"><i class="fa fa-user"></i></span>
              </div>
              <input type="text" class="form-control" placeholder="name" name="name">
           </div>

           <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="phone"><i class="fa fa-phone"></i></span>
              </div>
              <input type="text" class="form-control" placeholder="Phone Number" name="phone">
           </div>

           <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="email"><i class="fa fa-envelope"></i></span>
              </div>
              <input type="email" class="form-control" placeholder="Email Address" name="email">
           </div>

           <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="location"><i class="fa fa-map-marker"></i></span>
              </div>
              <input type="text" class="form-control" placeholder="Location" name="location">
           </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
      </div>
    </form>
  </div>
</div>


<!-- Update Customer Data -->
<div class="modal fade" id="updateCustomer" tabindex="-1" role="dialog" aria-labelledby="updateModal" aria-hidden="true">
  <div class="modal-dialog">
    <form action="{{url('update/customer/data')}}" method="POST" id="updateCustomerForm">
      @csrf
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="updateModal">Update Customer Data</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">

           <input type="hidden" name="id" id="customer_id">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="name"><i class="fa fa-user"></i></span>
              </div>
              <input type="text" id="namea" class="form-control" name="name">
           </div>

           <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="phone"><i class="fa fa-phone"></i></span>
              </div>
              <input type="text" id="phonea" class="form-control"  name="phone">
           </div>

           <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="email"><i class="fa fa-envelope"></i></span>
              </div>
              <input type="email" id="eamil" class="form-control" name="email">
           </div>

           <div class="input-group mb-3">
              <div class="input-group-prepend">
                <span class="input-group-text" id="location"><i class="fa fa-map-marker"></i></span>
              </div>
              <input type="text" id="locationa" class="form-control" name="location">
           </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Update</button>
          </div>
      </div>
    </form>
  </div>
</div>


{{-- View Customer Data --}}
<div class="modal fade" id="viewCustomer" tabindex="-1" role="dialog" aria-labelledby="#customerName" aria-hidden="true">
  <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="customerName">Customer Data Information</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
              <div class="view_name"></div>
              <div class="view_phone"></div>
              <div class="view_email"></div>
              <div class="view_location"></div>
          </div>
           <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
           </div>
      </div>
  </div>



@endsection
