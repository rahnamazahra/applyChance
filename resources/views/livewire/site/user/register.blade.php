@section('title','ثبت نام')
<div>
    <div id="main">
        <div class="col-lg-4 col-md-6 col-xs-12 mx-auto">
            <div class="account-box">
                <a href="{{ route('home') }}" class="logo-account"><img src="" alt="logo"></a>
                <span class="account-head-line" style="text-align:center">ثبت نام</span>
                <div class="content-account">
                    <form id="register" wire:submit.prevent='RegisterForm' novalidate="novalidate">
                        <hr>
                        <label for="name">نام و نام خانوادگی:</label>
                        <input type="text" id="name" required wire:model.defer="name" class="input-email-account" style="text-align:right">
                        <label for="phone">شماره موبایل:</label>
                        <input type="text" required id="phone" wire:model.defer="phone" class="input-email-account" placeholder="">

                        <div class="parent-btn">
                            <button class="dk-btn dk-btn-info" type="submit">
                                ثبت نام
                                <i class="mdi mdi-account-plus-outline sign-in"></i>
                            </button>
                        </div>
                        <div class="form-auth-row">
                            <label for="remember" class="ui-checkbox">
                                <input type="checkbox" value="1" name="login" checked="" id="remember">
                                <span class="ui-checkbox-check"></span>
                            </label>
                        </div>
                    </form>
                </div>

                <div class="account-footer">
                    <span>قبلا ثبت نام کرده‌اید؟</span>
                    <a href="{{ route('login') }}" class="btn-link-register">وارد شویــد</a>
                </div>
            </div>
        </div>
    </div>
</div>
