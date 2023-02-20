<?php

namespace App\Http\Livewire;

use App\Traits\CartTrait;
use Livewire\Component;
use Illuminate\Support\Str;
use Darryldecode\Cart\Facades\CartFacade as Cart;


class SearchController extends Component
{
    use CartTrait;
    public $search;
    public $currentPath;

    public function mount()
    {
        $this->currentPath = url()->current();
    }

    protected $listeners = [
        'scan-code' => 'ScanCode',
    ];

    public function ScanCode($barcode)
    {
        $routeName = Str::afterLast($this->currentPath, '/');
        if ($routeName != "pos") {
            $this->ScanearCode($barcode);

            redirect()->to('/pos');
        }
    }
    public function getQuantity($productId)
    {
        $exist = Cart::get($productId);
        if ($exist) {
            return $exist->quantity;
        } else {
            return 0;
        }
    }
    public function render()
    {
        return view('livewire.search');
    }
}
