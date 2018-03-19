<div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
    {!! Form::label('title', 'Graha 1') !!}
    {!! Form::select('title', ['Graha 1' => 'Graha 1', 'Graha 2' => 'Graha 2'], null, ['id' => 'title', 'class' => 'form-control', 'required' => 'required']) !!}
    <small class="text-danger">{{ $errors->first('title') }}</small>
</div>

<div class="form-group{{ $errors->has('body') ? ' has-error' : '' }}">
    {!! Form::label('body', 'Informasi') !!}
    {!! Form::textarea('body', null, ['class' => 'form-control text-area', 'required' => 'required']) !!}
    <small class="text-danger">{{ $errors->first('body') }}</small>
</div>

<div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
    {!! Form::label('status', 'Publish ?') !!}
    {!! Form::select('status', [0 => 'Tidak', 1 => 'Ya'], null, ['id' => 'status', 'class' => 'form-control', 'required' => 'required']) !!}
    <small class="text-danger">{{ $errors->first('status') }}</small>
</div>

<div class="form-group text-right m-b-0">
    <a href="{{ empty($bread['0']) ? url()->previous() : $bread['0']  }}" class="btn btn-white m-l-5">
        Cancel
    </a>
    <button class="btn btn-primary waves-effect waves-light" type="submit">
        Submit
    </button>
</div>