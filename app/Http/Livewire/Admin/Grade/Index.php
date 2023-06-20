<?php

namespace App\Http\Livewire\Admin\Grade;

use App\Models\Grade;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $GradeId, $title, $slug;
    public $updateGrade = false;
    public $addGrade    = false;
    public $searchTerm  = "";

    public function render()
    {
        $searchTerm = '%'.$this->searchTerm.'%';
        return view('livewire.admin.grade.index', ['grades' => Grade::where('title', 'like', $searchTerm)->paginate(1)]);
    }

    protected $rules = [
        'title'     => 'required',
    ];
    public function resetFields()
    {
        $this->GradeId = '';
        $this->title   = '';
        $this->slug   = '';
    }
    public function actionMode()
    {
        $this->resetFields();

        $this->addGrade    = true;
        $this->updateGrade = false;
    }

    public function createGrade()
    {
        $this->validate();
        try {
            Grade::create([
                'title'      => $this->title,
                'slug'       => $this->slug,
            ]);
            $this->emit('toast', 'success', 'باموفقیت انجام شد', '#FFFFFF', '#229954');
            $this->addGrade = false;
            $this->resetFields();
            $this->render();
        } catch (\Exception $ex) {
            $this->emit('toast', 'error', 'مشکلی به وجود آمده است', '#FFFFFF', '#CB4335');
        }
    }
    public function editGrade($id)
    {
        $this->resetFields();

        try {
            $Grade = Grade::findOrFail($id);
            if($Grade)
            {
                $this->GradeId     = $Grade->id;
                $this->title       = $Grade->title;
                $this->slug        = $Grade->slug;
                $this->updateGrade = true;
                $this->addGrade    = false;
            }
        } catch (\Exception $ex) {
            $this->emit('toast', 'error', 'مشکلی به وجود آمده است', '#FFFFFF', '#CB4335');
        }
    }
    public function updateGrade()
    {
        $this->validate();
        try {
            Grade::whereId($this->GradeId)->update([
                'title'      => $this->title,
                'slug'       => $this->slug,
            ]);
            $this->emit('toast', 'success', 'باموفقیت انجام شد', '#FFFFFF', '#229954');
            $this->resetFields();
            $this->updateGrade = false;
            $this->render();
        } catch (\Exception $ex) {
            $this->emit('toast', 'error', 'مشکلی به وجود آمده است', '#FFFFFF', '#CB4335');
        }
    }
    public function cancelGrade()
    {
        $this->addGrade    = false;
        $this->updateGrade = false;
        $this->resetFields();
        $this->render();
    }
    public function ConfirmDeleteGrade($id)
    {
        try {
            $Grade = Grade::findOrFail($id);
            if($Grade)
            {
                $this->GradeId = $Grade->id;
            }
        } catch (\Exception $ex) {
            $this->emit('toast', 'error', 'مشکلی به وجود آمده است', '#FFFFFF', '#CB4335');
        }
    }
    public function deleteGrade()
    {
        try {
            Grade::find($this->GradeId)->delete();
            $this->resetFields();
            $this->render();
            $this->emit('toast', 'success', 'باموفقیت انجام شد', '#FFFFFF', '#229954');

        } catch (\Exception $e){
            $this->emit('toast', 'error', 'مشکلی به وجود آمده است', '#FFFFFF', '#CB4335');
        }
    }
}
