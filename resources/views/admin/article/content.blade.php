@extends('admin.layouts.page-content')

@section('content')
	<div class="row">
		<div style="margin:20px 30px 20px 30px;padding: 10px;background-color: #ffffff;">
            <?php echo $row['content']; ?>
		</div>
		<style>

		</style>
	</div>
@endsection

@section('javascript')
	<script type="text/javascript" charset="utf-8" src="{{URL::asset('')}}plugins/UEditor/ueditor.config.js"></script>
	<script type="text/javascript" charset="utf-8" src="{{URL::asset('')}}plugins/UEditor/ueditor.all.min.js"> </script>
	<script src="{{URL::asset('')}}static/admin/assets/js/select2/select2.js"></script>
	<script>

        var ue = UE.getEditor('editor');
        $("#parent-id").select2();
	</script>

@endsection