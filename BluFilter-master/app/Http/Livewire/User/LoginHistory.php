<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\LoginHistory as History;
use Livewire\WithPagination;
use App\Models\User;


class LoginHistory extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $user_id;

    public function mount($id) {
        $this->user_id = $id;
    }

    public function render()
    {
        return view('livewire.user.login-history',
            [
                'logs' => History::where('user_id', $this->user_id)->paginate(5),
                'user' => User::find($this->user_id)
            ])
            ->layout('layouts.app', ['title' => __('messages.Logs')]);
    }
}
