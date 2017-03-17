@if (session('alert-success'))
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="alert alert-success alert-dismissable">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    {{ session('alert-success') }}
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
@elseif(session('alert-fail'))
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="alert alert-danger alert-dismissable">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    {{ session('alert-fail') }}
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
@endif