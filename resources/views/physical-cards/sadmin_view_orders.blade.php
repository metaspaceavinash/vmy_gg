@extends('layouts.admin')
@section('content')
@section('page-title')
    Physical Card Request
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item active" aria-current="page">Physical Card Request</li>
@endsection
@section('title')
    Physical Card Request
@endsection
@push('css-page')
<style>
    .export-btn
    {
        float:right;
    }
    </style>
@endpush
@section('content')
<div class="col-xl-12">
    <div class="card">
        <div class="card-body table-border-style">
            <h5></h5>
            <button class="csv btn btn-sm btn-primary export-btn">{{__('Export')}}</button>
            <div class="table-responsive">
                <table class="table" id="pc-dt-export">
                    <thead>
                        <tr>
                            <th>{{__('Order ID')}}</th>
                            <th>{{__('Name')}}</th>
                            <th>{{__('Business Name')}}</th>
                            <th>{{__('Designation')}}</th>
                            <th>{{__('Order Date')}}</th>
                            <th>{{__('Comment')}}</th>
                            <th>{{__('Status')}}</th>
                            <th id="ignore">{{__('Action')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($card_request_deatails as $val)
                            <tr>
                                 <td>{{ strpad($val->id) }}</td>
                                <td>{{ getUserName($val->user_id); }}</td>
                                <td>{{ getBusinessName($val->business_id); }}</td>
                                <td>{{ $val->designation }}</td>
                                <td>{{ dmy($val->ordered_at) }}</td>
                                <td>{{ $val->comment }}</td>

                                @php
                                    $status =  getStatus($val->status);
                                    $st_class =  getStClass($val->status);
                                @endphp
                                <td><span class="badge bg-{{ $st_class }} p-2 px-3 rounded"  title="{{ ucFirst($status) }}" >{{ ucFirst($status) }}</span></td>
                                <div class="row float-end">
                                    <td class="d-flex">
            <div class="d-flex align-items-center justify-content-between justify-content-md-end" data-bs-placement="top" data-bs-toggle="tooltip" data-bs-original-title="Change Status">
            <a href="#" class="btn btn-sm btn-primary btn-icon m-1" data-bs-target="#exampleModal" data-url="{{ route('physical_card.action_popup',$val->id) }}"  data-url="" data-bs-whatever="Action" data-bs-toggle="modal">
                                                            <span class="text-white">
                                                                 Change Status</span>
                                                        </a>
                                                    </div>


                    <div class="d-flex align-items-center justify-content-between justify-content-md-end"
                    data-bs-placement="top" data-bs-toggle="tooltip" data-bs-original-title="View">
                    <a href="#" class="btn btn-sm btn-secondary btn-icon m-1" data-bs-target="#bigModal" 
                    data-url="{{ route('physical_card.action_view_card',$val->id) }}"
                    data-url="" data-bs-whatever="Action" data-bs-toggle="modal">
                    <span class="text-white">View</span></a></div>

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

<div class="modal fade" id="bigModal" tabindex="-1" role="dialog" aria-labelledby="bigModalLabel"
    aria-hidden="true">
    <div class="modal-dialog  modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="bigModalLabel"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body ddd">
                View Card
            </div>
        </div>
    </div>
</div>

@endsection

@push('custom-scripts')
<script src="https://rawgit.com/unconditional/jquery-table2excel/master/src/jquery.table2excel.js"></script>
<script>


                    var bigModal = document.getElementById('bigModal')
                    bigModal.addEventListener('show.bs.modal', function(event) {
                    // Button that triggered the modal
                    var button = event.relatedTarget
                    // Extract info from data-bs-* attributes
                    var recipient = button.getAttribute('data-bs-whatever')
                    var url = button.getAttribute('data-url')

                    var modalTitle = bigModal.querySelector('.modal-title')
                    var modalBodyInput = bigModal.querySelector('.modal-body input')
                    modalTitle.textContent = recipient
                    var size = button.getAttribute('data-size');
                    $("#bigModal .modal-dialog").addClass('modal-' + size);
                    $.ajax({
                        url: url,
                        success: function(data) {
                            $('#bigModal .modal-body').html(data);
                            $("#bigModal").modal('show');
                        },
                        error: function(data) {
                            data = data.responseJSON;
                            toastrs('Error', data.error, 'error')
                        }
                    });
                })
       
   const table = new simpleDatatables.DataTable("#pc-dt-export", {
        searchable: true,
        fixedheight: true,
        dom: 'Bfrtip',
    });

    $('.csv').on('click', function() {
        $('#ignore').remove();
        $("#pc-dt-export").table2excel({
            filename: "appointmentDetail"
        });
        setTimeout(function() {
            location.reload();
       }, 2000);
    });

</script>
@endpush
