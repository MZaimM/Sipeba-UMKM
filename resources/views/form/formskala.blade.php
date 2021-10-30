@extends('../layouts/home')

@section('content-wrapper')
<div class="row">
    <div class="col-md-12 grid-margin">
      <div class="d-flex justify-content-between flex-wrap">
        <div class="d-flex align-items-end flex-wrap">
          <div class="mr-md-3 mr-xl-5">
            <h2>Input Data Skala</h2>
            <p class="mb-md-0">Your analytics dashboard template.</p>
          </div>
          <div class="d-flex">
            <i class="mdi mdi-home text-muted hover-cursor"></i>
            <p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;Dashboard&nbsp;/&nbsp;</p>
            <p class="text-primary mb-0 hover-cursor">Analytics</p>
          </div>
        </div>
        <div class="d-flex justify-content-between align-items-end flex-wrap">
      
        </div>
      </div>
    </div>
  </div>
  

  <div class="row">
    
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            {{-- <h4 class="card-title">Basic form elements</h4>
            <p class="card-description">
              Basic form elements
            </p> --}}
            @if (session('status'))
              <div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert">×</button>
                {{ session('status') }}
              </div>
            @elseif(session('failed'))
              <div class="alert alert-danger" role="alert">
                <button type="button" class="close" data-dismiss="alert">×</button>
                {{ session('failed') }}
              </div>
            @endif
            <form class="forms-sample" action="/skala" method="POST">
              @csrf
              <div class="form-group">
                <label for="exampleInputName1">Keterangan</label>
                <input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="keterangan">
              </div>
              <div class="form-group">
                <label for="exampleInputName1">Value</label>
                <input type="text" class="form-control" id="value" name="value" placeholder="value">
              </div>
              <button type="submit" class="btn btn-primary mr-2">Submit</button>
              <button class="btn btn-light">Cancel</button>
            </form>
          </div>
        </div>
      
  </div>    
@endsection