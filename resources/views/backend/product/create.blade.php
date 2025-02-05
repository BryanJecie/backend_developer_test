@extends('backend.layouts.app')

@section('title', __('Products'))

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('Create Product')
        </x-slot>

        @if ($logged_in_user->hasAllAccess())
            <x-slot name="headerActions">
                <x-utils.link icon="c-icon " class="card-header-action" :href="route('admin.products.index')" :text="__('Cancel')" />
            </x-slot>
        @endif

        <x-slot name="body">
            <form action="{{ route('admin.products.store') }}" method="POST">
                @csrf
                <div class="form-group row">
                    <label for="name" class="col-md-2 col-form-label">@lang('Product Name')</label>
                    <div class="col-md-10">
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="description" class="col-md-2 col-form-label">@lang('Description')</label>
                    <div class="col-md-10">
                        <textarea class="form-control" id="description" name="description" required></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="price" class="col-md-2 col-form-label">@lang('Price')</label>
                    <div class="col-md-10">
                        <input type="number" class="form-control" id="price" name="price" step="0.01" required>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-10 offset-md-2">
                        <button type="submit" class="btn btn-primary">@lang('Create Product')</button>
                    </div>
                </div>
            </form>

            {{-- @lang('Welcome to the Dashboard') --}}
        </x-slot>
    </x-backend.card>
@endsection
