@extends('frontend.dashboard.user_dashboard')
@section('home')

<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="edit-profile" role="tabpanel" aria-labelledby="edit-profile-tab">
        <div class="setting-body">
            <h3 class="fs-17 font-weight-semi-bold pb-4">Change Password</h3>
            <form method="post" action="{{route('user.profile.update')}}" enctype="multipart/form-data" class="row pt-40px">
                @csrf
                <div class="input-box col-lg-12">
                    <label class="label-text">Old Password</label>
                    <div class="form-group">
                        <input class="form-control form--control" type="password" name="username" value="{{$profileData->username}}">
                        <span class="la la-user input-icon"></span>
                    </div>
                </div><!-- end input-box -->
                <div class="input-box col-lg-12">
                    <label class="label-text">New Password</label>
                    <div class="form-group">
                        <input class="form-control form--control" type="password" name="address" value="{{$profileData->address}}">
                        <span class="la la-user input-icon"></span>
                    </div>
                </div><!-- end input-box -->
                <div class="input-box col-lg-12">
                    <label class="label-text">Comfirm New Password</label>
                    <div class="form-group">
                        <input class="form-control form--control" type="password" name="password" value="{{$profileData->phone}}">
                        <span class="la la-phone input-icon"></span>
                    </div>
                </div><!-- end input-box -->
                <div class="input-box col-lg-12 py-2">
                    <button class="btn theme-btn">Update</button>
                </div><!-- end input-box -->
            </form>
        </div><!-- end setting-body -->
    </div><!-- end tab-pane -->
</div><!-- end tab-content -->
@endsection