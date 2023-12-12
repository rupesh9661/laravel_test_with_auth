@extends('layouts.master')
@section('main')

<div class="pagetitle">
  <h1>Employees</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/">Home</a></li>
      <li class="breadcrumb-item">Employees</li>

    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">
  <div class="row">
    <div class="col-lg-12">

      <div class="card">
        <div class=" table-responsive">
          <h5 class="card-title">All Employees</h5>

          <!-- Table with stripped rows -->
          <table class="table table-bordered" style="width:100%">
            <thead>
              <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Company</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($employees as $employee)
              @php
              $encrypted_id=Crypt::encrypt($employee->id)
              @endphp
              <tr>
                <td>{{$employee->id}}</td>
                <td>{{$employee->name}}</td>
                <td>{{$employee->phone}}</td>
                <td>{{$employee->email}}</td>
                <td>{{$employee->Company?$employee->Company->name:'--'}}</td>
                <td>
                  <a href="{{route('employee.edit', $encrypted_id)}}" title="edit"><i class="ri-pencil-fill"></i></a>
                  <form action="{{route('employee.destroy', $encrypted_id)}}" method="POST">
                    @method('delete')
                    @csrf
                    <button type="submit"><i class="ri-delete-bin-line text-danger" title="delete"></i></button>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          <!-- End Table with stripped rows -->
          {{ $employees->links() }}
        </div>
      </div>

    </div>
  </div>
</section>



@endsection