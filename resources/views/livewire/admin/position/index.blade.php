@section('title', 'موقعیت تحصیلی')
@section('custome-style')
<style>
    .card-paragraph {
        line-clamp: 5;
        overflow: hidden;
        -webkit-line-clamp:5;
        display: -webkit-box;
        text-align: justify;
        -webkit-box-orient: vertical;
        box-orient:vertical;
    }
</style>
@endsection
@include('livewire.admin.toast.errortoast')
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
                            <sapn class="text-gray-400">{{ $position->univercity->country->title }},</span>
                            <span class="text-gray-400">{{ $position->univercity->city->title }}</span>
                            <p class="text-gray-400">{{ $position->grade->title }}</p>
                        </div>
                    </div>
                    <div>
                        <div class="fs-3 fw-bolder text-dark">{{ $position->title }}</div>
                        <p class="text-gray-400 fw-bold fs-5 mt-1 mb-7 card-paragraph" >{{ $position->description ?? 'ثبت نشده است' }}</p>
                    </div>
                    <div>
                        <div class="d-flex flex-wrap mb-5">
                            <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 me-7 mb-3">
                                <div class="fs-6 text-gray-800 fw-bolder">{{ $position->published }}</div>
                                <div class="fw-bold text-gray-400">تاریخ انتشار</div>
                            </div>
                            <div class="border border-gray-300 border-dashed rounded min-w-125px py-3 px-4 mb-3">
                                <div class="fs-6 text-gray-800 fw-bolder">{{ $position->deadline }}ماه </div>
                                <div class="fw-bold text-gray-400">مهلت</div>
                            </div>
                        </div>
                        <div class="symbol-group symbol-hover">
                            @include('livewire.admin.position.update')
                            @include('livewire.admin.position.delete')
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
