<div class="grid grid-cols-2 gap-6">
  @foreach ($this->projects as $project)
  <a href="{{ route('projects.show', $project) }}">
    <x-projects.simple-card :$project />
  </a>
  @endforeach
</div>
