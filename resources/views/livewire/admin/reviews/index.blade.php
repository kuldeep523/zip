<div>
    <h2 class="h4 mb-4">Review Management</h2>
    <div class="card border-0 shadow-sm">
        <table class="table mb-0">
            <thead><tr><th>Product</th><th>User</th><th>Rating</th><th>Comment</th><th>Status</th><th></th></tr></thead>
            <tbody>
            @foreach($reviews as $review)
                <tr>
                    <td>{{ $review->product?->name }}</td>
                    <td>{{ $review->user?->name }}</td>
                    <td>@for($i=0;$i<$review->rating;$i++)<i class="bi bi-star-fill text-warning"></i>@endfor</td>
                    <td>{{ Str::limit($review->comment, 50) }}</td>
                    <td>{{ $review->is_approved ? 'Approved' : 'Pending' }}</td>
                    <td>
                        @unless($review->is_approved)
                        <button wire:click="approve({{ $review->id }})" class="btn btn-sm btn-success">Approve</button>
                        @endunless
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="card-footer">{{ $reviews->links('pagination::custom-admin') }}</div>
    </div>
</div>
