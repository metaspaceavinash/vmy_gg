@extends('layouts.admin')
@section('page-title')
    {{ __('Business') }}
@endsection
@section('title')
    {{ __('Business') }}
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item active" aria-current="page">{{ __('Business') }}</li>
@endsection
@section('action-btn')
    @can('create business')
    <div class="col-xl-12 col-lg-12 col-md-12 d-flex align-items-center justify-content-between justify-content-md-end"
        data-bs-placement="top">
        <a href="#" data-size="lg" data-url="{{ route('business.create') }}" data-ajax-popup="true" data-bs-toggle="tooltip" title="{{__('Create')}}" data-title="{{__('Create New Business')}}" class="btn btn-sm btn-primary">
            <i class="ti ti-plus"></i>
        </a>
    </div>
    @endcan
@endsection
@section('content')
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body table-border-style">
                <h5></h5>
                <div class="table-responsive">
                    <table class="table" id="pc-dt-simple">
                        <br>
                        <thead>
                            <tr>
                                <th>{{ __('No') }}</th>
                                <th>{{ __('Businesses') }}</th>
                                <th class="text-end">{{ __('Operations') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($business as $val)
                                <tr>
                                    <td>{{ $loop->index + 1 }}</td>
                                    <td class="align-middle">
                                        <a class="btn btn-outline-primary" style="min-width: 180px;"
                                            href="{{ route('business.edit', $val->id) }}"><b>{{ $val->title }}</b></a>
                                    </td>
                                    <div class="row ">
                                        <td class="text-end">
                                            @if ($val->status != 'lock')
                                                <div class="action-btn bg-success  ms-2">
                                                    <a href="#"
                                                        class="mx-3 btn btn-sm d-inline-flex align-items-center cp_link"
                                                        data-link="{{ url('/' . $val->slug) }}" data-bs-toggle="tooltip"
                                                        data-bs-original-title="{{ __('Click to copy card link') }}"> <span
                                                            class="text-white"> <i
                                                                class="ti ti-copy text-white"></i></span></a>
                                                </div>
                                                @can('view analytics business')
                                                <div class="action-btn bg-info  ms-2">
                                                    <a href="{{ route('business.analytics', $val->id) }}"
                                                        class="mx-3 btn btn-sm d-inline-flex align-items-center"
                                                        data-bs-toggle="tooltip"
                                                        data-bs-original-title="{{ __('Business Analytics') }}"> <span
                                                            class="text-white"> <i
                                                                class="ti ti-brand-google-analytics  text-white"></i></span></a>
                                                </div>
                                                @endcan
                                                @can('calendar appointment')
                                                <div class="action-btn bg-warning  ms-2">
                                                    <a href="{{ route('appointment.calendar', $val->id) }}"
                                                        class="mx-3 btn btn-sm d-inline-flex align-items-center"
                                                        data-bs-toggle="tooltip"
                                                        data-bs-original-title="{{ __('Business Calender') }}"> <span
                                                            class="text-white"> <i
                                                                class="ti ti-calendar text-white"></i></span></a>
                                                </div>
                                                @endcan
                                                <div class="action-btn bg-info  ms-2">
                                                    <a href="{{ route('business.edit', $val->id) }}"
                                                        class="mx-3 btn btn-sm d-inline-flex align-items-center"
                                                        data-bs-toggle="tooltip"
                                                        data-bs-original-title="{{ __('Business Edit') }}"> <span
                                                            class="text-white"> <i
                                                                class="ti ti-edit text-white"></i></span></a>
                                                </div>
                                                @can('manage contact')
                                                    <div class="action-btn bg-warning  ms-2">
                                                        <a href="{{ route('business.contacts.show', $val->id) }}"
                                                            class="mx-3 btn btn-sm d-inline-flex align-items-center"
                                                            data-bs-toggle="tooltip"
                                                            data-bs-original-title="{{ __('Business Contacts') }}"> <span
                                                                class="text-white"> <i
                                                                    class="ti ti-phone text-white"></i></span></a>
                                                    </div>
                                                @endcan
                                                @can('delete business')
                                                <div class="action-btn bg-danger ms-2">
                                                    <a href="#"
                                                        class="bs-pass-para mx-3 btn btn-sm d-inline-flex align-items-center"
                                                        data-confirm="{{ __('Are You Sure?') }}"
                                                        data-text="{{ __('This action can not be undone. Do you want to continue?') }}"
                                                        data-confirm-yes="delete-form-{{ $val->id }}"
                                                        title="{{ __('Delete') }}" data-bs-toggle="tooltip"
                                                        data-bs-placement="top"><span class="text-white"><i
                                                                class="ti ti-trash"></i></span></a>
                                                </div>
                                                {!! Form::open([
                                                    'method' => 'DELETE',
                                                    'route' => ['business.destroy', $val->id],
                                                    'id' => 'delete-form-' . $val->id,
                                                ]) !!}
                                                {!! Form::close() !!}
                                                @endcan
                                            @else
                                                <span class="edit-icon align-middle bg-gray"><i
                                                        class="fas fa-lock text-white"></i></span>
                                            @endif
                                        </td>
                                    </div>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('custom-scripts')
    <script type="text/javascript">
        $('.cp_link').on('click', function() {
            var value = $(this).attr('data-link');
            var $temp = $("<input>");
            $("body").append($temp);
            $temp.val(value).select();
            document.execCommand("copy");
            $temp.remove();
            toastrs('{{ __('Success') }}', '{{ __('Link Copy on Clipboard') }}', 'success');
        });
    </script>
@endpush
