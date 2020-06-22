<div class="panel-heading">
    @if (isset($lesson))
    <h5 class="panel-title">Edit Lesson: {{$lesson->name}} </h5>
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
        <label class="control-label col-lg-2">Lesson Name: </label>
            <div class="col-lg-10">
                <div class="input-group">
                <span class="input-group-addon"><i class="icon-menu6"></i></span>
                {!! Form::text('name',null,['class'=>'form-control','placeholder'=>'Type Lesson Name']) !!}
            </div>
        </div>
    </div><br>
<div class="form-group">
    <label class="control-label col-md-2">URL</label>
    <div class="col-md-10">
        <div class="input-group">
        <span class="input-group-addon"><i class="icon-link"></i></span>
{!! Form::url('url', null, ['class'=>'form-control']) !!}
        </div>
    </div>
</div><br>

<div class="form-group">
    <label class="control-label col-md-2">Time</label>
    <div class="col-md-10">
{!! Form::time('duration', null, ['class'=>'form-control']) !!}
    </div>
</div><br>

<div class="form-group">
    <label class="control-label col-lg-2">Course Lesson: </label>
    <div class="col-lg-10">
{!! Form::select('course_id', courseId(),null, ['class'=>'form-control','placeholder'=>'Select Course Lesson']) !!}
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
