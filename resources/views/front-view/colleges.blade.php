@extends('layouts.master')

@section('content')
<section id="services" class="section-padding wow fadeInUp delay-05s">
 <div class="container">
   <div class="row">
     <div class="col-md-12 text-center">
       <h2 class="service-title pad-bt15">Colleges</h2>
       <hr class="bottom-line">
     </div>
         @foreach ($college as $colleges)
         <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="service-item">
               <h3>{{$colleges->collegeName}}</h3>
               <p>{!! nl2br(e($colleges->collegeAboutInfo)) !!}</p>
               <a href="colleges/{{$colleges->id}}">Learn More...</a>
            </div>
         </div>
         @endforeach
   </div>
 </div>
</section>
@endsection
