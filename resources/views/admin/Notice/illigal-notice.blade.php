@extends('admin.app')

@section('heading')
Generate Illigal Notice
@endsection

@section('pagecss')

@endsection

@section('activeDash')
class="active"
@endsection

@section('app-content')
<div class="row">
    <div class="card">
        <div class="card-body">
            <div class="card-block">
                <!-- Form -->
                <form class="form" action="notice/generate-notice" method="POST" target="_blank">
                    @csrf
                    <div class="form-body">
                        <h4 class="form-section"><i class="icon-file"></i> Generate Illigal Notice</h4>
                        <div class="row">
                            <div class="col-md-5 offset-md-3">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="name">Description</label>
                                        <textarea type="text" id="description" class="form-control" name="description" required>
                                        </textarea>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <button class="btn btn-primary btn-sm"><i class="fa fa-file"></i> Generate Notice</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- Form -->
            </div>
        </div>
    </div>
</div>
@endsection


@section('script')
<script>
    $(document).ready(function() {
        $("#dash3Active").addClass('active');
    })
</script>
@endsection