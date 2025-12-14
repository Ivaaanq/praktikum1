<?php

namespace App\Livewire\Country;

use App\Models\Country;
use Livewire\Attributes\On;
use Livewire\Component;

class ListCountries extends Component
{
use \Livewire\WithPagination;

    public $is_EditName = false;

    public function searching($field)
    {
       if ($field == $this->orderByField)
       {
        $this->orderByDirection = $this->orderByDirection == 'asc' ? 'desc' : 'asc';
       }
        $this->orderByField = $field;
    }

    public string $search = '';

    public $orderByFields = ['id','name','top'];

    public string $orderByField = 'id';

    public string $orderByDirection = 'desc';

    public function saveName($message, Country $country)
    {
        $country->update([
            'name' => $message
        ]);
    }
    public function updateSearch()
    {
        $this->resetPage();
    }
    public function deleteCountry(Country $country)
    {
        $country->delete();
    }

    public function decrement(Country $country)
    {
        $country->update(['top' => $country->top - 1]);
    }

    public function increment(Country $country)
    {
        $country->update(['top' => $country->top + 1]);
    }

    public function editCountry(Country $country)
    {

        $this->dispatch('EditCountry', country: $country);
    }

    #[On('StoreCountry')]
    public function render()
    {
        $countries = Country::query()->where('name','like',"%$this->search%")->orderBy($this->orderByField, $this->orderByDirection)->paginate(15)->withQueryString();
        return view('livewire.country.list-countries',compact('countries'));
    }
}