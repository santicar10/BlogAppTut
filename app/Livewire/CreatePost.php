<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;

class CreatePost extends Component
{
    // define the fields in order to perform model binding using livewire..
    public $post_title = '';
    public $content = '';

    // function to save post
    public function save(){
        $this->validate([
            'post_title' => 'required',
            'content' => 'required',
        ]);

        Post::create([
            'post_title' => $this->post_title,
            'content' => $this->content,
            'user_id' => auth()->user()->id,
        ]);
        $this->post_title = '';
        $this->content = '';

        $this->redirect('/my/posts',navigate: true); //add this to ensure livewire SPA navigation
        // after save return the fields to empty and redirect user to post lists..
    }
    public function render()
    {
        return view('livewire.create-post');
    }
}