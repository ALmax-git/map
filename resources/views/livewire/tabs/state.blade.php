<div>
    <h3>Manage States</h3>

    <form wire:submit.prevent="createState">
        <div class="form-group">
            <label for="name">State Name</label>
            <input type="text" wire:model="name" class="form-control" id="name" placeholder="Enter State Name">
        </div>
        <div class="form-group">
            <label for="capital">Capital</label>
            <input type="text" wire:model="capital" class="form-control" id="capital" placeholder="Enter Capital">
        </div>
        <div class="form-group">
            <label for="postal_code">Postal Code</label>
            <input type="text" wire:model="postal_code" class="form-control" id="postal_code"
                placeholder="Enter Postal Code">
        </div>
        <div class="form-group">
            <label for="selectedCountry">Select Country</label>
            <select wire:model="selectedCountry" class="form-control" id="selectedCountry">
                <option value="">Choose Country</option>
                @foreach($countries as $country)
                <option value="{{ $country->id }}">{{ $country->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Save State</button>
    </form>

    <hr>

    <h4>Existing States</h4>
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Capital</th>
                <th>Postal Code</th>
                <th>Country</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($states as $state)
            <tr>
                <td>{{ $state->name }}</td>
                <td>{{ $state->capital }}</td>
                <td>{{ $state->postal_code }}</td>
                <td>{{ $state->country->name ?? 'N/A' }}</td>
                <td>
                    <button wire:click="editState({{ $state->id }})" class="btn btn-primary">Edit</button>
                    <button wire:click="deleteState({{ $state->id }})" class="btn btn-danger">Delete</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>