<?php

namespace App\Http\Livewire\Admin\City;

use App\Models\City;
use App\Models\Country;
use Livewire\Component;
use Livewire\WithPagination;
class Index extends Component
{
    use WithPagination;

    public  $CityId, $title, $slug, $country_id;
    public $updateCity = false;
    public $addCity    = false;
    public $searchTerm = "";

    public function render()
    {
        $searchTerm = '%'.$this->searchTerm.'%';
        return view('livewire.admin.city.index', [ 'countries' => Country::pluck('id', 'title'), 'cities' => City::where('title', 'like', $searchTerm)->orWhere('slug', 'like', $searchTerm)->paginate(1)]);
    }

    protected $rules = [
        'country_id'=> 'required',
        'title'     => 'required',
        'slug'      => 'required'
    ];
    public function resetFields()
    {
        $this->CityId     = '';
        $this->country_id = '';
        $this->title      = '';
        $this->slug       = '';
    }
    public function actionMode()
    {
        $this->resetFields();

        $this->addCity    = true;
        $this->updateCity = false;
    }

    public function createCity()
    {
        $this->validate();
        try {
            City::create([
                'country_id' => $this->country_id,
                'title'      => $this->title,
                'slug'       => $this->slug
            ]);
            $this->emit('toast', 'success', 'درخواست شما برای ثبت آیتم جدید باموفقیت انجام شد', 'موفقیت آمیز');
            $this->addCity = false;
            $this->resetFields();
            $this->render();
        } catch (\Exception $ex) {
            $this->emit('toast', 'error', 'اشکالی ناشناخته به وجود آمده است', 'خطا');
        }
    }
    public function editCity($id)
    {
        $this->resetFields();

        try {
            $City = City::findOrFail($id);
            if($City)
            {
                $this->CityId     = $City->id;
                $this->country_id = $City->country_id;
                $this->title      = $City->title;
                $this->slug       = $City->slug;
                $this->updateCity = true;
                $this->addCity    = false;
            }
        } catch (\Exception $ex) {
            $this->emit('toast', 'error', 'اشکالی ناشناخته به وجود آمده است', 'خطا');
        }
    }
    public function updateCity()
    {
        $this->validate();
        try {
            City::whereId($this->CityId)->update([
                'country_id' => $this->country_id,
                'title'      => $this->title,
                'slug'       => $this->slug
            ]);
            $this->emit('toast', 'success', 'درخواست شما برای ویرایش آیتم باموفقیت انجام شد', 'موفقیت آمیز');
            $this->resetFields();
            $this->updateCity = false;
            $this->render();
        } catch (\Exception $ex) {
            $this->emit('toast', 'error', 'اشکالی ناشناخته به وجود آمده است', 'خطا');
        }
    }
    public function cancelCity()
    {
        $this->addCity    = false;
        $this->updateCity = false;
        $this->resetFields();
        $this->render();
    }
    public function ConfirmDeleteCity($id)
    {
        try {
            $City = City::findOrFail($id);
            if($City)
            {
                $this->CityId = $City->id;
            }
        } catch (\Exception $ex) {
            $this->emit('toast', 'error', 'اشکالی ناشناخته به وجود آمده است', 'خطا');
        }
    }
    public function deleteCity()
    {
        try {
            City::find($this->CityId)->delete();
            $this->resetFields();
            $this->render();
            $this->emit('toast', 'success', 'درخواست شما برای حذف آیتم باموفقیت انجام شد', 'موفقیت آمیز');

        } catch (\Exception $e){
            $this->emit('toast', 'error', 'اشکالی ناشناخته به وجود آمده است', 'خطا');
        }
    }
}
