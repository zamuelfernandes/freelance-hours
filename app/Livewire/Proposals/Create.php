<?php

namespace App\Livewire\Proposals;

use App\Models\Project;
use App\Models\Proposal;
use Livewire\Attributes\Rule;
use Livewire\Component;

class Create extends Component
{
    public bool $modal = false;
    public function render()
    {
        return view('livewire.proposals.create');
    }

    public Project $project;
    #[Rule(['required', 'email'])]
    public string $email = '';

    #[Rule(['required', 'numeric', 'gt:0'])]
    public int $hours = 0;
    public bool $agree = false;

    public function save()
    {
        // $proposal = new Proposal();
        // $proposal->project_id = $this->project->id;
        // // --
        // $proposal->save();

        $this->validate();

        if (!$this->agree) {
            $this->addError('agree', 'Campo obrigatório!');
            return;
        }

        $this->project->proposals()
            ->updateOrCreate(
                ['email' => $this->email],
                ['hours' => $this->hours,]
            );

        $this->dispatch('proposal::created');

        $this->modal = false;
    }
}