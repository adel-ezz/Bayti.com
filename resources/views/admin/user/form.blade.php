
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">


                            <div class="col-md-12">
                                <input id="name" type="text" placeholder="name" class="form-control" name="name" value="{{  isset($user) ? $user->name : '' }}" required autofocus>
                                {{--{!! Form::type("name",value,['class'=> 'form-control','placeholder'=>'Name',.....] ) !!}--}}
                                {{--{!! Form::text("name",null,['class'=> 'form-control','placeholder'=>'Name'] ) !!}--}}

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>



                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">


                            <div class="col-md-12">
                                <input id="email" placeholder="email" type="email" class="form-control" name="email" value="{{  isset($user) ? $user->email : '' }}" required>
                                {{--{!! Form::email("email",null,['class'=> 'form-control','placeholder'=>'Email'] ) !!}--}}
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        @if(!isset($showforuser))
                        <div class="form-group{{ $errors->has('admin') ? ' has-error' : '' }}">
                            <div class="col-md-12">


                                {!! Form::select("admin", ['0'=>'عضو' , '1'=>'مدير'],null ,['class' => 'form-control']) !!}
                                @if ($errors->has('admin'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('admin') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        @endif
                        @if(!isset($user))

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" value="" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>
                        @endif




                        {{--for Example--}}
                        {{--<input type="text" value="{{  isset($user) ? $user->name : '' }}">--}}

