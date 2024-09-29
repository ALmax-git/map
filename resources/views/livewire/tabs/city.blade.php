<div>
    <h3>Manage Cities</h3>

    <form wire:submit.prevent="createCity">
        <div class="form-group">
            <label for="name">City Name</label>
            <input type="text" wire:model="name" class="form-control" id="name" placeholder="Enter City Name">
        </div>
        <div class="form-group">
            <label for="selectedRegion">Select Region</label>
            <select wire:model="selectedRegion" class="form-control" id="selectedRegion">
                <option value="">Choose Region</option>
                @foreach($regions as $region)
                <option value="{{ $region->id }}">{{ $region->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Save City</button>
    </form>

    <hr>

    <h4>Existing Cities</h4>
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Region</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cities as $city)
            <tr>
                <td>{{ $city->name }}</td>
                <td>{{ $city->region->name ?? 'N/A' }}</td>
                <td>
                    <button wire:click="editCity({{ $city->id }})" class="btn btn-primary">Edit</button>
                    <button wire:click="deleteCity({{ $city->id }})" class="btn btn-danger">Delete</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>