@extends('layouts.app')


@section('content')
<div class="container box">
    <h3>ข้อมูลจังหวัดในประเทศไทย</h3>
    <div class="form-group">
        <select name="province" id="province" class="form-control province">
            <option value="">เลือกข้อมูลจังหวัด</option>
            @foreach ($list as $row)
            <option value="{{ $row->id }}">{{$row->name_th}}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <select name="amphures" class="form-control amphures">
            <option value="">เลือกข้อมูลอำเภอ</option>
        </select>
    </div>
</div>
{{ csrf_field()}}
@endsection

@section('footer_scripts')
<script type="text/javascript">
$(document).ready(function(){
    $('.province').change(function() {
        if ($(this).val() != '') {
            var select = $(this).val();
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url: "{{ route('dropdown.fetch')}}",
                method: "POST",
                data: {
                    select: select,
                    _token: _token
                },
                success: function(result) {
                    $('.amphures').html(result);
                }
            })
        }
    });
});
</script>
@endsection