@extends('layouts.admin')
@php 
    $profile=\App\Models\Utility::get_file('uploads/avatar/');
@endphp
@section('page-title')
   {{__('Manage Users')}}
@endsection
@section('title')
   {{__('Manage Users')}}
@endsection
@section('action-btn')
@can('create user')
    <div class="col-xl-12 col-lg-12 col-md-12 d-flex align-items-center justify-content-between justify-content-md-end" data-bs-placement="top" >  
        <a href="#" data-size="md" data-url="{{ route('users.create') }}" data-ajax-popup="true" data-bs-toggle="tooltip" title="{{__('Create')}}" data-title="{{__('Create New User')}}" class="btn btn-sm btn-primary">
            <i class="ti ti-plus"></i>
        </a>
        @if(Auth::user()->type == 'company')
        <a href="{{ route('userlogs.index') }}" class="btn btn-sm btn-primary btn-icon m-1"
            data-size="lg" data-bs-whatever="{{ __('UserlogDetail') }}"> <span
                class="text-white">
                <i class="ti ti-user" data-bs-toggle="tooltip" data-bs-original-title="{{ __('Userlog Detail') }}"></i></span>
        </a>
    @endif
    </div>
@endcan
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item active" aria-current="page">{{__('User')}}</li>
@endsection
@section('content') 
<div class="row"> 

     <form class="row mt-4 mb-2  justify-content-md-end"   method="GET">
        
        <div class="col-xl-1 col-md-2">
            <button type="submit" class="btn btn-primary btm-lg mt-2"> <i class="fa fa-search"></i> Search </button>
        </div>
        <div class="col-xl-2 col-md-3">
            <div class="form-floating">
                <select class="form-select" name="filter"  id="floatingSelect" aria-label="Floating label select example">
                  <option selected value="">Select Date Ranger</option>
                  <option value="t">Today</option>
                  <option value="y">Yesterday</option>
                  <option value="7d">Last 7 Days</option>
                  <option value="30d">This 30 Days</option>
                </select>
                <label for="floatingSelect">Works with selects</label>
            </div>
        </div>  
    </form> 

    {{-- <form class="row mt-4 mb-2"   method="GET">
        <div class="col-auto">
            <div class="form-floating mb-3">
                <input type="email" class="form-control" id="floatingInput" name="filter" placeholder="name@example.com">
                <label for="floatingInput">Email address</label>
              </div>
        </div>  
        <div class="col-auto">
            <button type="submit" class="btn btn-primary btm-lg mt-2"> <i class="fa fa-search"></i> Search </button>
        </div>
    </form>  --}}

    <table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Mo.</th>
            @if(\Auth::user()->type == 'super admin')
                <th scope="col">Plan</th>
                <th scope="col">Plan Exp.</th>
                <th scope="col">Business</th>
                <th scope="col">Appointments</th> 
            @endif
            <th scope="col">Reg. Date</th>
            <th scope="col">Action</th>
        </tr>
     </thead>
     <tbody>
    @foreach ($users as $user)
        <tr>
            <td scope="row">{{ $user->id }}</td>
            <td>
                <a href="{{(!empty($user->avatar))? asset(Storage::url('uploads/avatar/'.$user->avatar)): asset(Storage::url("uploads/avatar/avatar.png"))}}" target="_blank">
                 <img src="{{(!empty($user->avatar))? asset(Storage::url('uploads/avatar/'.$user->avatar)): asset(Storage::url("uploads/avatar/avatar.png"))}}" class="rounded-circle img_users_fix_size">
               </a>
               {{ $user->name }}
            </td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->country_code }}-{{ $user->contact }}</td>
            @if(\Auth::user()->type == 'super admin')
                <td>{{!empty($user->currentPlan)?$user->currentPlan->name:''}} </td> 
                <td>{{__('Plan Expired : ') }} {{!empty($user->plan_expire_date) ? \Auth::user()->dateFormat($user->plan_expire_date): __('Lifetime')}}</td>
                <td>{{$user->totalBusiness($user->id)}}</td>
                <td>{{$user->getTotalAppoinments()}}</td>
                <td>{{$user->created_at}}</td>
                <td>
                    <button type="button" class="btn"
                        data-bs-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        <i class="feather icon-more-vertical"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end">
                        @can('edit user')
                            <a href="#" class="dropdown-item user-drop" data-url="{{ route('users.edit',$user->id) }}" data-ajax-popup="true" data-title="{{__('Update User')}}"><i class="ti ti-edit"></i><span class="ml-2">{{__('Edit')}}</span></a>
                        @endcan
                        <a href="#" data-url="{{ route('plan.upgrade',$user->id) }}" class="dropdown-item user-drop" data-size="lg" data-ajax-popup="true" data-title="{{__('Upgrade Plan')}}"><i class="ti ti-upload"></i> <span class="ml-2"> {{__('Upgrade Plan')}} </span> </a>   
                        @can('change password account')
                            <a href="#" class="dropdown-item user-drop" data-ajax-popup="true" data-title="{{__('Reset Password')}}" data-url="{{route('user.reset',\Crypt::encrypt($user->id))}}"><i class="ti ti-key"></i>
                            <span class="ml-2">{{__('Reset Password')}}</span></a>  
                        @endcan
                        @can('delete user')
                            <a href="#" class="bs-pass-para dropdown-item user-drop"  data-confirm="{{__('Are You Sure?')}}" data-text="{{__('This action can not be undone. Do you want to continue?')}}" data-confirm-yes="delete-form-{{$user->id}}" title="{{__('Delete')}}" data-bs-toggle="tooltip" data-bs-placement="top"><i class="ti ti-trash"></i><span class="ml-2">{{__('Delete')}}</span></a>
                                {!! Form::open(['method' => 'DELETE', 'route' => ['users.destroy', $user->id],'id'=>'delete-form-'.$user->id]) !!}
                                {!! Form::close() !!} 
                        @endcan 
                        @if(\Auth::user()->type == 'company')
                            <a href="{{ route('userlogs.index', ['month'=>'','user'=>$user->id]) }}"
                                class="dropdown-item user-drop"
                                data-bs-toggle="tooltip"
                                data-bs-original-title="{{ __('User Log') }}"> 
                                <i class="ti ti-history"></i>
                                <span class="ml-2">{{__('Logged Details')}}</span></a>
                        @endif
                    </div> 
                </td>
                @endif 
        </tr> 
    @endforeach  
    </tbody>
</table> 

  {{ $users->appends(request()->input())->links('pagination::bootstrap-5') }} 
</div>
@endsection 
