<?php

namespace App\Livewire\Storefront;

use App\Models\Wishlist;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.gem-theme')]
class WishlistPage extends Component
{
    public function render()
    {
        $wishlist = auth()->user()
            ? Wishlist::with('items.product.images')->where('user_id', auth()->id())->first()
            : null;

        return view('livewire.storefront.wishlist-page', compact('wishlist'));
    }
}
