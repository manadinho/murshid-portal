
<x-app-layout>
    <x-slot name="header">
            <button type="Submit" id="button"><a href="/create-project">Create Project</a></button>
            
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
@foreach ($project as $projects)
<tr>
  <td>
  {{ $projects->id }}
  </td>
  <td>
  {{ $projects->name }}
  </td>
  <td class="config-icons">
  
<a href="{{ route('projects.edit', ['id' => $projects->id]) }}">
  <i style="font-size:24px" class="fa">&#xf044;</i>
</a>
<a href="{{ route('projects.delete', ['id' => $projects->id]) }}" method="Post">
  <i style="font-size:24px" class="fa">&#xf014;</i>
</a>
<a href="/config">
  <i style="font-size:24px" class="fa">&#xf013;</i>
</a>
</td>
</tr>
  @endforeach
</table>

</x-app-layout>
