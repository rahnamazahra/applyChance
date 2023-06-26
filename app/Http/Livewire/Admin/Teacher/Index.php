<?php

namespace App\Http\Livewire\Admin\Teacher;
use App\Models\Field;
use App\Models\Teacher;
use Livewire\Component;
use Livewire\WithPagination;
class Index extends Component
{
    use WithPagination;

    public $TeacherId, $name, $email, $field_id;
    public $updateTeacher = false;
    public $addTeacher    = false;
    public $searchTerm    = "";

    public function render()
    {
        $searchTerm = '%'.$this->searchTerm.'%';
        return view('livewire.admin.teacher.index', [ 'fields' => Field::pluck('id', 'title'), 'teachers' => Teacher::where('name', 'like', $searchTerm)->orWhere('email', 'like', $searchTerm)->paginate(1)]);
    }

    protected $rules = [
        'field_id' => 'required',
        'name'     => 'required',
        'email'     => 'required'
    ];
    public function resetFields()
    {
        $this->TeacherId = '';
        $this->field_id  = '';
        $this->name      = '';
        $this->email     = '';
    }
    public function actionMode()
    {
        $this->resetFields();

        $this->addTeacher    = true;
        $this->updateTeacher = false;
    }

    public function createTeacher()
    {
        $this->validate();
        try {
            Teacher::create([
                'field_id' => $this->field_id,
                'name'     => $this->name,
                'email'    => $this->email
            ]);
            $this->emit('toast', 'success', 'درخواست شما برای ثبت آیتم جدید باموفقیت انجام شد', 'موفقیت آمیز');
            $this->addTeacher = false;
            $this->resetFields();
            $this->render();
        } catch (\Exception $ex) {
            $this->emit('toast', 'error', 'اشکالی ناشناخته به وجود آمده است', 'خطا');
        }
    }
    public function editTeacher($id)
    {
        $this->resetFields();

        try {
            $Teacher = Teacher::findOrFail($id);
            if($Teacher)
            {
                $this->TeacherId = $Teacher->id;
                $this->field_id  = $Teacher->field_id;
                $this->name      = $Teacher->name;
                $this->email     = $Teacher->email;
                $this->updateTeacher = true;
                $this->addTeacher    = false;
            }
        } catch (\Exception $ex) {
            $this->emit('toast', 'error', 'اشکالی ناشناخته به وجود آمده است', 'خطا');
        }
    }
    public function updateTeacher()
    {
        $this->validate();
        try {
            Teacher::whereId($this->TeacherId)->update([
                'field_id' => $this->field_id,
                'name'     => $this->name,
                'email'    => $this->email
            ]);
            $this->emit('toast', 'success', 'درخواست شما برای ویرایش آیتم باموفقیت انجام شد', 'موفقیت آمیز');
            $this->resetFields();
            $this->updateTeacher = false;
            $this->render();
        } catch (\Exception $ex) {
            $this->emit('toast', 'error', 'اشکالی ناشناخته به وجود آمده است', 'خطا');
        }
    }
    public function cancelTeacher()
    {
        $this->addTeacher    = false;
        $this->updateTeacher = false;
        $this->resetFields();
        $this->render();
    }
    public function ConfirmDeleteTeacher($id)
    {
        try {
            $Teacher = Teacher::findOrFail($id);
            if($Teacher)
            {
                $this->TeacherId = $Teacher->id;
            }
        } catch (\Exception $ex) {
            $this->emit('toast', 'error', 'اشکالی ناشناخته به وجود آمده است', 'خطا');
        }
    }
    public function deleteTeacher()
    {
        try {
            Teacher::find($this->TeacherId)->delete();
            $this->resetFields();
            $this->render();
            $this->emit('toast', 'success', 'درخواست شما برای حذف آیتم باموفقیت انجام شد', 'موفقیت آمیز');
        } catch (\Exception $e){
            $this->emit('toast', 'error', 'اشکالی ناشناخته به وجود آمده است', 'خطا');
        }
    }
}

