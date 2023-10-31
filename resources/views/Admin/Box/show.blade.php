@extends('Admin.master')
@section('content')
<h2 style="padding-bottom: 35px;float: left;">Show Box Details </h2>

<div class="clearfix"></div>

<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#Goals" role="tab" aria-controls="home" aria-selected="true">Goals</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#Mechanism" role="tab" aria-controls="profile" aria-selected="false">Mechanism</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#Funds" role="tab" aria-controls="contact" aria-selected="false">Funds</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#Methods" role="tab" aria-controls="contact" aria-selected="false">Methods</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#Structure" role="tab" aria-controls="contact" aria-selected="false">Structure</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#Methodologies" role="tab" aria-controls="contact" aria-selected="false">Methodologies</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#Projects" role="tab" aria-controls="contact" aria-selected="false">Projects</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#Type_Of_Parts" role="tab" aria-controls="contact" aria-selected="false">Type Of Parts</a>
  </li>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="Goals" role="tabpanel" aria-labelledby="home-tab">
    <ul>
      @foreach ($goals as $goal)
          <li>{{$goal->desc_ar}}</li>
      @endforeach
    </ul>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#goals">
      Add New Goals
    </button>
    
  </div>
  <div class="tab-pane fade" id="Mechanism" role="tabpanel" aria-labelledby="profile-tab">
    @foreach ($mechs as $goal)
      <li>{{$goal->desc_ar}}</li>
    @endforeach
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#mechs">
      Add New Mechnism
    </button>

  </div>
  <div class="tab-pane fade" id="Funds" role="tabpanel" aria-labelledby="contact-tab">
    @foreach ($funds as $goal)
      <li>{{$goal->desc_ar}}</li>
    @endforeach
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Funds">
      Add New Funds
    </button>

  </div>
  <div class="tab-pane fade" id="Methods" role="tabpanel" aria-labelledby="home-tab">
    @foreach ($methods as $goal)
      <li>{{$goal->desc_ar}}</li>
    @endforeach
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Methods">
      Add New Methods
    </button>

  </div>
  <div class="tab-pane fade" id="Structure" role="tabpanel" aria-labelledby="profile-tab">
    @foreach ($structs as $goal)
      <li>{{$goal->name_ar}}</li>
    @endforeach
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Structure">
      Add New Straucture
    </button>

  </div>
  <div class="tab-pane fade" id="Methodologies" role="tabpanel" aria-labelledby="contact-tab">
    @foreach ($methodologys as $goal)
      <li>{{$goal->desc_ar}}</li>
    @endforeach
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Methodologies">
      Add New Metholology
    </button>

  </div>
  <div class="tab-pane fade" id="Projects" role="tabpanel" aria-labelledby="home-tab">
    @foreach ($projects as $goal)
      <li>{{$goal->name_ar}}</li>
    @endforeach
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Projects">
      Add New Project
    </button>

  </div>
  <div class="tab-pane fade" id="Type_Of_Parts" role="tabpanel" aria-labelledby="profile-tab">
    @foreach ($tparts as $goal)
      <li>{{$goal->desc_ar}}</li>
    @endforeach
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Type_Of_Parts">
      Add New partts
    </button>

  </div>
</div>  


{{-- //MODAALLLLLLLLLLLLLLLLLLLLLS --}}
<!-- Modal -->
<div class="modal fade" id="goals" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add Goals</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{ route('admin.addGoals', $id) }}" enctype="multipart/form-data">
          @csrf      
          <div class="form-group">
              <label for="img">Desc(AR)</label>
              <input type="text" class="form-control" id="img" name="desc_ar" placeholder="Write Desc.." required>
          </div>
          <div class="form-group">
              <label for="img">Desc(en)</label>
              <input type="text" class="form-control" id="img" name="desc_en" placeholder="Write Desc.." required>
          </div>
          <div class="form-group">
              <label for="img">Desc(so)</label>
              <input type="text" class="form-control" id="img" name="desc_so" placeholder="Write Desc.." required>
          </div>
      
          <button type="submit" class="btn btn-primary">Submit</button>
      </form>      
      </div>
    </div>
  </div>
</div>
{{-- END MODAL --}}
<!-- Modal -->
<div class="modal fade" id="mechs" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add Mechanism</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{ route('admin.addmech', $id) }}" enctype="multipart/form-data">
          @csrf      
          <div class="form-group">
              <label for="img">Desc(AR)</label>
              <input type="text" class="form-control" id="img" name="desc_ar" placeholder="Write Desc.." required>
          </div>
          <div class="form-group">
              <label for="img">Desc(en)</label>
              <input type="text" class="form-control" id="img" name="desc_en" placeholder="Write Desc.." required>
          </div>
          <div class="form-group">
              <label for="img">Desc(so)</label>
              <input type="text" class="form-control" id="img" name="desc_so" placeholder="Write Desc.." required>
          </div>
      
          <button type="submit" class="btn btn-primary">Submit</button>
      </form>      
      </div>
    </div>
  </div>
