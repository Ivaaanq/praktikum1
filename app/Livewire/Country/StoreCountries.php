<?php

namespace App\Livewire\Country;

use App\Models\Country;
use Livewire\Attributes\On;
use Livewire\Component;

class StoreCountries extends Component
{
    public Country $country;

    public string $name = '';
    public int $top = 0;
    public $isEdit = false;

    public function storeCountry()
    {
        $valideted = $this->validate();

        Country::query()->create($valideted);

        $this->reset();

        $this->dispatch('StoreCountry');
    }


    #[On("EditCountry")]
    public function editCountry(Country $country)
    {

        $this->isEdit = true;
        $this->country = $country;
        $this->name = $country->name;
        $this->top = $country->top;
    }

    public function save()
    {
        $this->validate();
        $this->country->update(
            [
                'name' => $this->name,
                'top' => $this->top,
            ]);
        $this->reset();

        $this->dispatch('StoreCountry');
    }

    public function rules()
    {
        return [
            'name' => ['required','string','min:3'],
            'top' => ['required', 'max:100'],
        ];
    }

    public function render()
    {
        return view('livewire.country.store-countries');
    }
}