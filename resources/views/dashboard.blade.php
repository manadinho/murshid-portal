<x-app-layout>
    <x-slot name="header">
            <button type="Submit" id="button"><a href="{{ route('projects.create') }}">Create Project</a></button>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Projects') }}
            </h2>
    </x-slot>
    <table id="customers">
        <tr>
            <th>ID</th>
            <th>Project Name</th>
            <th>Action</th>
        </tr>
      @forelse ($projects as $project)
          <tr>
              <td>
                  {{ $project->id }}
              </td>
              <td>
                  {{ $project->name }}
              </td>
              <td class="config-icons">
                  <a href="{{ route('projects.edit', ['id' => $project->id]) }}">
                      <i style="font-size:24px" class="fa">&#xf044;</i>
                  </a>
                  <a href="{{ route('projects.delete', ['id' => $project->id]) }}" method="Post">
                      <i style="font-size:24px" class="fa">&#xf014;</i>
                  </a>
              </td>
          </tr>
        @empty
            <tr>
                <td colspan="3">No Projects Found</td>
            </tr>
      @endforelse 
    </table>
</x-app-layout>
