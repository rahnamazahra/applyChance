<?php

namespace App\Http\Livewire\Admin\Country;

use App\Models\Country;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public  $countryId, $title, $slug;
    public $updateCountry = false;
    public $addCountry    = false;
    public $searchTerm = "";

    public function render()
    {
        $searchTerm = '%'.$this->searchTerm.'%';
        return view('livewire.admin.country.index', ['countries' => Country::where('title', 'like', $searchTerm)->orWhere('slug', 'like', $searchTerm)->paginate(1)]);
    }

    protected $rules = [
        'title' => 'required',
        'slug'  => 'required'
    ];
    public function resetFields()
    {
        $this->title = '';
        $this->slug  = '';
    }
    public function actionMode()
    {
        $this->resetFields();
        $this->addCountry    = true;
        $this->updateCountry = false;
    }

    public function createCountry()
    {
        $this->validate();
        try {
            Country::create([
                'title' => $this->title,
                'slug'  => $this->slug
            ]);
            $this->emit('toast', 'success', 'باموفقیت انجام شد');
            $this->resetFields();
            $this->addCountry = false;
            $this->render();
        } catch (\Exception $ex) {
            $this->emit('toast', 'error', 'مشکلی به وجود آمده است');
        }
    }
    public function editCountry($id)
    {

        $this->resetFields();

        try {
            $country = Country::findOrFail($id);
            if($country)
            {
                $this->title         = $country->title;
                $this->slug          = $country->slug;
                $this->countryId     = $country->id;
                $this->updateCountry = true;
                $this->addCountry    = false;
            }
        } catch (\Exception $ex) {
            $this->emit('toast', 'error', 'مشکلی به وجود آمده است');
        }
    }
    public function updateCountry()
    {
        $this->validate();
        try {
            Country::whereId($this->countryId)->update([
                'title' => $this->title,
                'slug'  => $this->slug
            ]);
            $this->emit('toast', 'success', 'باموفقیت انجام شد');
            $this->resetFields();
            $this->updateCountry = false;
            $this->render();
        } catch (\Exception $ex) {
            $this->emit('toast', 'error', 'مشکلی به وجود آمده است');
        }
    }
    public function cancelCountry()
    {
        $this->addCountry    = false;
        $this->updateCountry = false;
        $this->resetFields();
        $this->render();
    }
    public function ConfirmDeleteCountry($id)
    {
        try {
            $country = Country::findOrFail($id);
            if($country)
            {
                $this->countryId = $country->id;
            }
        } catch (\Exception $ex) {
            $this->emit('toast', 'error', 'مشکلی به وجود آمده است');
        }
    }
    public function deleteCountry()
    {
        try {
            Country::find($this->countryId)->delete();
            $this->resetFields();
            $this->render();
            $this->emit('toast', 'success', 'باموفقیت انجام شد');

        } catch (\Exception $e){
            $this->emit('toast', 'error', 'مشکلی به وجود آمده است');
        }
    }
}
