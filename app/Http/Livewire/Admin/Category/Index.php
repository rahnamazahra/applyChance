<?php

namespace App\Http\Livewire\Admin\Category;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $CategoryId, $title, $slug, $country_id, $city_id;
    public $updateCategory = false;
    public $addCategory    = false;
    public $searchTerm     = "";

    public function render()
    {
        $searchTerm = '%'.$this->searchTerm.'%';
        return view('livewire.admin.category.index');
    }

    protected $rules = [
        'city_id'   => 'required',
        'country_id'=> 'required',
        'title'     => 'required',
        'slug'      => 'required'
    ];
    public function resetCategorys()
    {
        $this->CategoryId          = '';
        $this->country_id       = '';
        $this->city_id          = '';
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
                'city_id'    => $this->city_id,
                'country_id' => $this->country_id,
                'title'      => $this->title,
                'slug'       => $this->slug
            ]);
            $this->emit('toast', 'success', 'باموفقیت انجام شد', '#FFFFFF', '#229954');
            $this->addCategory = false;
            $this->resetCategorys();
            $this->render();
        } catch (\Exception $ex) {
            $this->emit('toast', 'error', 'مشکلی به وجود آمده است', '#FFFFFF', '#CB4335');
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
                $this->city_id          = $Category->city_id;
                $this->country_id       = $Category->country_id;
                $this->title            = $Category->title;
                $this->slug             = $Category->slug;
                $this->updateCategory = true;
                $this->addCategory    = false;
            }
        } catch (\Exception $ex) {
            $this->emit('toast', 'error', 'مشکلی به وجود آمده است', '#FFFFFF', '#CB4335');
        }
    }
    public function updateCategory()
    {
        $this->validate();
        try {
            Category::whereId($this->CategoryId)->update([
                'city_id'    => $this->city_id,
                'country_id' => $this->country_id,
                'title'      => $this->title,
                'slug'       => $this->slug
            ]);
            $this->emit('toast', 'success', 'باموفقیت انجام شد', '#FFFFFF', '#229954');
            $this->resetCategorys();
            $this->updateCategory = false;
            $this->render();
        } catch (\Exception $ex) {
            $this->emit('toast', 'error', 'مشکلی به وجود آمده است', '#FFFFFF', '#CB4335');
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
            $this->emit('toast', 'error', 'مشکلی به وجود آمده است', '#FFFFFF', '#CB4335');
        }
    }
    public function deleteCategory()
    {
        try {
            Category::find($this->CategoryId)->delete();
            $this->resetCategorys();
            $this->render();
            $this->emit('toast', 'success', 'باموفقیت انجام شد', '#FFFFFF', '#229954');

        } catch (\Exception $e){
            $this->emit('toast', 'error', 'مشکلی به وجود آمده است', '#FFFFFF', '#CB4335');
        }
    }
}

