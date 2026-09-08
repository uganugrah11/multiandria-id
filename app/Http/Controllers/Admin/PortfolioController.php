<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PortfolioProject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PortfolioController extends Controller
{
    public function index()
    {
        $portfolioProjects = PortfolioProject::orderBy('sort_order')->paginate(15);

        return view('admin.portfolio.index', compact('portfolioProjects'));
    }

    public function create()
    {
        return view('admin.portfolio.create');
    }

    public function store(Request $request)
    {
        $validated = $this->validateProject($request);
        $validated['is_active'] = $request->boolean('is_active');
        $validated['is_featured'] = $request->boolean('is_featured');

        DB::transaction(function () use ($validated, $request) {
            $project = PortfolioProject::create(collect($validated)->except(['cover_image', 'gallery_images'])->toArray());
            $this->storeImages($project, $request);
        });

        return redirect()->route('admin.portfolio.index')->with('success', 'Portofolio berhasil ditambahkan.');
    }

    public function edit(PortfolioProject $portfolio)
    {
        return view('admin.portfolio.edit', compact('portfolio'));
    }

    public function update(Request $request, PortfolioProject $portfolio)
    {
        $validated = $this->validateProject($request);
        $validated['is_active'] = $request->boolean('is_active');
        $validated['is_featured'] = $request->boolean('is_featured');

        DB::transaction(function () use ($validated, $request, $portfolio) {
            $portfolio->update(collect($validated)->except(['cover_image', 'gallery_images'])->toArray());
            $this->storeImages($portfolio, $request);

            $gallery = $portfolio->gallery ?? [];
            $pathsToDelete = array_values(array_intersect(
                $request->input('delete_gallery_paths', []),
                $gallery,
            ));

            if ($pathsToDelete !== []) {
                Storage::disk('public')->delete($pathsToDelete);
                $portfolio->update(['gallery' => array_values(array_diff($gallery, $pathsToDelete))]);
            }
        });

        return redirect()->route('admin.portfolio.index')->with('success', 'Portofolio berhasil diperbarui.');
    }

    public function destroy(PortfolioProject $portfolio)
    {
        DB::transaction(function () use ($portfolio) {
            $paths = array_filter([$portfolio->cover_image, ...($portfolio->gallery ?? [])]);
            Storage::disk('public')->delete($paths);
            $portfolio->delete();
        });

        return redirect()->route('admin.portfolio.index')->with('success', 'Portofolio berhasil dihapus.');
    }

    private function validateProject(Request $request): array
    {
        return $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'category' => ['nullable', 'string', 'max:255'],
            'client_name' => ['nullable', 'string', 'max:255'],
            'year' => ['nullable', 'integer', 'min:1900', 'max:'.(now()->year + 1)],
            'description' => ['nullable', 'string'],
            'cover_image' => ['nullable', 'image', 'max:4096'],
            'gallery_images.*' => ['nullable', 'image', 'max:4096'],
            'is_active' => ['boolean'],
            'is_featured' => ['boolean'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
        ]);
    }

    private function storeImages(PortfolioProject $portfolio, Request $request): void
    {
        if ($request->hasFile('cover_image')) {
            $newPath = $request->file('cover_image')->store('portfolio', 'public');

            if ($portfolio->cover_image) {
                Storage::disk('public')->delete($portfolio->cover_image);
            }

            $portfolio->update(['cover_image' => $newPath]);
        }

        if ($request->hasFile('gallery_images')) {
            $gallery = $portfolio->gallery ?? [];

            foreach ($request->file('gallery_images') as $image) {
                $gallery[] = $image->store('portfolio', 'public');
            }

            $portfolio->update(['gallery' => $gallery]);
        }
    }
}
