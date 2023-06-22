<?php

namespace App\Http\Livewire\Admin\Univercity;
use App\Models\City;
use App\Models\Country;
use App\Models\Univercity;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    public $univercityId, $title, $slug;
    public $countryId        = NULL;
    public $city_id          = NULL;
    public $updateUnivercity = false;
    public $addUnivercity    = false;
    public $searchTerm       = "";
    public $cities           = [];

    public $listeners = [
      'cityChanged'
    ];
    public function mount()
    {
        $this->cities = collect();
         $this->city_id = NULL;
    }
    public function render()
    {
        $searchTerm = '%'.$this->searchTerm.'%';
        return view('livewire.admin.univercity.index', [ 'countries' => Country::pluck('id', 'title'), 'univercities' => Univercity::where('title', 'like', $searchTerm)->paginate(1)]);
    }

    public function updatedCountryId($countryId)
    {
        if (!is_null($countryId))
        {
            $this->cities = City::where('country_id', $countryId)->pluck('id', 'title');
            $this->city_id = NULL;

        }
    }
    public function cityChanged($value)
    {
        $this->city_id = $value;
    }
    public function setCity_id($city_id)
    {
        $this->syncInput('city_id', $city_id);
    }
    public function resetFields()
    {
        $this->univercityId     = '';
        $this->countryId        = NULL;
        $this->city_id          = NULL;
        $this->title            = '';
        $this->slug             = '';
        $this->cities           = [];
    }
    public function actionMode()
    {
        $this->resetFields();
        $this->addUnivercity    = true;
        $this->updateUnivercity = false;
    }
    protected $rules = [
        'city_id'    => 'required',
        'countryId'  => 'required',
        'title'      => 'required',
        'slug'       => 'required'
    ];
    public function createUnivercity()
    {
        try {
            Univercity::create([
                'country_id' => $this->countryId,
                'city_id'    => $this->city_id,
                'title'      => $this->title,
                'slug'       => $this->slug,
            ]);
            $this->emit('toast', 'success', 'باموفقیت انجام شد', '#FFFFFF', '#229954');
            $this->addUnivercity = false;
            $this->resetFields();
            $this->render();
        } catch (\Exception $ex) {
            $this->emit('toast', 'error', 'مشکلی به وجود آمده است', '#FFFFFF', '#CB4335');
        }
    }
    public function editUnivercity($id)
    {
        $this->resetFields();
        try {
            $Univercity = Univercity::findOrFail($id);
            if($Univercity)
            {
                $this->univercityId     = $Univercity->id;
                $this->city_id          = $Univercity->city_id;
                $this->countryId        = $Univercity->country_id;
                $this->title            = $Univercity->title;
                $this->slug             = $Univercity->slug;
                $this->cities           = City::where('country_id', $this->countryId)->pluck('id', 'title');
                $this->updateUnivercity = true;
                $this->addUnivercity    = false;
            }
        } catch (\Exception $ex) {
            $this->emit('toast', 'error', 'مشکلی به وجود آمده است', '#FFFFFF', '#CB4335');
        }
    }

    public function updateUnivercity()
    {
        $this->validate();
        try {
            Univercity::whereId($this->univercityId)->update([
                'city_id'    => $this->city_id,
                'country_id' => $this->countryId,
                'title'      => $this->title,
                'slug'       => $this->slug
            ]);
            $this->emit('toast', 'success', 'باموفقیت انجام شد', '#FFFFFF', '#229954');
            $this->resetFields();
            $this->updateUnivercity = false;
            $this->render();
        } catch (\Exception $ex) {
            $this->emit('toast', 'error', 'مشکلی به وجود آمده است', '#FFFFFF', '#CB4335');
        }
    }
    public function cancelUnivercity()
    {
        $this->addUnivercity    = false;
        $this->updateUnivercity = false;
        $this->resetFields();
        $this->render();
    }
    public function ConfirmDeleteUnivercity($id)
    {
        try {
            $Univercity = Univercity::findOrFail($id);
            if($Univercity)
            {
                $this->univercityId = $Univercity->id;
            }
        } catch (\Exception $ex) {
            $this->emit('toast', 'error', 'مشکلی به وجود آمده است', '#FFFFFF', '#CB4335');
        }
    }
    public function deleteUnivercity()
    {
        try {
            Univercity::find($this->univercityId)->delete();
            $this->resetFields();
            $this->render();
            $this->emit('toast', 'success', 'باموفقیت انجام شد', '#FFFFFF', '#229954');

        } catch (\Exception $e){
            $this->emit('toast', 'error', 'مشکلی به وجود آمده است', '#FFFFFF', '#CB4335');
        }
    }

}
