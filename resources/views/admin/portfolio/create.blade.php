<x-layouts.admin title="Tambah Portofolio">
    <h1 class="text-xl font-bold text-mai-charcoal">Tambah Portofolio</h1>
    <form method="POST" action="{{ route('admin.portfolio.store') }}" enctype="multipart/form-data" class="mt-6">
        @include('admin.portfolio._form')
    </form>
</x-layouts.admin>
