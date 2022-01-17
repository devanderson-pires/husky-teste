@if(!empty($feedbackSuccess))
<div class="alert alert-success">{{$feedbackSuccess}}</div>
@endif

@if(!empty($feedbackError))
<div class="alert alert-danger">{{$feedbackError}}</div>
@endif

@if($errors->any())
<div class="alert alert-danger">
    <ul class="mb-0">
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>
</div>
@endif
