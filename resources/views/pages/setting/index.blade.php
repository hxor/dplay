@extends('layouts.app')

@section('styles')
	{{-- Colorpicker --}}
    <link href="{{ asset('/assets/vendor/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
        	{!! Form::model($setting, ['route' => 'admin.setting.store', 'method' => 'POST']) !!}
            <div class="panel panel-default">
                <div class="panel-heading">
                    Setting
                    <button class="btn btn-primary pull-right" style="margin-top: -8px;" type="submit">Save</button>
                </div>

                <div class="panel-body">
                    <div class="form-group{{ $errors->has('logo') ? ' has-error' : '' }}">
			            {!! Form::label('logo', 'Logo') !!}
			            <div class="input-group">
			              {!! Form::text('logo', null, ['id' => 'thumbnail', 'class' => 'form-control', 'readonly' => 'readonly']) !!}
			              <span class="input-group-btn">
			                <a id="lfm" data-input="thumbnail" data-preview="holder" class="btn btn-default">
			                  <i class="fa fa-cloud-upload"></i> Choose
			                </a>
			              </span>
			            </div>
			            @if (isset($setting) && $setting->logo !== '')
			            <img src="{{ $setting->logo }}" id="holder" style="margin-top:15px;max-height:254px;max-width: 152px;">
			            @endif
			            <img id="holder" style="margin-top:15px;max-height:254px;max-width: 152px;">
			            <small class="text-danger">{{ $errors->first('logo') }}</small>
			        </div>

			         <div class="form-group{{ $errors->has('color') ? ' has-error' : '' }}">
					    {!! Form::label('color', 'Color Schema') !!}
					    <div data-color-format="rgb" class="colorpicker-default input-group">
					    {!! Form::text('color', null, ['class' => 'form-control', 'id' => 'title', 'required' => 'required']) !!}
					        <span class="input-group-btn add-on">
					            <button class="btn btn-white" type="button">
					                <i style="background-color: rgb(25,48,124);margin-top: 2px;"></i>
					            </button>
					        </span>
					    <small class="text-danger">{{ $errors->first('color') }}</small>
					    </div>
					</div>
                </div>

                <div class="panel-footer" style="padding-bottom: 47px;">
                	<button class="btn btn-primary pull-right" type="submit">Save</button>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script src="{{ asset('vendor/laravel-filemanager/js/lfm.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#lfm').filemanager('image');
        });
    </script>

    <script src="{{ url('/assets/vendor/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js') }}"></script>
	<script type="text/javascript">
	    jQuery(document).ready(function() {
	        //colorpicker start
	        $('.colorpicker-default').colorpicker({
	            format: 'hex'
	        });
	        $('.colorpicker-rgba').colorpicker();
	    });
	</script>
@endsection
