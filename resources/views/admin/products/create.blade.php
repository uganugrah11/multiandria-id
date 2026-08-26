<x-layouts.admin title="Tambah Produk">

    <h1 class="text-xl font-bold text-mai-charcoal">Tambah Produk</h1>

    <form method="POST" action="{{ route('admin.products.store') }}" enctype="multipart/form-data" class="mt-6">
        @include('admin.products._form')
    </form>

</x-layouts.admin>
