<?php

namespace App\Livewire\Admin\Services;

use App\Models\Service;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Title;

#[Title('Manage Service')]
class Manage extends Component
{
    use WithFileUploads;

    public Service $service;

    public $name = '';
    public $slug = '';
    public $description = '';
    public $content = '';
    public $is_published = false;
    public $uploadedFile;

    protected function rules()
    {
        return [
            'name' => 'required|string|min:3',
            'slug' => 'required|string|unique:services,slug,' . $this->service->id,
            'description' => 'nullable|string', // <-- 'max:255' removed from this line
            'content' => 'nullable|string',
            'is_published' => 'nullable|boolean',
        ];
    }

    public function updatedUploadedFile()
    {
        $this->validate([
            'uploadedFile' => 'image|max:1024', // 1MB Max
        ]);

        // Store the file in 'public/photos' disk and get the URL
        $path = $this->uploadedFile->store('photos', 'public');
        $url = asset('storage/' . $path);

        // Dispatch event to the browser
        $this->dispatch('trix-upload-completed', url: $url);
    }

    public function mount(Service $service)
    {
        $this->service = $service;
        if ($this->service->exists) {
            $this->name = $this->service->name;
            $this->slug = $this->service->slug;
            $this->description = $this->service->description;
            $this->content = $this->service->content;
            $this->is_published = $this->service->is_published;
        }
    }

    public function updatedName($value)
    {
        $this->slug = Str::slug($value);
    }

    public function save()
    {
        $this->validate();

        $this->service->name = $this->name;
        $this->service->slug = $this->slug;
        $this->service->description = $this->description;
        $this->service->content = $this->content;
        $this->service->is_published = $this->is_published;

        $this->service->save();

        session()->flash('success', 'Service saved successfully!');
        return redirect()->route('admin.services.edit', $this->service);
    }

    public function render()
    {
        return view('livewire.admin.services.manage')
            ->layout('layouts.app');
    }
}