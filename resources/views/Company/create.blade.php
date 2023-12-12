@extends('layouts.master')
@section('main')

<section class="section">
  <div class="row">
    <div class="col-md-12">

      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Add New Company</h5>

          <!-- Vertical Form -->
          <form class="row g-3" method="POST" action="{{route('company.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="col-md-4">
              <label for="inputNanme4" class="form-label">Name</label>
              <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="col-md-4">
              <label for="inputEmail4" class="form-label">Email</label>
              <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="col-md-4">
              <label for="inputEmail4" class="form-label">Logo Image</label>
              <input type="file" class="form-control" id="logo" name="logo" required>
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