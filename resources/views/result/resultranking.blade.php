@extends('../layouts/home')

@section('content-wrapper')
<div class="row">
    <div class="col-md-12 grid-margin">
      <div class="d-flex justify-content-between flex-wrap">
        <div class="d-flex align-items-end flex-wrap">
          <div class="mr-md-3 mr-xl-5">
            <h2>Perankingan</h2>
            <p class="mb-md-0">Your analytics dashboard template.</p>
          </div>
          <div class="d-flex">
            <i class="mdi mdi-home text-muted hover-cursor"></i>
            <p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;Dashboard&nbsp;/&nbsp;</p>
            <p class="text-primary mb-0 hover-cursor">Analytics</p>
          </div>
        </div>
        <div class="d-flex justify-content-between align-items-end flex-wrap">
          <button class="btn btn-primary mt-2 mt-xl-0">Generate report</button>
        </div>
      </div>
    </div>
  </div>
  

  <div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>
                      No
                    </th>
                    <th>
                      Nama Alternatif
                    </th>
                    <th>
                      Ranking
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 1?>
                  @foreach ($results as $result)
                  <tr>
                    <td class="py-1">
                      {{ $no++ }}
                    </td>
                    <td>
                      {{ $result->nmalternatif }}
                    </td>
                    <td>
                      {{ $result->ranking }}
                    </td>
                  </tr>
                  @endforeach
                  
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
  </div>    
@endsection