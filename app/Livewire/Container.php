<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\{Country, State, Region, City, School};
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Container extends Component
{
    use LivewireAlert;

    // Tab and Data Variables
    public $tab = 'country';
    public $countries, $states, $regions, $cities, $schools;

    // Input Fields
    public $name, $code, $capital, $postal_code, $rector, $address;
    public $selectedCountry, $selectedState, $selectedRegion, $selectedCity;

    // IDs for Editing Records
    public $country_id, $state_id, $region_id, $city_id, $school_id;

    // Initial Setup
    public function mount()
    {
        $this->initializeData();
        $this->alert('info', 'Welcome to Location Management', [
            'position' => 'center',
            'timer' => 2000
        ]);
    }

    // Fetch initial data
    private function initializeData()
    {
        $this->countries = Country::all();
        $this->states = State::all();
        $this->regions = Region::all();
        $this->cities = City::all();
        $this->schools = School::all();
    }

    // Render View
    public function render()
    {
        return view('livewire.container');
    }

    // Switch between tabs
    public function switchTab($tab)
    {
        $this->tab = $tab;
        $this->resetInputFields();
    }

    // Reset all input fields
    private function resetInputFields()
    {
        $this->name = '';
        $this->code = '';
        $this->capital = '';
        $this->postal_code = '';
        $this->rector = '';
        $this->address = '';
        $this->country_id = $this->state_id = $this->region_id = $this->city_id = $this->school_id = null;
    }

    // Validate Input and Save Record
    private function validateAndSave($model, $validationRules, $data, $id = null)
    {
        $this->validate($validationRules);

        $model::updateOrCreate(
            ['id' => $id],
            $data
        );

        $this->alert('success', ucfirst($model) . ' saved successfully.');
        $this->resetInputFields();
    }

    // CRUD Operations for Country
    public function createCountry()
    {
        $this->validateAndSave(Country::class, [
            'name' => 'required',
            'code' => 'required'
        ], [
            'name' => $this->name,
            'code' => $this->code
        ], $this->country_id);
    }

    public function editCountry($id)
    {
        $country = Country::findOrFail($id);
        $this->country_id = $country->id;
        $this->name = $country->name;
        $this->code = $country->code;
        $this->switchTab('country');
    }

    public function deleteCountry($id)
    {
        if (Country::find($id)) {
            Country::destroy($id);
            $this->alert('success', 'Country deleted successfully.');
        } else {
            $this->alert('error', 'Country not found.');
        }
    }

    // CRUD for States
    public function createState()
    {
        $this->validateAndSave(State::class, [
            'name' => 'required',
            'capital' => 'required',
            'postal_code' => 'required'
        ], [
            'name' => $this->name,
            'capital' => $this->capital,
            'postal_code' => $this->postal_code,
            'country_id' => $this->selectedCountry
        ], $this->state_id);
    }

    // CRUD for Regions
    public function createRegion()
    {
        $this->validateAndSave(Region::class, [
            'name' => 'required'
        ], [
            'name' => $this->name,
            'state_id' => $this->selectedState
        ], $this->region_id);
    }

    // CRUD for Cities
    public function createCity()
    {
        $this->validateAndSave(City::class, [
            'name' => 'required'
        ], [
            'name' => $this->name,
            'region_id' => $this->selectedRegion
        ], $this->city_id);
    }

    // CRUD for Schools
    public function createSchool()
    {
        $this->validate([
            'name' => 'required',
            'address' => 'required',
            'rector' => 'required', // Ensure this matches your variable
            'city_id' => 'required|exists:cities,id',
        ]);

        School::updateOrCreate(['id' => $this->school_id], [
            'name' => $this->name,
            'address' => $this->address,
            'rector' => $this->rector, // Ensure this variable is set correctly
            'city_id' => $this->selectedCity,
        ]);

        $this->alert('success', 'School saved successfully.');
        $this->resetInputFields();
    }
}
