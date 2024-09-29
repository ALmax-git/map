<div>
    <h3>Manage Regions</h3>

    <form wire:submit.prevent="createRegion">
        <div class="form-group">
            <label for="name">Region Name</label>
            <input type="text" wire:model="name" class="form-control" id="name" placeholder="Enter Region Name">
        </div>
        <div class="form-group">
            <label for="selectedState">Select State</label>
            <select wire:model="selectedState" class="form-control" id="selectedState">
                <option value="">Choose State</option>
                @foreach($states as $state)
                <option value="{{ $state->id }}">{{ $state->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Save Region</button>
    </form>

    <hr>

    <h4>Existing Regions</h4>
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>State</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($regions as $region)
            <tr>
                <td>{{ $region->name }}</td>
                <td>{{ $region->state->name ?? 'N/A' }}</td>
                <td>
                    <button wire:click="editRegion({{ $region->id }})" class="btn btn-primary">Edit</button>
                    <button wire:click="deleteRegion({{ $region->id }})" class="btn btn-danger">Delete</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>