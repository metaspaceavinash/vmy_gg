{{Form::open(array('route'=>'physical_card.pstatus_store','method'=>'post'))}}
<div class="card">
    <div class="row">
        <div class="col-12">
            <div class="form-group col-md-12">
                {{ Form::label('platform', __('Status'),['class'=>'form-label']) }}
                {!! Form::select('p_status', $p_status, null,array('class' => 'form-control select2 p_status','required'=>'required')) !!}
                @error('platform')
                <small class="invalid-role" role="alert">
                    <strong class="text-danger">{{ $message }}</strong>
                </small>
                @enderror
            </div>
        </div>
        <div class="col-12">
            <div class="form-group col-md-12">
                {{Form::label('pixel_id',__('Comment'))}}
                {{Form::text('p_comment',null,array('class'=>'form-control mt-2','placeholder'=>__('Enter Comment')))}}
                @error('pixel_id')
                <span class="invalid-name" role="alert">
                            <strong class="text-danger">{{ $message }}</strong>
                        </span>
                @enderror
            </div>
        </div>
        <input type="hidden" name="p_id" value="{{ $p_id }}">
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{__('Cancel')}}</button>
    {{Form::submit(__('Update'),array('class'=>'btn btn-primary'))}}
</div>
{{Form::close()}}
