<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    protected $listeners = ['deleteItem', 'massDestroy'];

    public $massDestroyAll = [];

    public function massDestroy() {
        User::destroy($this->massDestroyAll);
        $this->dispatchBrowserEvent('itemDeleted', [
            'message' => __('messages.users.deleted'), 'redirect' => route('user.index')]);
    }

    public function deleteItem($id) {
        $user = User::findOrFail($id);

        if($user) {
            $user->delete();

            $this->dispatchBrowserEvent('itemDeleted', [
                'message' => __('messages.users.deleted'), 'redirect' => route('user.index')]);
        }
    }

    public function render()
    {
        $users = User::where([
            ['type','<>', 'super_admin'],
            ['id', '<>', auth()->id()]
        ])->orderBy('id', 'DESC')->paginate(config('items_per_page'));

        return view('livewire.user.index', ['users' => $users])
                                ->layout('layouts.app', ['title' => __('messages.users.index')]);
    }
}
