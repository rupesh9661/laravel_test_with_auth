@extends('layouts.master')
@section('main')

<section class="section">
  <div class="row">
    <div class="col-md-12">

      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Update Employee Data</h5>

          <!-- Vertical Form -->
          <form class="row g-3" method="POST" action="{{route('employee.update',$data['employee']->id)}}" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <div class="col-md-3">
              <label for="inputNanme4" class="form-label"> Name</label>
              <input type="text" class="form-control" value="{{$data['employee']->name}}" id="name" name="name" required>
            </div>

            <div class="col-md-3">
              <label for="inputPassword4" class="form-label">Phone</label>
              <input type="text" class="form-control" value="{{$data['employee']->phone}}" id="phone" name="phone" required>
            </div>
            <div class="col-md-3">
              <label for="inputEmail4" class="form-label">Email</label>
              <input type="email" class="form-control" required value="{{$data['employee']->email}}" id="email" name="email" required>
            </div>
            <div class="col-md-3">
              <label for="" class="form-label"> Company</label>
              <select name="company_id" id="" class="form-control" required>
                <option value="">Select Company</option>
                @foreach($data['companies'] as $company)
                <option value="{{$company->id}}" {{$data['employee']->company_id==$company->id?'selected':''}}>{{$company->name}}</option>
                @endforeach
              </select>
            </div>
            <div class="text-center">
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