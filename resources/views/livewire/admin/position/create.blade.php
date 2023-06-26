<button wire:click="actionMode()" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#PositionCreateModal">جدید +</button>
<!--begin::Modal-->
<div wire:ignore.self class="modal fade" id="PositionCreateModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <div class="modal-content rounded">
            <div class="modal-header pb-0 border-0 justify-content-between">
                <h5 class="modal-title">اطلاعات را وارد نمایید</h5>
                <!--begin::Close-->
                <div wire:click.prevent="cancelPosition()" class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                    <span class="svg-icon svg-icon-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor" />
                        </svg>
                    </span>
                </div>
                <!--end::Close-->
            </div>
            <form wire:submit.prevent="createPosition()">
            <div class="modal-body">
                <div class="col-md-12 fv-row">
                    <div>
                        <div class="form-group">
                            <div class="input-group">
                                <label for="univercity_id" class="required d-flex align-items-center fs-6 fw-bold mb-2">نام دانشگاه </label>
                                <select class="form-select form-select-solid" wire:model="univercity_id" name="univercity_id" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                    <option value="" selected>دانشگاه مورد نظر را انتخاب نمایید</option>
                                    @foreach($univercities as $uni)
                                        <option value="{{ $uni->id }}">{{ $uni->title }}({{ $uni->slug }})</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 fv-row">
                    <div>
                        <div class="form-group">
                            <div class="input-group">
                                <label for="field_id" class="required d-flex align-items-center fs-6 fw-bold mb-2">رشته تحصیلی</label>
                                <select class="form-select form-select-solid" wire:model="field_id" name="field_id" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                    <option value="" selected>رشته تحصیلی مورد نظر را انتخاب نمایید</option>
                                    @foreach($fields as $field)
                                        <option value="{{ $field->id }}">{{ $field->title }}({{ $field->slug }})</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 fv-row">
                    <div>
                        <div class="form-group">
                            <div class="input-group">
                                <label for="grade_id" class="required d-flex align-items-center fs-6 fw-bold mb-2">مقطع تحصیلی</label>
                                <select class="form-select form-select-solid" wire:model="grade_id" name="grade_id" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                    <option value="" selected>مقطع تحصیلی مورد نظر را انتخاب نمایید</option>
                                    @foreach($grades as $grade)
                                        <option value="{{ $grade->id }}">{{ $grade->title }}({{ $grade->slug }})</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 fv-row">
                    <label for="title" class="required d-flex align-items-center fs-6 fw-bold mb-2">عنوان </label>
                    <input type="text" class="form-control form-control-solid" wire:model="title" name="title"/>
                </div>
                <div class="col-md-12 fv-row">
                    <label for="published"  class="required d-flex align-items-center fs-6 fw-bold mb-2">تاریخ انتشار</label>
                    <input type="text" data-jdp class="form-control form-control-solid" autocomplete="off" wire:model.lazy="published" name="published" placeholder="تاریخ انتشار را وارد نمایید"/>
                    <span id="calendar"></span>
                </div>
                <div class="col-md-12 fv-row">
                    <label for="deadline" class="d-flex align-items-center fs-6 fw-bold mb-2">مهلت (ماه)</label>
                    <input type="text" class="form-control form-control-solid" wire:model="deadline" name="deadline"/>
                </div>
                <div class="col-md-12 fv-row">
                    <label for="description"  class="d-flex align-items-center fs-6 fw-bold mb-2">توضییحات</label>
                    <textarea class="form-control form-control-solid" rows="3" wire:model="description" name="description" placeholder="توضیحات مربوط به فرصت تحصیلی را بنویسید."></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">ذخیره</button>
                <button type="button" wire:click.prevent="cancelPosition()" class="btn btn-light" data-bs-dismiss="modal">انصراف</button>
            </div>
        </form>
        </div>
    </div>
</div>
<!--end::Modal-->



