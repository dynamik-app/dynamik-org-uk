<?php

namespace App\Livewire\Admin\Solutions;

use App\Models\Solution;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Title;

#[Title('Manage Solution')]
class Manage extends Component
{
    use WithFileUploads;

    public Solution $solution;

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
            'slug' => 'required|string|unique:solutions,slug,' . $this->solution->id,
            'description' => 'nullable|string',
            'content' => 'nullable|string',
            'is_published' => 'nullable|boolean',
        ];
    }

    public function updatedUploadedFile()
    {
        $this->validate([
            'uploadedFile' => 'image|max:1024',
        ]);

        $path = $this->uploadedFile->store('photos', 'public');
        $url = asset('storage/' . $path);

        $this->dispatch('trix-upload-completed', url: $url);
    }

    public function mount(?Solution $solution = null)
    {
        $this->solution = $solution ?? new Solution();
        if ($this->solution->exists) {
            $this->name = $this->solution->name;
            $this->slug = $this->solution->slug;
            $this->description = $this->solution->description;
            $this->content = $this->solution->content;
            $this->is_published = $this->solution->is_published;
        }
    }

    public function updatedName($value)
    {
        $this->slug = Str::slug($value);
    }

    public function save()
    {
        $this->validate();

        $this->solution->name = $this->name;
        $this->solution->slug = $this->slug;
        $this->solution->description = $this->description;
        $this->solution->content = $this->content;
        $this->solution->is_published = $this->is_published;

        $this->solution->save();

        session()->flash('success', 'Solution saved successfully!');
        return redirect()->route('admin.solutions.edit', $this->solution);
    }

    public function render()
    {
        $title = $this->solution->exists ? 'Edit Solution' : 'Create Solution';

        return view('livewire.admin.solutions.manage')
            ->layout('layouts.app', [
                'title' => $title,
            ]);
    }
}
