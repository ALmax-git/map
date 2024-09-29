<div>
    <h3>Manage Schools</h3>

    <form wire:submit.prevent="createSchool">
        <div class="form-group">
            <label for="name">School Name</label>
            <input type="text" wire:model="name" class="form-control" id="name" placeholder="Enter School Name">
        </div>
        <div class="form-group">
            <label for="address">School Address</label>
            <input type="text" wire:model="address" class="form-control" id="address" placeholder="Enter Address">
        </div>
        <div class="form-group">
            <label for="rector">School Rector</label>
            <input type="text" wire:model="rector" class="form-control" id="rector" placeholder="Enter Rector Name">
        </div>
        <div class="form-group">
            <label for="selectedCity">Select City</label>
            <select wire:model="selectedCity" class="form-control" id="selectedCity">
                <option value="">Choose City</option>
                @foreach($cities as $city)
                <option value="{{ $city->id }}">{{ $city->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Save School</button>
    </form>

    <hr>

    <h4>Existing Schools</h4>
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Address</th>
                <th>Rector</th>
                <th>City</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($schools as $school)
            <tr>
                <td>{{ $school->name }}</td>
                <td>{{ $school->address }}</td>
                <td>{{ $school->rector }}</td>
                <td>{{ $school->city->name ?? 'N/A' }}</td>
                <td>
                    <button wire:click="editSchool({{ $school->id }})" class="btn btn-primary">Edit</button>
                    <button wire:click="deleteSchool({{ $school->id }})" class="btn btn-danger">Delete</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>