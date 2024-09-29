<div>
    <h3>Manage Countries</h3>

    <form wire:submit.prevent="createCountry">
        <div class="form-group">
            <label for="name">Country Name</label>
            <input type="text" wire:model="name" class="form-control" id="name" placeholder="Enter Country Name">
        </div>
        <div class="form-group">
            <label for="code">Country Code</label>
            <input type="text" wire:model="code" class="form-control" id="code" placeholder="Enter Country Code">
        </div>
        <button type="submit" class="btn btn-primary">Save Country</button>
    </form>

    <hr>

    <h4>Existing Countries</h4>
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Code</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($countries as $country)
            <tr>
                <td>{{ $country->name }}</td>
                <td>{{ $country->code }}</td>
                <td>
                    <button wire:click="editCountry({{ $country->id }})" class="btn btn-primary">Edit</button>
                    <button wire:click="deleteCountry({{ $country->id }})" class="btn btn-danger">Delete</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>