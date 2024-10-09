<?php

namespace App\Livewire\Proposals;

use App\Actions\ArrangePositions;
use App\Models\Project;
use App\Models\Proposal;
use App\Livewire\Proposals\PerdeuMane;

use DB;
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

        DB::transaction(function () {
            $proposal = $this->project->proposals()
                ->updateOrCreate(
                    ['email' => $this->email],
                    ['hours' => $this->hours,]
                );

            $this->arrangePositions($proposal);
        });

        $this->dispatch('proposal::created');

        $this->modal = false;
    }

    public function arrangePositions(Proposal $proposal)
    {
        $query = DB::select('
            select *, row_number() over (order by hours asc) as newPosition
            from proposals
            where project_id = :project
        ', ['project' => $proposal->project_id]);

        $position = collect($query)
            ->where('id', '=', $proposal->id)
            ->first();

        $otherProposal = collect($query)
            ->where('position', '=', $position->newPosition)
            ->first();

        if ($otherProposal) {
            $proposal->update(['position_status' => 'up']);
            $oProposal = Proposal::find($otherProposal->id);

            $oProposal->update(['position_status' => 'down']);
            // $oProposal->notify(new PerdeuMane($this->project));
        }
        ArrangePositions::run($proposal->project_id);
    }
}
