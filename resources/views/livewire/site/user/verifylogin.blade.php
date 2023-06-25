
@section('title','تایید تلفن همراه')
<div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-cover bgi-attachment-fixed">
    <div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
        <div class="w-lg-600px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
            <!--begin::Form-->
            <form class="form w-100 mb-10" wire:submit.prevent='validatePhone'>
                <!--begin::Heading-->
                <div class="text-center mb-10">
                    <h1 class="text-dark mb-3">اعتبار سنجی دو مرحله ای</h1>
                    <div class="text-muted fw-bold fs-5 mb-5">ما یک کد فعال سازی به تلفن همراه زیر ارسال کردیم</div>
                    <div class="fw-bolder text-dark fs-3">{{ $user->phone }}</div>
                </div>
                <!--end::Heading-->

                <!--begin::Section-->
                <div class="mb-10 px-md-10">
                    <!--begin::Label-->
                    <div class="fw-bolder text-start text-dark fs-6 mb-1 ms-1">کد فعال سازی 4 رقمی خود را وارد کنید</div>
                    <!--end::Label-->
                    <!--begin::Input group-->
                    <div class="d-flex flex-wrap flex-stack">
                        <input type="password" class="form-control form-control-lg form-control-solid" id="password" wire:model.defer="password" />
                    </div>
                    <!--begin::Input group-->
                </div>
                <!--end::Section-->
                <!--begin::Submit-->
                <div class="d-flex flex-center">
                    <button type="submit" class="btn btn-lg btn-primary fw-bolder" id="login_form_submit">
                        <span class="indicator-label">ورود</span>
                        <span class="indicator-progress">لطفا چند لحظه صبر کنید ...
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                    </button>
                </div>
                <!--end::Submit-->
            </form>
            <!--end::Form-->
            <!--begin::Notice-->
            {{-- <div class="text-center fw-bold fs-5">
                <span class="text-muted me-1">کد را دریافت نکردید؟</span>
                <button id="resendCodeBtn" class="btn btn-color-primary fw-bolder fs-5 me-1" onclick="resendCode()" disabled>ارسال مجدد</a>
                <button type="button" id="timer" class="btn btn-flat-secondary w-100"><span>02:00</span></button>
            </div> --}}
            <!--end::Notice-->
        </div>
    </div>
</div>



