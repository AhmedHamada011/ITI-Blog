<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use App\Models\Post;
use Livewire\Component;

class Comments extends Component
{

  public $post;
  public $comments;
  protected $listeners = ["commentAdded"=>'$refresh'];

  public function commentEvent()
  {
    dd("Sdsdsdsd");
  }

  public function render()
  {

    $this->comments = $this->post->comments;
    return view('livewire.comments',["comments"=>$this->comments]);
  }
}
