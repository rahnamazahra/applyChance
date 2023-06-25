<?php

namespace App\Http\Livewire\Admin\Position;

use App\Models\Field;
use App\Models\Grade;
use App\Models\Position;
use App\Models\Univercity;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $positionId, $univercity_id, $title, $grade_id, $field_id, $deadline, $published, $description;
    public $addPosition    = false;
    public $updatePosition = false;
    public $searchTerm     = "";
    public function render()
    {
        $searchTerm = '%'.$this->searchTerm.'%';
        return view('livewire.admin.position.index', ['univercities' => Univercity::get(), 'fields'=> Field::get(), 'grades'=> Grade::get(), 'positions' => Position::where('title', 'like', $searchTerm)->paginate(3)]);
    }

    public function resetFields()
    {
        $this->title         = '';
        $this->univercity_id = '';
        $this->grade_id      = '';
        $this->field_id      = '';
        $this->deadline      = '';
        $this->published     = '';
        $this->description   = '';
    }
    public function actionMode()
    {
        $this->resetFields();
        $this->addPosition    = true;
        $this->updatePosition = false;
    }
    protected $rules = [
        'title'         => 'required',
        'univercity_id' => 'required',
        'grade_id'      => 'required',
        'field_id'      => 'required',
        'published'     => 'required',
    ];
    public function createPosition()
    {
        $this->validate();
        try {
            Position::create([
                'title'         => $this->title,
                'univercity_id' => $this->univercity_id,
                'grade_id'      => $this->grade_id,
                'field_id'      => $this->field_id,
                'deadline'      => $this->deadline,
                'published'     => $this->published,
                'description'   => $this->description
            ]);
            $this->emit('toast', 'success', 'باموفقیت انجام شد');
            $this->addPosition = false;
            $this->resetFields();
            $this->render();
        } catch (\Exception $ex) {
            $this->emit('toast', 'error', 'مشکلی به وجود آمده است');
        }
    }
    public function editPosition($id)
    {
        $this->resetFields();
        try {
            $position = Position::findOrFail($id);
            if($position)
            {
                $this->title          = $position->title;
                $this->univercity_id  = $position->univercity_id;
                $this->grade_id       = $position->grade_id;
                $this->field_id       = $position->field_id;
                $this->deadline       = $position->deadline;
                $this->published      = $position->published;
                $this->description    = $position->description;
                $this->updatePosition = true;
                $this->addPosition    = false;
            }
        } catch (\Exception $ex) {
            $this->emit('toast', 'error', 'مشکلی به وجود آمده است');
        }
    }

    public function updatePosition()
    {
        $this->validate();

        try {
            Position::whereId($this->positionId)->update([
                'title'         => $this->title,
                'univercity_id' => $this->univercity_id,
                'grade_id'      => $this->grade_id,
                'field_id'      => $this->field_id,
                'deadline'      => $this->deadline,
                'published'     => $this->published,
                'description'   => $this->description
            ]);
            $this->emit('toast', 'success', 'باموفقیت انجام شد');
            $this->resetFields();
            $this->updatePosition = false;
            $this->render();
        } catch (\Exception $ex) {
            $this->emit('toast', 'error', 'مشکلی به وجود آمده است');
        }
    }
    public function cancelPosition()
    {
        $this->addPosition    = false;
        $this->updatePosition = false;
        $this->resetFields();
        $this->render();
    }
      public function ConfirmDeletePosition($id)
    {
        try {
            $position = Position::findOrFail($id);
            if($position)
            {
                $this->positionId = $position->id;
            }
        } catch (\Exception $ex) {
            $this->emit('toast', 'error', 'مشکلی به وجود آمده است');
        }
    }

    public function deletePosition()
    {
        try {
            Position::find($this->positionId)->delete();
            $this->resetFields();
            $this->render();
            $this->emit('toast', 'success', 'باموفقیت انجام شد');

        } catch (\Exception $e){
            $this->emit('toast', 'error', 'مشکلی به وجود آمده است');
        }
    }
}
