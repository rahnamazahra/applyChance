<button wire:click="actionMode()" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#CountryCreateModal">جدید +</button>
<!--begin::Modal-->
<div wire:ignore.self class="modal fade" id="CountryCreateModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <div class="modal-content rounded">
            <div class="modal-header pb-0 border-0 justify-content-between">
                <h5 class="modal-title">اطلاعات را وارد نمایید</h5>
                <!--begin::Close-->
                <div wire:click.prevent="cancelCountry()" class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                    <span class="svg-icon svg-icon-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor" />
                        </svg>
                    </span>
                </div>
                <!--end::Close-->
            </div>
            <form>
            <div class="modal-body">
                <div class="col-md-12 fv-row">
                    <label for="title" class="required d-flex align-items-center fs-6 fw-bold mb-2">نام فارسی کشور</label>
                    <input type="text" class="form-control form-control-solid" wire:model.defer="title"/>
                </div>
                <div class="col-md-12 fv-row">
                    <label for="slug"  class="required d-flex align-items-center fs-6 fw-bold mb-2">نام لاتین کشور</label>
                    <input type="text" class="form-control form-control-solid" wire:model.defer="slug"/>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click.prevent="createCountry()" class="btn btn-primary" data-bs-dismiss="modal">ذخیره</button>
                <button type="button" wire:click.prevent="cancelCountry()" class="btn btn-light" data-bs-dismiss="modal">انصراف</button>
            </div>
        </form>
        </div>
    </div>
</div>
<!--end::Modal-->



