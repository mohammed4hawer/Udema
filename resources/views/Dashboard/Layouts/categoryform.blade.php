<div class="panel-heading">
        @if (isset($category))
        <h5 class="panel-title">Edit Category: {{$category->name}} </h5>
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
            <label class="control-label col-lg-2">Category Name: </label>
                <div class="col-lg-10">
                    <div class="input-group">
                    <span class="input-group-addon"><i class="icon-comment"></i></span>
                            {!! Form::text('name',null,['class'=>'form-control','placeholder'=>'Type Category Name']) !!}
                </div>
            </div>
        </div>
            <div class="form-group">
                <label class="control-label col-lg-2">Category Picture: </label>
                <div class="col-lg-10">
@if (isset($category))
@if($category->image != null)
<div class="media-left">
   <a href="#"><img src="{{getimage($category->image)}}"
                     style="width: 58px; height: 58px; border-radius: 2px;" alt=""></a>
</div>
@endif
@endif
                    <div class="uploader">
                        {!! Form::file('image', ['class'=>'file-styled','aria-required'=>true]) !!}
                        <span class="filename" style="user-select: none;">No file selected</span><span class="action btn bg-blue" style="user-select: none;">Choose File</span>
                    </div>
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
