   <div class="panel-heading">
        @if (isset($course))
        <h5 class="panel-title">Edit Course: {{$course->name}} </h5>
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
                    <label class="control-label col-lg-2">Course Name: </label>
                    <div class="col-lg-10">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="icon-insert-template"></i></span>
                            {!! Form::text('name',null,['class'=>'form-control','placeholder'=>'Type Course Name']) !!}
                        </div>
                    </div>
                </div><br>
                <div class="form-group">
                    <label class="control-label col-lg-2">Category: </label>
                    <div class="col-lg-10">
                     {!! Form::select('category_id', categoryId(), null, ['class'=>'form-control','placeholder'=>'Select Category']) !!}
                </div>
                </div><br>
            <div class="form-group">
                <label class="control-label col-lg-2">Course Picture: </label>
                <div class="col-lg-10">
@if (isset($course))
@if($course->image != null)
<div class="media-left">
   <a href="#"><img src="{{getimg($course->image)}}"
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
            </div><br>
            <div class="form-group">
                <label class="control-label col-lg-2">Course Price:</label>
                <div class="col-lg-10">
                    <div class="input-group">
                        <span class="input-group-addon">$</span>
                        {!! Form::text('price',null, ['class'=>'form-control', 'placeholder'=>'Type course price']) !!}
                        <span class="input-group-addon">.00</span>
                    </div>
                </div>
            </div><br>
            <div class="form-group">
                <label class="control-label col-lg-2">Short Description</label>
                <div class="col-lg-10">
                    {{ Form::textarea('short_description', null, array('class' =>'form-control', 'cols' => 3, 'rows' =>3, 'placeholder' => 'Type a description here...'))}}
                </div>
            </div><br>
            <div class="form-group">
                <label class="control-label col-lg-2">Full Description</label>
                <div class="col-lg-10">
                    {{ Form::textarea('long_description', null, array('class' =>'form-control', 'cols' => 5, 'rows' =>5, 'placeholder' => 'Type the full description here...'))}}
                </div>
            </div>
<br><br><br><br>
<div class="form-group">
    <div class="text-left">
        <button type="submit" class="btn bg-teal-400">Save Changes <i class="icon-arrow-right14 position-right"></i></button>
    </div>
</div>
</fieldset>
</div>
