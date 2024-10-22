@extends('admin.layouts.app')

@section('title', 'TC')
@section('content')
    

    @vite('resources/css/app.css')
    <a href="{{ route('users.create') }}">User New</a>
    <br>

    <x-alert/>

    <div class="container mx-auto mt-10">
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-300">
                <thead>
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider border-b">
                            Nome
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider border-b">
                            Email
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider border-b">
                            Ação
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse ($users as $user)
                        
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                            {{ $user->name }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                {{ $user->email }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                <a href="{{ route('users.edit', $user->id) }}">Update</a>
                                <a href="{{ route('users.show', $user->id) }}">Detalhes</a>
                            </td>
                        </tr>
                    @empty 
                    <tr>
                        <td>Nenhum usuário registrado!</td>
                    </tr>
                    @endforelse
                    <!-- Adicione mais linhas conforme necessário -->
                </tbody>
            </table>
            {{ $users->links() }}
        </div>
    </div>

@endsection