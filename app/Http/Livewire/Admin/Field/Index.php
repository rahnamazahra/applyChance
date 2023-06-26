<?php

namespace App\Http\Livewire\Admin\Field;

use App\Models\Category;
use App\Models\Field;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $FieldId, $title, $slug, $category_id;
    public $updateField = false;
    public $addField    = false;
    public $searchTerm = "";

    public function render()
    {
        $searchTerm = '%'.$this->searchTerm.'%';
        return view('livewire.admin.field.index', ['categories'=> Category::pluck('id','title'), 'fields' => Field::where('title', 'like', $searchTerm)->orWhere('slug', 'like', $searchTerm)->paginate(1)]);
    }

    protected $rules = [
        'category_id' => 'required',
        'title'       => 'required',
        'slug'        => 'required'
    ];
    public function resetFields()
    {
        $this->FieldId     = '';
        $this->category_id = '';
        $this->title       = '';
        $this->slug        = '';
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
                'category_id' => $this->category_id,
                'title'       => $this->title,
                'slug'        => $this->slug
            ]);
            $this->emit('toast', 'success', 'درخواست شما برای ثبت آیتم جدید باموفقیت انجام شد', 'موفقیت آمیز');
            $this->addField = false;
            $this->resetFields();
            $this->render();
        } catch (\Exception $ex) {
            $this->emit('toast', 'error', 'اشکالی ناشناخته به وجود آمده است', 'خطا');
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
                $this->category_id = $Field->category_id;
                $this->title       = $Field->title;
                $this->slug        = $Field->slug;
                $this->updateField = true;
                $this->addField    = false;
            }
        } catch (\Exception $ex) {
            $this->emit('toast', 'error', 'اشکالی ناشناخته به وجود آمده است', 'خطا');
        }
    }
    public function updateField()
    {
        $this->validate();
        try {
            Field::whereId($this->FieldId)->update([
                'category_id' => $this->category_id,
                'title'       => $this->title,
                'slug'        => $this->slug
            ]);
            $this->emit('toast', 'success', 'درخواست شما برای ویرایش آیتم باموفقیت انجام شد', 'موفقیت آمیز');
            $this->resetFields();
            $this->updateField = false;
            $this->render();
        } catch (\Exception $ex) {
            $this->emit('toast', 'error', 'اشکالی ناشناخته به وجود آمده است', 'خطا');
        }
    }
    public function cancelField()
    {
        $this->addField    = false;
        $this->updateField = false;
        $this->resetFields();
        $this->render();
    }
    public function ConfirmDeleteField($id)
    {
        try {
            $Field = Field::findOrFail($id);
            if($Field)
            {
                $this->FieldId = $Field->id;
            }
        } catch (\Exception $ex) {
            $this->emit('toast', 'error', 'اشکالی ناشناخته به وجود آمده است', 'خطا');
        }
    }
    public function deleteField()
    {
        try {
            Field::find($this->FieldId)->delete();
            $this->resetFields();
            $this->render();
            $this->emit('toast', 'success', 'درخواست شما برای حذف آیتم باموفقیت انجام شد', 'موفقیت آمیز');
        } catch (\Exception $e){
            $this->emit('toast', 'error', 'اشکالی ناشناخته به وجود آمده است', 'خطا');
        }
    }
}

