@extends('layouts.master')

@section('content')
    <section id="feature" class="section-padding wow fadeInUp delay-05s">
        <div class="container-fluid cards-row">
        <div class="container">
            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="wraper container-fluid">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="bg-picture text-center">
                                    <div class="bg-picture-overlay"></div>
                                    <div class="profile-info-name">
                                        <img src="../img/uploads/{{$user->avatar}}" style="width:150px;length:150px;"class="thumb-lg img-circle img-thumbnail" alt="profile-image">
                                        <h3 class="text-white">{{$user->name}}'s Profile</h3>
                                    </div>
                                <!--/ meta -->
                                </div>
                            </div>
                        </div>
                        <div class="row user-tabs">
                            <div class="col-lg-6 col-md-9 col-sm-9">
                                <ul class="nav nav-tabs tabs">
                                    <li class="active tab">
                                        <a href="#home-2" data-toggle="tab" aria-expanded="false" class="active">
                                            <span class="visible-xs"><i class="fa fa-home"></i></span>
                                            <span class="hidden-xs">About Me</span>
                                        </a>
                                    </li>
                                    <li class="tab">
                                        <a href="#settings-2" data-toggle="tab" aria-expanded="false">
                                            <span class="visible-xs"><i class="fa fa-cog"></i></span>
                                            <span class="hidden-xs">Settings</span>
                                        </a>
                                    </li>
                                    <div class="indicator"></div>
                                </ul>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="tab-content profile-tab-content">
                                    <div class="tab-pane active" id="home-2">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <!-- Personal-Information -->
                                                <div class="panel panel-default panel-fill">
                                                    <div class="panel-heading">
                                                        <h3 class="panel-title">Personal Information</h3>
                                                    </div>
                                                    <div class="panel-body">
                                                        <div class="about-info-p">
                                                            <strong>Full Name</strong>
                                                            <br/>
                                                            <p class="text-muted">{{$user->name}}</p>
                                                        </div>
                                                        <div class="about-info-p">
                                                            <strong>Type</strong>
                                                            <br/>
                                                            <p class="text-muted">{{$user->userType}}</p>
                                                        </div>
                                                        <div class="about-info-p">
                                                            <strong>Username</strong>
                                                            <br/>
                                                            <p class="text-muted">{{$user->username}}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <!-- Personal-Information -->
                                                <div class="panel panel-default panel-fill">
                                                    <div class="panel-heading">
                                                        <h3 class="panel-title">Assessment Results</h3>
                                                    </div>
                                                    <div class="panel-body">
                                                        @if($user->resultCollege==NULL)
                                                            <p>You currently have no results. Please take the assessment test first.</p>
                                                        @else
                                                        <div class="panel-group panel-group-joined" id="accordion-test">
                                                            <?php $j = 0;?>
                                                           @foreach($all as $college)
                                                              <div class="panel-group panel-group-joined" id="accordion-test">
                                                                    <div class="panel panel-default">
                                                                        <div class="panel-heading">
                                                                            <h4 class="panel-title">
                                                                                <a data-toggle="collapse" data-parent="#accordion-test-2" href="#{{$college['colleges']->pluck('id')->implode('')}}-college" aria-expanded="false" class="collapsed">
                                                                                    {{$college['colleges']->pluck('collegeName')->implode('')}}
                                                                                </a>
                                                                            </h4>
                                                                        </div>
                                                                        <div id="{{$college['colleges']->pluck('id')->implode('')}}-college" class="panel-collapse collapse">
                                                                            <div class="panel-body">
                                                                            @foreach($all[$j]['degrees'] as $degree)
                                                                                <div class="panel panel-default">
                                                                                    <div class="panel-heading">
                                                                                        <h4 class="panel-title">
                                                                                            <a data-toggle="collapse" data-parent="#accordion-test-2" href="#{{$degree->id}}" aria-expanded="false" class="collapsed">
                                                                                                {{$degree->degreeDesc}}
                                                                                            </a>
                                                                                        </h4>
                                                                                    </div>
                                                                                    <div id="{{$degree->id}}" class="panel-collapse collapse">
                                                                                        <div class="panel-body">
                                                                                            <p>
                                                                                              Jobs: {!! nl2br(e($degree->degreeJobs)) !!}
                                                                                            </p>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                              @endforeach
                                                                              <?php $j++; ?>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                              </div>
                                                          @endforeach
                                                        </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Personal-Information -->
                                    </div>
                                    <div class="tab-pane" id="settings-2">
                                    <!-- Personal-Information -->
                                    <div class="panel panel-default panel-fill">
                                        <div class="panel-heading">
                                            <h3 class="panel-title">Change Image</h3>
                                        </div>
                                        <div class="panel-body">
                                            <form enctype="multipart/form-data" action="/sendImg" method="POST">
                                                <label>Update Profile Image</label>
                                                <input name="avatar" type="file">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <input type="submit" class="pull-right btn btn-sm btn-primary">
                                            </form>
                                        </div>
                                    </div>
                                    <!-- Personal-Information -->
                                </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- container -->
                </div> <!-- content -->
            </div>
        </div>
    </div>
    </section>
@endsection
