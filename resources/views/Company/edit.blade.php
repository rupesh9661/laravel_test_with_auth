@extends('layouts.master')
@section('main')

<section class="section">
  <div class="row">
    <div class="col-md-12">

      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Update Company Data</h5>

          <!-- Vertical Form -->
          <form class="row g-3" method="POST" action="{{route('company.update',$data['company']->id)}}" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <div class="col-md-3">
              <label for="inputNanme4" class="form-label"> Name</label>
              <input type="text" class="form-control" value="{{$data['company']->name}}" id="name" name="name" required>
            </div>
            <div class="col-md-3">
              <label for="inputEmail4" class="form-label">Email</label>
              <input type="email" class="form-control" value="{{$data['company']->email}}" id="email" name="email" required>
            </div>
            <div class="col-md-4">
              <label for="inputEmail4" class="form-label">Logo Image</label>
              <input type="file" class="form-control" id="logo" name="logo">
              @if(!empty($data['company'])&& $data['company']->logo_image_name)
              <img src="{{asset('images/profile_images/'.$data['company']->logo_image_name)}}" alt="logo">
              @endif
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