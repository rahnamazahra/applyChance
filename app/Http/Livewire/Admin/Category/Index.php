<?php

namespace App\Http\Livewire\Admin\Category;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $CategoryId, $title, $slug;
    public $updateCategory = false;
    public $addCategory    = false;
    public $searchTerm     = "";

    public function render()
    {
        $searchTerm = '%'.$this->searchTerm.'%';
        return view('livewire.admin.category.index', ['categories' => Category::where('title', 'like', $searchTerm)->orWhere('slug', 'like', $searchTerm)->paginate(1)]);
    }

    protected $rules = [
        'title'     => 'required',
        'slug'      => 'required'
    ];
    public function resetCategorys()
    {
        $this->CategoryId       = '';
        $this->title            = '';
        $this->slug             = '';
    }
    public function actionMode()
    {
        $this->resetCategorys();

        $this->addCategory    = true;
        $this->updateCategory = false;
    }

    public function createCategory()
    {
        $this->validate();
        try {
            Category::create([
                'title'      => $this->title,
                'slug'       => $this->slug
            ]);
            $this->emit('toast', 'success', 'درخواست شما برای ثبت آیتم جدید با موفقیت  انجام شد', 'موفقیت آمیز');
            $this->addCategory = false;
            $this->resetCategorys();
            $this->render();
        } catch (\Exception $ex) {
            $this->emit('toast', 'error', 'اشکالی ناشناخته به وجود آمده است', 'خطا');
        }
    }
    public function editCategory($id)
    {
        $this->resetCategorys();

        try {
            $Category = Category::findOrFail($id);
            if($Category)
            {
                $this->CategoryId     = $Category->id;
                $this->title            = $Category->title;
                $this->slug             = $Category->slug;
                $this->updateCategory = true;
                $this->addCategory    = false;
            }
        } catch (\Exception $ex) {
            $this->emit('toast', 'error', 'اشکالی ناشناخته به وجود آمده است', 'خطا');
        }
    }
    public function updateCategory()
    {
        $this->validate();
        try {
            Category::whereId($this->CategoryId)->update([
                'title'      => $this->title,
                'slug'       => $this->slug
            ]);
            $this->emit('toast', 'success', 'درخواست شما برای ویرایش آیتم باموفقیت انجام شد', 'موفقیت آمیز');
            $this->resetCategorys();
            $this->updateCategory = false;
            $this->render();
        } catch (\Exception $ex) {
            $this->emit('toast', 'error', 'اشکالی ناشناخته به وجود آمده است', 'خطا');
        }
    }
    public function cancelCategory()
    {
        $this->addCategory    = false;
        $this->updateCategory = false;
        $this->resetCategorys();
        $this->render();
    }
    public function ConfirmDeleteCategory($id)
    {
        try {
            $Category = Category::findOrFail($id);
            if($Category)
            {
                $this->CategoryId = $Category->id;
            }
        } catch (\Exception $ex) {
            $this->emit('toast', 'error', 'اشکالی ناشناخته به وجود آمده است', 'خطا');
        }
    }
    public function deleteCategory()
    {
        try {
            Category::find($this->CategoryId)->delete();
            $this->emit('toast', 'success', 'درخواست شما برای حذف آیتم باموفقیت انجام شد', 'موفقیت آمیز');
            $this->resetCategorys();
            $this->render();

        } catch (\Exception $e){
            $this->emit('toast', 'error', 'اشکالی ناشناخته به وجود آمده است', 'خطا');
        }
    }
}

