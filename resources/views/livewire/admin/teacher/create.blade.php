<button wire:click="actionMode()" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#TeacherCreateModal">جدید +</button>
<!--begin::Modal-->
<div wire:ignore.self class="modal fade" id="TeacherCreateModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <div class="modal-content rounded">
            <div class="modal-header pb-0 border-0 justify-content-between">
                <h5 class="modal-title">اطلاعات را وارد نمایید</h5>
                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                    <span class="svg-icon svg-icon-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opaTeacher="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor" />
                        </svg>
                    </span>
                </div>
                <!--end::Close-->
            </div>
            <form>
                <div class="modal-body">
                    <div class="col-md-12 fv-row">
                        <div wire:ignore>
                            <div class="form-group">
                                <div class="input-group">
                                    <label for="field_id" class="required d-flex align-items-center fs-6 fw-bold mb-2">رشته</label>
                                    <select class="form-select form-select-solid" wire:model.defer="field_id" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                        <option value="">یک رشته را انتخاب کنید</option>
                                        @foreach($fields as $title=>$id)
                                            <option value="{{ $id }}">{{ $title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 fv-row">
                        <label for="name" class="required d-flex align-items-center fs-6 fw-bold mb-2">نام</label>
                        <input type="text" class="form-control form-control-solid" wire:model.defer="name"/>
                    </div>
                    <div class="col-md-12 fv-row">
                        <label for="email"  class="required d-flex align-items-center fs-6 fw-bold mb-2">ایمیل</label>
                        <input type="email" class="form-control form-control-solid" wire:model.defer="email"/>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" wire:click.prevent="createTeacher()" class="btn btn-primary" data-bs-dismiss="modal">ذخیره</button>
                    <button type="button" wire:click.prevent="cancelTeacher()" class="btn btn-light"   data-bs-dismiss="modal">انصراف</button>
                </div>
        </form>
        </div>
    </div>
</div>
<!--end::Modal-->



