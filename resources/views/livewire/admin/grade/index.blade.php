@section('title', 'مقطع تحصیلی')
@include('livewire.admin.toast.errortoast')
<div class="card">
      <div class="card-header">
        <div class="card-title">
            <div class="d-flex flex-stack flex-wrap gap-4">
                <div class="position-relative my-1">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="جست و جو ..." wire:model="searchTerm" value="" />
                    </div>
                </div>
            </div>
        </div>
        <div class="card-toolbar">
            <div class="d-flex justify-content-start bd-highlight mb-8 mt-8">
                <div class="p-2 bd-highlight">
                    @include('livewire.admin.grade.create')
                </div>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table id="grade_list" class="table table-responsive table-row-dashed align-middle fs-6 gy-4 my-0 pb-3 dataTable" data-kt-table-widget-3="all">
                <thead>
                    <tr>
                        <th class="text-center">ردیف</th>
                        <th class="text-center">عنوان تحصیلی</th>
                        <th class="text-center">برچسب لاتین</th>
                        <th class="text-center">اقدامات</th>
                    </tr>
                </thead>
                <tbody>

                @if(is_countable($grades))
                    @forelse($grades as $grade)
                        <tr>
                            <td class="text-center">{{ $loop->index+1 }}</td>
                            <td class="text-center">
                                <div class="position-relative ps-6 pe-3 py-2">
                                    @if(($loop->index)%2==0)
                                        <div class="position-absolute start-0 top-0 w-4px h-100 rounded-2 bg-warning"></div>
                                    @else
                                        <div class="position-absolute start-0 top-0 w-4px h-100 rounded-2 bg-info"></div>
                                    @endif
                                        <a href="#" class="mb-1 text-dark text-hover-primary fw-bolder"> {{ $grade->title }}</a>
                                </div>
                            </td>
                            <td class="text-center">{{ $grade->slug }}</td>
                            <td class="text-center">
                                <div class="btn btn-group-sm">
                                    @include('livewire.admin.grade.update')
                                    @include('livewire.admin.grade.delete')
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center">  ثبت نشده است.</td>
                        </tr>
                    @endforelse
                @endif
                </tbody>
            </table>
        </div>
        <div class="mt-5">
            {{ $grades->links('vendor.livewire.bootstrap') }}
        </div>
    </div>
</div>



