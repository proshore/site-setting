@extends(config('sitesetting.layout-extend-path'))

@section('content')
    @if(isset($siteSetting->id))
        {!! Form::model($siteSetting->meta_data, ['route' => ['sitesetting.update', $siteSetting->id ], 'method' => 'PUT', 'class' => 'site-setting']) !!}
    @else
        {!! Form::open(['route' => 'sitesetting.store', 'class' => 'site-setting']) !!}
    @endif

    @foreach($fields as $field)
        @switch(strtolower($field['type']))
        @case('textarea')
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">{{ ucwords(__($field['label'])) }}</label>
            <div class="col-sm-10">
                {!! Form::textarea($field['name'], null, ['class' => 'form-control']) !!}
            </div>
        </div>
        @break
        @case('checkbox')
        <div class="form-group row">
            <div class="col-sm-2">{{ ucwords(__($field['label'])) }}</div>
            <div class="col-sm-10">
                <div class="form-check">
                    <label class="form-check-label">
                        {!! Form::checkbox($field['name'], null, ['class' => 'form-check-input']) !!}
                        {{ $field['label'] }}
                    </label>
                </div>
            </div>
        </div>
        @break
        @case('radio')
        <div class="form-group row">
            <div class="col-sm-2">{{ ucwords(__($field['label'])) }}</div>
            <div class="col-sm-10">
                @foreach($field['options'] as $radioValue => $radioLabel)
                    <div class="form-check">
                        <label class="form-check-label">
                            {!! Form::radio($field['name'], $radioValue, ['class' => 'form-check-input']) !!}
                            {{ $radioLabel }}
                        </label>
                    </div>
                @endforeach
            </div>
        </div>
        @break
        @case('select')
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">{{ ucwords(__($field['label'])) }}</label>
            <div class="col-sm-10">
                {!! Form::select($field['name'], $field['options'], null, ['class' => 'form-control']) !!}
            </div>
        </div>
        @break
        @default
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">{{ ucwords(__($field['label'])) }}</label>
            <div class="col-sm-10">
                {!! Form::text($field['name'], null, ['class' => 'form-control']) !!}
            </div>
        </div>

        @endswitch
    @endforeach
    <div class="form-group row">
        <label class="col-sm-2 col-form-label">&nbsp;</label>
        <div class="col-sm-10">
            {!! Form::button(__('Update'),['type'=>'submit','class'=>'btn btn-primary']) !!}
        </div>
    </div>

    {!! Form::close() !!}
@endsection

