<div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
    {!! Form::label('title', 'Judul') !!}
    {!! Form::text('title', null, ['class' => 'form-control', 'required' => 'required', 'autofocus']) !!}
    <small class="text-danger">{{ $errors->first('title') }}</small>
</div>

<div class="form-group{{ $errors->has('text') ? ' has-error' : '' }}">
    {!! Form::label('text', 'Running Text') !!}
    {!! Form::textarea('text', null, ['class' => 'form-control text-area', 'required' => 'required']) !!}
    <small class="text-danger">{{ $errors->first('text') }}</small>
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
