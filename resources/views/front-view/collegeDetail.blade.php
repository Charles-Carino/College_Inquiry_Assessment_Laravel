@extends ('layouts.master')

@section('content')
<link href="../css/agri-styles.css" rel="stylesheet">
<section id="feature" class="section-padding wow fadeInUp delay-05s">
  <div class="col-md-12 text-center">
    <h2 class="service-title pad-bt15">{{$college->collegeName}}</h2>
    <hr class="bottom-line">
  </div>
  <div class="container-fluid cards-row">
    <div class="container">
      <div id="collegeInfo" class="row">
        <div id="college-info"class="col-md-6">
          <div class="card">
            <ul class="nav nav-tabs" role="tablist">
              <li role="presentation" class="active"><a href="#about" aria-controls="home" role="tab" data-toggle="tab">About</a></li>
              <li role="presentation"><a href="#degrees" aria-controls="profile" role="tab" data-toggle="tab">Degrees</a></li>
              <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Contact Us</a></li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
              <div role="tabpanel" class="tab-pane active" id="about">
                {!! nl2br($college->collegeAboutInfo) !!}
              </div>
            <div role="tabpanel" class="tab-pane" id="degrees">
            <div class="panel-group panel-group-joined" id="accordion-test">
              @foreach ($college->degree as $key)
                  <div class="panel panel-default">
                      <div class="panel-heading">
                          <h4 class="panel-title">
                              <a data-toggle="collapse" data-parent="#accordion-test-2" href="#{{$key->id}}" aria-expanded="false" class="collapsed">
                                  {{$key->degreeDesc}}
                              </a>
                          </h4>
                      </div>
                      <div id="{{$key->id}}" class="panel-collapse collapse">
                          <div class="panel-body">
                              <p>
                                Jobs: <td>{!! nl2br(e($key->degreeJobs)) !!}</td>
                              </p>
                          </div>
                      </div>
                  </div>
                @endforeach
              </div>
              </div>
              <div role="tabpanel" class="tab-pane" id="messages">
                <i class="glyphicon glyphicon-user">{{$college->collegeDean}}</i><br /><br />
                <i class="glyphicon glyphicon-earphone">{{$college->collegePhoneNumber}}</i><br /><br />
                <i class="glyphicon glyphicon-envelope">{{$college->collegeEmail}}</i><br /><br />
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
