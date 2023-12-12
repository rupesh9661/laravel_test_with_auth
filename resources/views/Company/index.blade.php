@extends('layouts.master')
@section('main')

<div class="pagetitle">
  <h1>Companies</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/">Home</a></li>
      <li class="breadcrumb-item">Companies</li>

    </ol>
  </nav>
</div><!-- End Page Title -->

<section class="section">
  <div class="row">
    <div class="col-lg-12">

      <div class="card">
        <div class=" table-responsive">
          <h5 class="card-title">All Companies</h5>

          <!-- Table with stripped rows -->
          <table class="table table-bordered" style="width:100%">
            <thead>
              <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Logo</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($companies as $company)
              @php
              $encrypted_id=Crypt::encrypt($company->id)
              @endphp
              <tr>
                <td>{{$company->id}}</td>
                <td>{{$company->name}}</td>
                <td>{{$company->email}}</td>
                <td>
                  <img src='{{asset("images/logo/$company->logo_image_name")}}' alt="" height="50px">
                </td>
                <td>
                  <a href="{{route('company.edit', $encrypted_id)}}" title="edit"><i class="ri-pencil-fill"></i></a>
                  <form action="{{route('company.destroy', $encrypted_id)}}" method="POST">
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
          {{ $companies->links() }}
        </div>
      </div>

    </div>
  </div>
</section>



@endsection