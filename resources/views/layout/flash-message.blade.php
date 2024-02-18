@if ($message = Session::get('success'))
<div class="alert alert-success alert-dismissible" role="alert">
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
</button>
<h6><i class="fas fa-check"></i><b> Success!</b></h6>
{{ $message }}
</div>
@endif    
@if ($message = Session::get('error'))
<div class="alert alert-danger alert-dismissible" role="alert">
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
</button>
<h6><i class="fas fa-ban"></i><b> Failed!</b></h6>
{{ $message }}
</div>
@endif    
     
@if ($message = Session::get('warning'))
<div class="alert alert-warning alert-dismissible" role="alert">
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
</button>
<h6><i class="fas fa-exclamation-triangle"></i><b> Warning!</b></h6>
{{ $message }}
</div>
@endif
     
@if ($message = Session::get('info'))
<div class="alert alert-info alert-dismissible" role="alert">
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
</button>
<h6><i class="fas fa-info"></i><b> Information!</b></h6>
{{ $message }}
</div>
@endif
    
@if ($errors->any())
<div class="alert alert-danger alert-dismissible" role="alert">
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
</button>
<h6><i class="fas fa-ban"></i><b> Failed!</b></h6>
{{ implode('', $errors->all(':message')) }}
</div>
@endif