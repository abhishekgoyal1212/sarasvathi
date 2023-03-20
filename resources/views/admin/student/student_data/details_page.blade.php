@extends('admin.index')
@section('title','STUDENTS')
@section('content')
<div class="content-wrapper">
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet">
  <!-- Bootstrap CSS -->
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
  <!-- Font Awesome CSS -->
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css'>
  <style>
    .student-profile .card {
      border-radius: 10px;
    }

    .student-profile .card .card-header .profile_img {
      width: 150px;
      height: 150px;
      object-fit: cover;
      margin: 10px auto;
      border: 10px solid #ccc;
      border-radius: 50%;
    }

    .student-profile .card h3 {
      font-size: 20px;
      font-weight: 700;
    }

    .student-profile .card p {
      font-size: 16px;
      color: #000;
    }

    .student-profile .table th,
    .student-profile .table td {
      font-size: 14px;
      padding: 5px 10px;
      color: #000;
    }
  </style>

  <div class="student-profile py-4">
    <div class="container">
      <div class="row">
        <div class="col-lg-4">
          <div class="card shadow-sm">
            <div class="card-header bg-transparent text-center">
            
              <img class="profile_img" src="{{asset('admin-assets/img/avata.jpg')}}" alt="student dp">
             
              <h3>{{$all_info->fullname}}</h3>
            </div>
            <div class="card-body">
              <p class="mb-0"><strong class="pr-1">Student ID:</strong>#0{{$all_info->id}}</p>
              @if($all_info->school_id != 0)
              <p class="mb-0"><strong class="pr-1">School:</strong>{{$all_info->school->fullname}}</p>
              @endif
              <p class="mb-0"><strong class="pr-1">Class:</strong>{{$all_info->class->name}}</p>
              
              <p class="mb-0"><strong class="pr-1">Board:</strong>{{$all_info->board->name}}</p>
            </div>
          </div>
        </div>
        <div class="col-lg-8">
          <div class="card shadow-sm">
            <div class="card-header bg-transparent border-0">
              <h3 class="mb-0"><i class="far fa-clone pr-1"></i>General Information</h3>
            </div>
             <div class="card-body pt-0">
              <table class="table table-bordered">
                <tr>
                  <th width="30%">Contact No.</th>
                  <td width="2%">:</td>
                  <td>{{$all_info->mobile}}</td>
                </tr>
                <tr>
                  <th width="30%">Email</th>
                  <td width="2%">:</td>
                  <td>{{$all_info->email}}</td>
                </tr>
                <tr>
                  <th width="30%">Registered Date</th>
                  <td width="2%">:</td>
                  <td>{{$all_info->created_at}}</td>
                </tr>
              </table>
            </div>
            <!-- <div class="card-body pt-0">
              <table class="table table-bordered">
                <tr>
                  <th width="30%">Roll</th>
                  <td width="2%">:</td>
                  <td>125</td>
                </tr>
                <tr>
                  <th width="30%">Academic Year </th>
                  <td width="2%">:</td>
                  <td>2020</td>
                </tr>
                <tr>
                  <th width="30%">Gender</th>
                  <td width="2%">:</td>
                  <td>Male</td>
                </tr>
                <tr>
                  <th width="30%">Religion</th>
                  <td width="2%">:</td>
                  <td>Group</td>
                </tr>
                <tr>
                  <th width="30%">blood</th>
                  <td width="2%">:</td>
                  <td>B+</td>
                </tr>
              </table>
            </div> -->
          </div>
          <div style="height: 26px"></div>
          <!-- <div class="card shadow-sm">
          <div class="card-header bg-transparent border-0">
            <h3 class="mb-0"><i class="far fa-clone pr-1"></i>Other Information</h3>
          </div>
          <div class="card-body pt-0">
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
          </div>
        </div> -->
        </div>
      </div>
    </div>
  </div>
</div>
@stop