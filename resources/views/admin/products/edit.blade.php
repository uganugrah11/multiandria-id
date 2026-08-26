<x-layouts.admin title="Edit Produk">

    <h1 class="text-xl font-bold text-mai-charcoal">Edit Produk</h1>

    <form method="POST" action="{{ route('admin.products.update', $product) }}" enctype="multipart/form-data" class="mt-6">
        @include('admin.products._form')
    </form>

</x-layouts.admin>
