@extends('backend.layouts.app')

@section('title', __('Users'))

@section('content')
    <x-backend.card>
        <x-slot name="header">
            @lang('Users')
        </x-slot>

        @if ($logged_in_user->hasAllAccess())
            <x-slot name="headerActions">
                <x-utils.link icon="c-icon cil-plus" class="card-header-action" :href="route('admin.auth.user.create')" :text="__('Create User')" />
            </x-slot>
        @endif

        <x-slot name="body">
            <admin-user />
        </x-slot>
    </x-backend.card>
@endsection
