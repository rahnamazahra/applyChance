@section('title', 'موقعیت تحصیلی')
@include('livewire.admin.toast.errortoast')
<div class="row g-5 g-xl-8">
    <div class="d-flex justify-content-between">
    <div class="mr-auto p-2">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="جست و جو ..." wire:model="searchTerm" value="" />
        </div>
    </div>
    <div class="p-2">@include('livewire.admin.position.create')</div>
    </div>
    <div class="row g-5 g-xl-8">
        @forelse($positions as $position)
        <div class="col-xl-4">
            <div class="card card-xl-stretch mb-xl-8 justify-content-between">
                <div class="card border-hover-primary h-100">
                    <div class="card-body d-flex flex-column h-100 justify-content-between p-9">
                        <div>
                            <div class="card-toolbar flex-wrap">
                                <h3 class="fs-3 fw-bolder text-primary">{{ $position->univercity->title }}</h3>
                                <sapn class="text-gray-400">{{ $position->univercity->country->title }}،</span>
                                <span class="text-gray-400">{{ $position->univercity->city->title }}</span>
                                <p class="text-gray-400">{{ $position->grade->title }}</p>
                            </div>
                        </div>
                        <div>
                            <div class="fs-3 fw-bolder text-dark">{{ $position->title }}</div>
                            <p class="text-gray-400 fw-bold fs-5 mt-1 mb-7 card-paragraph" >{{ $position->description }}</p>
                        </div>
                        <div>
                            <div class="d-flex flex-wrap mb-5">
                                <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-7 mb-3">
                                    <div class="fs-6 text-gray-800 fw-bolder">{{ Morilog\Jalali\Jalalian::fromCarbon(\Carbon\Carbon::parse($position->published))->format('Y/m/d') ?? '-' }}</div>
                                    <div class="fw-bold text-gray-400">تاریخ انتشار</div>
                                </div>
                                <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 mb-3">
                                    <div class="fs-6 text-gray-800 fw-bolder">{{ $position->deadline }}ماه </div>
                                    <div class="fw-bold text-gray-400">مهلت</div>
                                </div>
                            </div>
                            <div class="symbol-group symbol-hover">
                                <button type="button" wire:click="editPosition({{ $position->id }})" data-bs-toggle="modal" data-bs-target="#PositionUpdateModal" class="btn btn-icon btn-bg-light btn-active-color-success btn-sm me-1" data-bs-toggle="tooltip" data-bs-placement="bottom" title="ویرایش">
                                    <span class="svg-icon svg-icon-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path opacity="0.3"d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z" fill="currentColor"></path>
                                            <path d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z"fill="currentColor"></path>
                                        </svg>
                                    </span>
                                </button>
                                <button data-bs-toggle="modal" data-bs-target="#PositionDeleteModal" wire:click= "ConfirmDeletePosition({{ $position->id }})" class="btn btn-icon btn-bg-light btn-active-color-danger btn-sm me-1" data-bs-toggle="tooltip" data-bs-placement="bottom" title="حذف">
                                    <span class="svg-icon svg-icon-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                            <path d="M5 9C5 8.44772 5.44772 8 6 8H18C18.5523 8 19 8.44772 19 9V18C19 19.6569 17.6569 21 16 21H8C6.34315 21 5 19.6569 5 18V9Z" fill="currentColor"></path>
                                            <path opacity="0.5" d="M5 5C5 4.44772 5.44772 4 6 4H18C18.5523 4 19 4.44772 19 5V5C19 5.55228 18.5523 6 18 6H6C5.44772 6 5 5.55228 5 5V5Z" fill="currentColor"></path>
                                            <path opacity="0.5" d="M9 4C9 3.44772 9.44772 3 10 3H14C14.5523 3 15 3.44772 15 4V4H9V4Z" fill="currentColor"></path>
                                        </svg>
                                    </span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="g-5 mt-10 text-center">ثبت نشده است</div>
        @endforelse
        <div class="mt-5">
            {{ $positions->links('vendor.livewire.bootstrap') }}
        </div>

    </div>
    @include('livewire.admin.position.update')
    @include('livewire.admin.position.delete')
</div>
@push('custom-scripts')
    <script type="text/javascript">
        jalaliDatepicker.startWatch();
        Livewire.emit('getPublishedForInput', place.geometry['location'].lat());
    </script>
@endpush
