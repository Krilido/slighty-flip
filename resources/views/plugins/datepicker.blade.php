@section('css') @parent
<link rel="stylesheet" href="{{asset('assets/modules/bootstrap-datepicker/bootstrap-datepicker.min.css')}}">
@endsection

@section('js-plugin') @parent
<script src="{{asset('assets/js/moment.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/modules/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
<script>
    $('.datetimepicker1').datepicker({
		uiLibrary: 'bootstrap4',
		format: 'dd-mm-yyyy'
    });
    $('.datetimepicker2').datepicker({
		uiLibrary: 'bootstrap4',
		format: 'dd-mm-yyyy'
    });
    $('.datetimepicker3').datepicker({
		uiLibrary: 'bootstrap4',
		format: 'dd-mm-yyyy'
    });
    $('.datetimepicker4').datepicker({
		uiLibrary: 'bootstrap4',
		format: 'dd-mm-yyyy'
    });
</script>
@endsection