@extends('backend.adm_master')


@section('content')

    <div class="page-title">
        <div>
            <h1><i class="fa fa-edit"></i> Form Components</h1>
            <p>Bootstrap default form components</p>
        </div>
        <div>
            <ul class="breadcrumb">
                <li><i class="fa fa-home fa-lg"></i></li>
                <li>Forms</li>
                <li><a href="#">Create Users</a></li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="row">
                    <div class="col-lg-6 col-md-offset-2">
                        <div class="well bs-component">
                            <form class="form-horizontal"  id="forma_edit" action="{{route('users.update',$user->id)}}" method="POST">
                                {{ csrf_field() }}
       >
                                <input type='hidden' name='_method' value='PUT'>
                                <fieldset>
                                    <legend>Edit Users</legend>
                                    <div class="form-group">
                                        <label class="col-lg-2 control-label" for="inputEmail">Name</label>
                                        <div class="col-lg-10">
                                            <input class="form-control" name="name" id="name" type="text" value="{{$user->name}}">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-lg-2 control-label" for="inputEmail">Email</label>
                                        <div class="col-lg-10">

                                            <input class="form-control" name="email" id="email" value="{{$user->email}}" type="text" placeholder="Email">

                                        </div>
                                    </div>


                                    <div class="clearfix"></div>

                                    <label class="animated-checkbox" style="margin-left:20%;">
                                        <input type="checkbox" id="check" name="check" value="no"><span class="label-text">Change Password</span>
                                    </label>
                                    <div class="clearfix"></div>

                                    <br>

                                    <div class="clearfix"></div>
                                    <div class="form-group" id="pass_hide" style="display:none">
                                        <label class="col-lg-2 control-label" for="inputPassword">Password</label>
                                        <div class="col-lg-10" >
                                            <input class="form-control" id="inputPassword" type="password" name="password" placeholder="Password">


                                        </div>
                                    </div>

                                    <div class="form-group" id="pass2_hide" style="display:none">
                                        <label class="col-lg-2 control-label" for="inputPassword">Password Confirm</label>
                                        <div class="col-lg-10" >
                                            <input class="form-control" name="password_confirmation" id="inputPassword" type="password" placeholder="Password">


                                        </div>
                                    </div>

                                    <div class="form-group" style="margin-top:10px;">
                                        <div class="col-lg-10 col-lg-offset-2">
                                            <button class="btn btn-default" type="reset">Cancel</button>
                                            <input class="btn btn-primary" type="submit" id="submit" value="Submit">
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-offset-2 load"></div><br>
                                    <div class="col-12 col-md-offset-2  edit_alert " style="color:white;padding:10px;">
                                        <ul>


                                        </ul>
                                    </div>
                                    <div class="col-12 col-md-offset-2  alert alert-success suk" style="color:white;padding:10px;display:none;">
sukses
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')

    @include('backend.pages.js_files.edit_users_js')

@endsection