@extends('backend.layouts.app')

@section('title', __('Products'))

@section('content')


    <x-backend.card>
        <x-slot name="header">
            @lang('Products')
        </x-slot>

        @if ($logged_in_user->hasAllAccess())
            <x-slot name="headerActions">
                <x-utils.link icon="c-icon cil-plus" class="card-header-action" :href="route('admin.products.create')" :text="__('Create Product')" />
            </x-slot>
        @endif

        <x-slot name="body">
            <table class="table table-striped table-condensed">
                <thead>
                    <tr>
                        <th>Product Name</th>
                        <th>Descripion</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($products as $product)
                        <tr>
                            <td class="text-capitalize">
                                <strong> {{ $product->name }}</strong>
                            </td>
                            <td>
                                {{ $product->description }}
                            </td>
                            <th>
                                $ {{ number_format($product->price, 2) }}
                            </th>
                        </tr>
                    @endforeach

                </tbody>
            </table>

            {{-- @lang('Welcome to the Dashboard') --}}
        </x-slot>
    </x-backend.card>
@endsection
