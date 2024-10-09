<?php

namespace App\Livewire\Projects;

use App\Models\Project;
use Livewire\Attributes\Computed;
use Livewire\Component;

class Proposals extends Component
{
    public Project $project;

    public int $qty = 10;

    #[Computed()]
    public function proposals()
    {
        return $this->project->proposals()
            ->orderBy('hours')
            ->paginate($this->qty);
        // ->simplePaginate($this->qty);

        // ->limit($this->qty)
        // ->get();
    }

    #[Computed()]
    public function lastProposalTime()
    {
        return $this->project->proposals()
            ->latest()->first()
            ->created_at->diffForHumans();
    }

    public function loadMore()
    {
        $this->qty += 10;
    }

    public function render()
    {
        return view('livewire.projects.proposals');
    }
}