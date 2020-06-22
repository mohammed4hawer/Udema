
    <div class="panel-heading">
        @if (isset($user))
        <h5 class="panel-title">Edit User: {{$user->name}} </h5>
        @else
        <h5 class="panel-title">Fill this form please: </h5>
        @endif

        <div class="heading-elements">
            <ul class="icons-list">
                <li><a data-action="collapse"></a></li>
                <li><a data-action="reload"></a></li>
                <li><a data-action="close"></a></li>
            </ul>
        </div>
    </div>
<div class="panel-body">

            <fieldset class="content-group">

                <div class="form-group">
                    <label class="control-label col-lg-2">Your Name: </label>
                    <div class="col-lg-10">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="icon-user"></i></span>
                            {!! Form::text('name',null,['class'=>'form-control','placeholder'=>'Type Your Name']) !!}
                            {{-- <input type="text" class="form-control" placeholder="Type Your Name" name="name" value="{{isset($user)?$user->name:''}}"> --}}
                        </div>
                    </div>
                </div><br><br>
                <div class="form-group">
                    <label class="control-label col-lg-2">Your E-mail: </label>
                    <div class="col-lg-10">
                        <div class="input-group">
                            <span class="input-group-addon">@</span>
                            {{-- <input type="text" class="form-control" placeholder="example@info.com" name="email"> --}}
                        {!! Form::email('email',null,['class'=>'form-control','placeholder'=>'example@info.com']) !!}
                        </div>
                    </div>
                </div><br><br>
                <div class="form-group">
                    <label class="control-label col-lg-2">Phone: </label>
                    <div class="col-lg-10">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fas fa-mobile-alt"></i></span>
                    {{-- <input type="text" class="form-control" data-mask="(999) 999-9999" placeholder="Enter your phone #" name="phone"> --}}
                    {!! Form::tel('phone',null,['class'=>'form-control','placeholder'=>'Enter your Phone #','data-mask'=>'(999) 999-9999']) !!}
                    </div>
                </div>
                </div><br><br>
                <div class="form-group">
                    <label class="control-label col-lg-2">Your password:</label>
                    <div class="col-lg-10">
                    <div class="input-group">
                    <span class="input-group-addon"><i class="fas fa-key"></i></span>
                    {{-- <input type="password" class="form-control" placeholder="Your strong password" name="password"> --}}
                    {!! Form::password('password',['class'=>'form-control','placeholder'=>'Your strong password']) !!}
                </div>
            </div>
            </div><br><br>
            <div class="form-group">
                <label class="control-label col-lg-2">Repeat Your password:</label>
                <div class="col-lg-10">
                <div class="input-group">
                <span class="input-group-addon"><i class="fas fa-key"></i></span>
                {!! Form::password('password_confirmation',['class'=>'form-control','placeholder'=>'Retype your password']) !!}
            </div>
        </div>
        </div><br><br>
            <div class="form-group">
                <label class="control-label col-lg-2">Your Picture: </label>
                <div class="col-lg-10">
@if (isset($user))
@if($user->image != null)
<div class="media-left">
   <a href="#"><img src="{{getimg($user->image)}}"
                     style="width: 58px; height: 58px; border-radius: 2px;" alt=""></a>
</div>
@endif
@endif
                    <div class="uploader">
                        {{-- <input type="file" name="styled_file image" class="file-styled" required="required" aria-required="true">--}}
                        {!! Form::file('image', ['class'=>'file-styled','aria-required'=>true]) !!}
                        <span class="filename" style="user-select: none;">No file selected</span><span class="action btn bg-blue" style="user-select: none;">Choose File</span>
                        {{-- <span class="help-block">Extension : gif, png, jpg , jpeg</span> --}}
                    </div>
                </div>
            </div><br><br>
            <div class="form-group">
                <label class="control-label col-lg-2">Active Status: </label>
                <div class="col-lg-10">
                 {!! Form::select('is_active', statusArray(), null, ['class'=>'form-control','placeholder'=>'Select User Status']) !!}
                {{-- <select class="selectbox form-control" name="is_active">
                    <option value="1">Active</option>
                    <option value="0">Suspended</option>
                </select> --}}
            </div>
            </div><br><br>
            <div class="form-group">
                <label class="control-label col-lg-2">Access Role: </label>
                <div class="col-lg-10">
                 {!! Form::select('role', userRoles(), null, ['class'=>'form-control', 'placeholder'=>'Select User Role']) !!}
            </div>
            </div>
<br><br>
<div class="form-group">
    <div class="text-left">
        <button type="submit" class="btn bg-teal-400">Save Changes <i class="icon-arrow-right14 position-right"></i></button>
    </div>
</div>
</fieldset>
</div>
