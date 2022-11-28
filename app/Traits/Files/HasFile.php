<?php


namespace App\Traits\Files;


use App\Models\File;
use Illuminate\Support\Facades\Storage;

trait HasFile
{
    public function file()
    {
        return $this->morphOne(File::class, 'filable');
    }

    public function uploadFile()
    {
        if (request()->hasFile('image')) {
            //Store the new image in public images folder & set the path in $image variable
            $image = request()->image->store('images');
            //Create a new user's image in images table
            $this->file()->create(['path' => $image, 'type' => 'image']);
        }

        if (request()->hasFile('flag')) {
            $image = request()->flag->store('flags');
            $this->file()->create(['path' => $image, 'type' => 'flag']);
        }

        if (request()->hasFile('icon')) {
            $image = request()->icon->store('icons');
            $this->file()->create(['path' => $image, 'type' => 'icon']);
        }

        if (request()->hasFile('logo')) {
            $image = request()->logo->store('logos');
            $this->file()->create(['path' => $image, 'type' => 'logo']);
        }

        if (request()->hasFile('file')) {
            $image = request()->file->store('files');
            $this->file()->create(['path' => $image, 'type' => 'file']);
        }
    }

    public function updateFile()
    {
        if (request()->hasFile('image')) {
            //Delete the old image from the public images folder
            if ($this->file && is_object($this->file)) {
                Storage::delete($this->file->getRawOriginal('path'));
                //Delete the old image from the images table
                $this->file()->delete();
            }
            //Store the new image in public images folder & set the path in $image variable
            $image = request()->image->store('images');
            //Create a new user's image in images table
            $this->file()->create(['path' => $image, 'type' => 'image']);
        }

        if (request()->hasFile('flag')) {
            if ($this->file && is_object($this->file)) {
                Storage::delete($this->file->getRawOriginal('path'));
            }
            $this->file()->delete();
            $image = request()->flag->store('flags');
            $this->file()->create(['path' => $image, 'type' => 'flag']);
        }

        if (request()->hasFile('icon')) {
            if ($this->file && is_object($this->file)) {
                Storage::delete($this->file->getRawOriginal('path'));
            }
            $this->file()->delete();
            $image = request()->icon->store('icons');
            $this->file()->create(['path' => $image, 'type' => 'icon']);
        }

        if (request()->hasFile('logo')) {
            if ($this->file && is_object($this->file)) {
                Storage::delete($this->file->getRawOriginal('path'));
            }
            $this->file()->delete();
            $image = request()->logo->store('logos');
            $this->file()->create(['path' => $image, 'type' => 'logo']);
        }

        if (request()->hasFile('file')) {
            if ($this->file && is_object($this->file)) {
                Storage::delete($this->file->getRawOriginal('path'));
            }
            $this->file()->delete();
            $image = request()->file->store('files');
            $this->file()->create(['path' => $image, 'type' => 'file']);
        }
    }

    public function deleteFile()
    {
        if ($this->file) {
            if ($this->file && is_object($this->file)) {
                Storage::delete($this->file->getRawOriginal('path'));
                //Storage::delete($this->file->path);
            }
            //Delete image from images table
            $this->file()->delete();
        }
    }

}
