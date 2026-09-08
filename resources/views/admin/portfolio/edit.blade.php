<x-layouts.admin title="Edit Portofolio">
    <h1 class="text-xl font-bold text-mai-charcoal">Edit Portofolio</h1>
    <form method="POST" action="{{ route('admin.portfolio.update', $portfolio) }}" enctype="multipart/form-data" class="mt-6">
        @include('admin.portfolio._form')
    </form>
</x-layouts.admin>
