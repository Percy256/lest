@extends('layouts.app', [
    'namePage' => 'Table List',
    'class' => 'sidebar-mini',
    'activePage' => 'table',
  ])

@section('content')
  <div class="panel-header panel-header-sm">
  </div>
  <div class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title"> Participants Table</h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-primary">
                  <th>
                    ID
                  </th>
                  <th>
                    NAME
                  </th>
                  <th>
                    DOB
                  </th>
                  <th class="text-right">
                    PRODUCT
                  </th>
                </thead>
                <tbody>
                @for($i = 0; $i < count($participants); $i = $i + 4)
                  <tr>
                    <td>
                      {{$participants[$i]}}
                    </td>
                    <td>
                      {{$participants[$i + 1]}}
                    </td>
                    <td>
                      {{$participants[$i + 2]}}
                    </td>
                    <td>
                      {{$participants[$i + 3]}}
                    </td>
                  </tr>
                  @endfor
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection 