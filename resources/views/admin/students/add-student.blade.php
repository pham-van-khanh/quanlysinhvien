<div class="modal fade modal-bookmark" id="create-bookmark" tabindex="-1" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">@lang('welcome.act-create') @lang('welcome.student')</h5>
            </div>
            <div class="modal-body">
                {{ Form::model($student, ['method' => 'POST']) }}
                <div class="form-row">
                    <div class="form-group col-md-12">
                        {!!Form::label('', __('welcome.col-name'))!!}
                        {!!Form::text('name', '',['class' => 'form-control' ,'id' => 'name_student','placeholder' => __('welcome.col-name')])!!}
                        <div class="invalid-feedback validate-name"></div>
                    </div>
                    <div class="form-group col-md-12">
                        {!!Form::label('', __('welcome.col-email'))!!}
                        {!!Form::email('email', '',['class' => 'form-control' ,'id' => 'email_student','placeholder' => __('welcome.col-email')])!!}
                        <div class="invalid-feedback validate-email"></div>
                    </div>
                    <div class="form-group col-md-12">
                        {!!Form::label('', __('welcome.col-phone'))!!}
                        {!!Form::text('phone', '',['class' => 'form-control' ,'id' => 'phone_student','placeholder' => __('welcome.col-phone')])!!}
                        <div class="invalid-feedback validate-phone"></div>
                    </div>
                    <div class="form-group col-md-12">
                        {!!Form::label('', __('welcome.col-birthday'))!!}
                        {!!Form::date('birthday', '',['class' => 'form-control' ,'id' => 'birthday_student','placeholder' => __('welcome.col-birthday')])!!}
                        <div class="invalid-feedback validate-birthday"></div>
                    </div>
                    <div class="form-group col-md-12">
                        {!!Form::label('', __('welcome.col-address'))!!}
                        {!!Form::text('address', '',['class' => 'form-control' ,'id' => 'address_student','placeholder' => __('welcome.col-address')])!!}
                        <div class="invalid-feedback validate-address"></div>
                    </div>
                    <div class="form-group col-md-12">
                        {{ Form::label('', __('welcome.col-gender'), ['class' => 'col-form-label pt-0']) }}
                        <div class="form-group m-t-15 m-checkbox-inline mb-0 custom-radio-ml">
                            <div class="radio radio-primary">
                                {{Form::radio('gender', '0', true, ['class' => 'form-check-input', 'id' => 'radioinline11'])}}
                                {{ Form::label('radioinline11', __('welcome.row-male'), ['class' => 'mb-0']) }}
                            </div>
                            <div class="radio radio-primary">
                                {{Form::radio('gender', '1', false, ['class' => 'form-check-input', 'id' => 'radioinline22'])}}
                                {{ Form::label('radioinline22', __('welcome.row-female'), ['class' => 'mb-0']) }}
                            </div>
                            <div class="invalid-feedback validate-gender"></div>
                        </div>
                    </div>
                </div>
                <br>
                {!! Form::submit(__('welcome.act-submit'), ['class' => 'btn btn-secondary','id' => 'saveCreateForm'])!!}
                {!! Form::button(__('welcome.act-close'), ['class' => 'btn btn-primary', 'data-bs-dismiss' => 'modal'])!!}
                {!! Form::close() !!}
            </div>
            {!!Form::hidden('student_id', '',['id' => 'student_id'])!!}
            {!!Form::hidden('user_id', '',['id' => 'user_id'])!!}
        </div>
    </div>
</div>
