@section('title','ورود')
<div class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-cover bgi-attachment-fixed">
    <div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
        <div class="w-lg-500px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
            <!--begin::Form-->
            <form class="form w-100" wire:submit.prevent='LoginForm'>

                <div class="text-center mb-10">
                    <!--begin::Title-->
                    <h1 class="text-dark mb-3">ورود</h1>
                    <!--end::Title-->
                </div>
                <!--begin::Heading-->

                <!--begin::Input group-->
                <div class="fv-row mb-10">
                    <label class="form-label fs-6 fw-bolder text-dark">تلفن همراه</label>
                    <input class="form-control form-control-lg form-control-solid" type="tel" wire:model.defer="phone"/>
                </div>
                <!--end::Input group-->
                <!--begin::Actions-->
                <div class="text-center">
                    <!--begin::Submit button-->
                    <button type="submit" id="kt_sign_in_submit" class="btn btn-lg btn-primary w-100 mb-5">
                        <span class="indicator-label">ادامه</span>
                        <span class="indicator-progress">لطفا چند لحظه صبر کنید ...
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                        </span>
                    </button>
                    <!--end::Submit button-->
                </div>
                <!--end::Actions-->
            </form>
            <!--end::Form-->
        </div>
        <!--end::Wrapper-->
    </div>
    <!--end::Content-->
</div>
