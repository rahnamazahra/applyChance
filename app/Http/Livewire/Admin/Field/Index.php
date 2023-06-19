<?php

namespace App\Http\Livewire\Admin\Field;

use App\Models\Field;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $FieldId, $title, $slug, $country_id, $city_id;
    public $updateField = false;
    public $addField    = false;
    public $searchTerm = "";

    public function render()
    {
        $searchTerm = '%'.$this->searchTerm.'%';
        return view('livewire.admin.field.index');
    }

    protected $rules = [
        'city_id'   => 'required',
        'country_id'=> 'required',
        'title'     => 'required',
        'slug'      => 'required'
    ];
    public function resetFields()
    {
        $this->FieldId          = '';
        $this->country_id       = '';
        $this->city_id          = '';
        $this->title            = '';
        $this->slug             = '';
    }
    public function actionMode()
    {
        $this->resetFields();

        $this->addField    = true;
        $this->updateField = false;
    }

    public function createField()
    {
        $this->validate();
        try {
            Field::create([
                'city_id'    => $this->city_id,
                'country_id' => $this->country_id,
                'title'      => $this->title,
                'slug'       => $this->slug
            ]);
            $this->emit('toast', 'success', 'باموفقیت انجام شد', '#FFFFFF', '#229954');
            $this->addField = false;
            $this->resetFields();
            $this->render();
        } catch (\Exception $ex) {
            $this->emit('toast', 'error', 'مشکلی به وجود آمده است', '#FFFFFF', '#CB4335');
        }
    }
    public function editField($id)
    {
        $this->resetFields();

        try {
            $Field = Field::findOrFail($id);
            if($Field)
            {
                $this->FieldId     = $Field->id;
                $this->city_id          = $Field->city_id;
                $this->country_id       = $Field->country_id;
                $this->title            = $Field->title;
                $this->slug             = $Field->slug;
                $this->updateField = true;
                $this->addField    = false;
            }
        } catch (\Exception $ex) {
            $this->emit('toast', 'error', 'مشکلی به وجود آمده است', '#FFFFFF', '#CB4335');
        }
    }
    public function updateField()
    {
        $this->validate();
        try {
            Field::whereId($this->FieldId)->update([
                'city_id'    => $this->city_id,
                'country_id' => $this->country_id,
                'title'      => $this->title,
                'slug'       => $this->slug
            ]);
            $this->emit('toast', 'success', 'باموفقیت انجام شد', '#FFFFFF', '#229954');
            $this->resetFields();
            $this->updateField = false;
            $this->render();
        } catch (\Exception $ex) {
            $this->emit('toast', 'error', 'مشکلی به وجود آمده است', '#FFFFFF', '#CB4335');
        }
    }
    public function cancelField()
    {
        $this->addField    = false;
        $this->updateField = false;
        $this->resetFields();
        $this->render();
    }
    public function deletestep1Field($id)
    {
        try {
            $Field = Field::findOrFail($id);
            if($Field)
            {
                $this->FieldId = $Field->id;
            }
        } catch (\Exception $ex) {
            $this->emit('toast', 'error', 'مشکلی به وجود آمده است', '#FFFFFF', '#CB4335');
        }
    }
    public function deleteField()
    {
        try {
            Field::find($this->FieldId)->delete();
            $this->resetFields();
            $this->render();
            $this->emit('toast', 'success', 'باموفقیت انجام شد', '#FFFFFF', '#229954');

        } catch (\Exception $e){
            $this->emit('toast', 'error', 'مشکلی به وجود آمده است', '#FFFFFF', '#CB4335');
        }
    }
}

