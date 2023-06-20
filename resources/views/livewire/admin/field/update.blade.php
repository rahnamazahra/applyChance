<button data-bs-toggle="modal" data-bs-target="#FieldUpdateModal" wire:click="editField({{ $field->id }})"  class="btn btn-icon btn-bg-light btn-active-color-success btn-sm me-1" data-bs-toggle="tooltip" data-bs-placement="bottom" title="ویرایش">
    <span class="svg-icon svg-icon-3">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
            <path opacity="0.3"d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="currentColor"></path>
            <path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z"fill="currentColor"></path>
        </svg>
    </span>
</button>
<!--begin::Modal-->
<div wire:ignore.self class="modal fade" id="FieldUpdateModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <div class="modal-content rounded">
            <div class="modal-header pb-0 border-0 justify-content-between">
                <h5 class="modal-title">اطلاعات را وارد نمایید</h5>
                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
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
                        <div wire:ignore>
                            <div class="form-group">
                                <div class="input-group">
                                    <label for="category_id" class="required d-flex align-items-center fs-6 fw-bold mb-2">نام دپارتمان </label>
                                    <select class="form-select form-select-solid" wire:model.defer="category_id" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                        <option value=""></option>
                                        @foreach($categories as $title=>$id)
                                            <option value="{{ $id }}">{{ $title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 fv-row">
                        <label for="title" class="required d-flex align-items-center fs-6 fw-bold mb-2">رشته تحصیلی</label>
                        <input type="text" class="form-control form-control-solid" wire:model.defer="title"/>
                    </div>
                    <div class="col-md-12 fv-row">
                        <label for="slug" class="required d-flex align-items-center fs-6 fw-bold mb-2">رشته تحصیلی لاتین</label>
                        <input type="text" class="form-control form-control-solid" wire:model.defer="slug"/>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" wire:click.prevent="updateField()" class="btn btn-primary" data-bs-dismiss="modal">ذخیره</button>
                    <button type="button" wire:click.prevent="cancelField()" class="btn btn-light"   data-bs-dismiss="modal">انصراف</button>
                </div>
        </form>
        </div>
    </div>
</div>
<!--end::Modal-->



