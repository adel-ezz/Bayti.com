<div class="form-group clearfix">
    <div class="col-md-10">


            <input type="text" class="form-control" name="contact_name"
                   value="{{ isset($contact)? $contact->contact_name : '' }}" required>
    </div>
    <div class="col-md-2">
        <label for="password-confirm" class=" control-label">
            إسم المرسل
        </label>
    </div>
</div>
<div class="form-group clearfix">
    <div class="col-md-10">


        <input type="email" class="form-control" name="contact_email"
               value="{{ isset($contact)? $contact->contact_email : '' }}" >
    </div>
    <div class="col-md-2">
        <label for="password-confirm" class=" control-label">
            الإيميل
        </label>
    </div>
</div>
<div class="form-group clearfix">
    <div class="col-md-10">


        <input type="text" class="form-control" name="contact_subject"
               value="" >
    </div>
    <div class="col-md-2">
        <label for="password-confirm" class=" control-label">
            عنوان الرسالة
        </label>
    </div>
</div>
<div class="form-group clearfix">
    <div class="col-md-10">


        <textarea  class="form-control" name="contact_message"
                  >{{ isset($contact)? $contact->contact_message : '' }}</textarea>
    </div>
    <div class="col-md-2">
        <label for="password-confirm" class=" control-label">
       الرسالة
        </label>
    </div>
</div>
<div class="form-group clearfix">
<div class="col-md-10">


    {!! Form::select('contact_type',contact(),null,['class'=>'form-control']) !!}
</div>
<div class="col-md-2">
    <label for="password-confirm" class=" control-label">
      نوع الرسالة
    </label>
</div>
</div>