</div>
{{-- END MODAL --}}
<!-- Modal -->
<div class="modal fade" id="Funds" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add Funds</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{ route('admin.addfunds', $id) }}" enctype="multipart/form-data">
          @csrf      
          <div class="form-group">
              <label for="img">Desc(AR)</label>
              <input type="text" class="form-control" id="img" name="desc_ar" placeholder="Write Desc.." required>
          </div>
          <div class="form-group">
              <label for="img">Desc(en)</label>
              <input type="text" class="form-control" id="img" name="desc_en" placeholder="Write Desc.." required>
          </div>
          <div class="form-group">
              <label for="img">Desc(so)</label>
              <input type="text" class="form-control" id="img" name="desc_so" placeholder="Write Desc.." required>
          </div>
      
          <button type="submit" class="btn btn-primary">Submit</button>
      </form>      
      </div>
    </div>
  </div>
</div>
{{-- END MODAL --}}



<!-- Modal -->
<div class="modal fade" id="Methods" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add Funds</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{ route('admin.addMethods', $id) }}" enctype="multipart/form-data">
          @csrf      
          <div class="form-group">
              <label for="img">Desc(AR)</label>
              <input type="text" class="form-control" id="img" name="desc_ar" placeholder="Write Desc.." required>
          </div>
          <div class="form-group">
              <label for="img">Desc(en)</label>
              <input type="text" class="form-control" id="img" name="desc_en" placeholder="Write Desc.." required>
          </div>
          <div class="form-group">
              <label for="img">Desc(so)</label>
              <input type="text" class="form-control" id="img" name="desc_so" placeholder="Write Desc.." required>
          </div>
      
          <button type="submit" class="btn btn-primary">Submit</button>
      </form>      
      </div>
    </div>
  </div>
</div>
{{-- END MODAL --}}
<!-- Modal -->
<div class="modal fade" id="Structure" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add Structure</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{ route('admin.addStructs', $id) }}" enctype="multipart/form-data">
          @csrf      
          <div class="form-group">
              <label for="img">Desc(AR)</label>
              <input type="text" class="form-control" id="img" name="desc_ar" placeholder="Write Desc.." required>
          </div>
          <div class="form-group">
              <label for="img">Desc(en)</label>
              <input type="text" class="form-control" id="img" name="desc_en" placeholder="Write Desc.." required>
          </div>
          <div class="form-group">
              <label for="img">Desc(so)</label>
              <input type="text" class="form-control" id="img" name="desc_so" placeholder="Write Desc.." required>
          </div>
      
          <button type="submit" class="btn btn-primary">Submit</button>
      </form>      
      </div>
    </div>
  </div>
</div>
{{-- END MODAL --}}
<!-- Modal -->
<div class="modal fade" id="Methodologies" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add Methodologys</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{ route('admin.addMethodology', $id) }}" enctype="multipart/form-data">
          @csrf      
          <div class="form-group">
              <label for="img">Desc(AR)</label>
              <input type="text" class="form-control" id="img" name="desc_ar" placeholder="Write Desc.." required>
          </div>
          <div class="form-group">
              <label for="img">Desc(en)</label>
              <input type="text" class="form-control" id="img" name="desc_en" placeholder="Write Desc.." required>
          </div>
          <div class="form-group">
              <label for="img">Desc(so)</label>
              <input type="text" class="form-control" id="img" name="desc_so" placeholder="Write Desc.." required>
          </div>
      
          <button type="submit" class="btn btn-primary">Submit</button>
      </form>      
      </div>
    </div>
  </div>
</div>
{{-- END MODAL --}}
<!-- Modal -->
<div class="modal fade" id="Projects" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add project</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{ route('admin.addProject', $id) }}" enctype="multipart/form-data">
          @csrf      
          <div class="form-group">
              <label for="img">Desc(AR)</label>
              <input type="text" class="form-control" id="img" name="desc_ar" placeholder="Write Desc.." required>
          </div>
          <div class="form-group">
              <label for="img">Desc(en)</label>
              <input type="text" class="form-control" id="img" name="desc_en" placeholder="Write Desc.." required>
          </div>
          <div class="form-group">
              <label for="img">Desc(so)</label>
              <input type="text" class="form-control" id="img" name="desc_so" placeholder="Write Desc.." required>
          </div>
      
          <button type="submit" class="btn btn-primary">Submit</button>
      </form>      
      </div>
    </div>
  </div>
</div>
{{-- END MODAL --}}
<!-- Modal -->
<div class="modal fade" id="Type_Of_Parts" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Add Funds</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="{{ route('admin.addTypeOfParts', $id) }}" enctype="multipart/form-data">
          @csrf      
          <div class="form-group">
              <label for="img">Desc(AR)</label>
              <input type="text" class="form-control" id="img" name="desc_ar" placeholder="Write Desc.." required>
          </div>
          <div class="form-group">
              <label for="img">Desc(en)</label>
              <input type="text" class="form-control" id="img" name="desc_en" placeholder="Write Desc.." required>
          </div>
          <div class="form-group">
              <label for="img">Desc(so)</label>
              <input type="text" class="form-control" id="img" name="desc_so" placeholder="Write Desc.." required>
          </div>
      
          <button type="submit" class="btn btn-primary">Submit</button>
      </form>      
      </div>
    </div>
  </div>
</div>
{{-- END MODAL --}}


@push("custom-css")

<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
<link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />

@endpush
@endsection
