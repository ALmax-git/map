<div class="container">
    <h2>Location Management</h2>

    {{-- Tab Navigation --}}
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link {{ $tab == 'country' ? 'active' : '' }}"
                wire:click.prevent="switchTab('country')">Countries</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ $tab == 'state' ? 'active' : '' }}" wire:click.prevent="switchTab('state')">States</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ $tab == 'region' ? 'active' : '' }}"
                wire:click.prevent="switchTab('region')">Regions</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ $tab == 'city' ? 'active' : '' }}" wire:click.prevent="switchTab('city')">Cities</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ $tab == 'school' ? 'active' : '' }}"
                wire:click.prevent="switchTab('school')">Schools</a>
        </li>
    </ul>

    {{-- Tab Content --}}
    <div class="tab-content mt-4">
        @if ($tab == 'country')
        {{-- Country CRUD --}}
        @include('livewire.tabs.country')
        @elseif ($tab == 'state')
        {{-- State CRUD --}}
        @include('livewire.tabs.state')
        @elseif ($tab == 'region')
        {{-- Region CRUD --}}
        @include('livewire.tabs.region')
        @elseif ($tab == 'city')
        {{-- City CRUD --}}
        @include('livewire.tabs.city')
        @elseif ($tab == 'school')
        {{-- School CRUD --}}
        @include('livewire.tabs.school')
        @endif
    </div>
    <livewire:map />
</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
@endpush