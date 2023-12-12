@extends('layouts.master')
@section('main')

<section class="section">
  <div class="row">
    <div class="col-md-12">

      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Add New Employee</h5>

          <!-- Vertical Form -->
          <form class="row g-3" method="POST" action="{{route('employee.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="col-md-3">
              <label for="inputNanme4" class="form-label">Name</label>
              <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="col-md-3">
              <label for="inputPhone" class="form-label">Phone</label>
              <input type="number" class="form-control" id="phone" name="phone" required>
            </div>
            <div class="col-md-3">
              <label for="inputEmail4" class="form-label">Email</label>
              <input type="email" class="form-control" id="email" name="email">
            </div>
            <div class="col-md-3">
              <label for="" class="form-label"> Company</label>
              <select name="company_id" id="" class="form-control">
              <option value="">Select Company</option>
              @foreach($companies as $company)
              <option value="{{$company->id}}">{{$company->name}}</option>
              @endforeach
              </select>
            </div>
            <div class="text-center col-md-3">
              <button type="submit" class="btn btn-primary">Submit</button>
              <button type="reset" class="btn btn-secondary">Reset</button>
            </div>
          </form><!-- Vertical Form -->

        </div>
      </div>


    </div>
  </div>
</section>

@endsection