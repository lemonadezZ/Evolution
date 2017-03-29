@extends('layouts.auth')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{__('auth.Register')}}</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">{{__('auth.Name')}}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">{{__('auth.E-Mail Address')}}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">{{__('auth.Password')}}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">{{__('auth.Confirm Password')}}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">{{__('auth.Invitation code')}}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="invitation_code" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="captcha" class="col-md-4 control-label">{{__('auth.Verification code')}}</label>

                            <div class="col-md-3">
                                <input id="captcha" type="text" class="form-control" name="captcha" required>
                            </div>
                             <div class="col-md-3">
                                <a href="javascript:;" class="" onclick="document.getElementById('captcha_img').src='/captcha?t='+new Date().getTime()"><img src="/captcha" width="100%" id="captcha_img"/></a>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">{{__('auth.Phone')}}</label>

                            <div class="col-md-3">
                                <input id="phone" type="text" class="form-control" name="phone" required>
                            </div>
                            <div class="col-md-3">
                                <a  id="getSMScode" class="btn btn-primary">{{__('auth.getSMS code')}}</a>
                            </div>
                        </div>
                        <script type="text/javascript">
                            $(function(){
                                    $('#getSMScode').click(function(){
                                        //TODO AJAX
                                        var _this=$(this);
                                        var _int=10;
                                        var _captcha=$('#captcha').val();
                                        var _phone=$('#phone').val();
                                        if(_captcha=="" ){
                                            alert('验证码不能为空');
                                            return false;
                                        }
                                        if( _phone==""){
                                            alert('电话号码不能为空');
                                            return false;
                                        }
                                        _this.addClass('disabled')
                                        $.get('/sendSMScode/'+_phone+'/'+_captcha,{},function(){
                                            
                                                var _timer= setInterval(function(){
                                                    _int--;
                                                    _this.text("验证码已经发送,请注意查收("+_int+")")
                                                    if(_int<=0){
                                                        clearInterval(_timer)
                                                         _this.removeClass('disabled')
                                                        _this.text("重新发送验证短信")
                                                    }
                                                },1000)
                                        },'json').done(function(){
                                            console.log('done');
                                        }).fail(function(){
                                            _this.removeClass('disabled')
                                            _this.text("重新发送验证短信")
                                        }).always(function(){

                                        })
                                      
                                    })
                            })
                        </script>



                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">{{__('auth.SMS code')}}</label>
                            <div class="col-md-2">
                                <input id="password-confirm" type="password" class="form-control" name="" required>
                            </div>
                        </div> 

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    {{__('auth.Register')}}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
