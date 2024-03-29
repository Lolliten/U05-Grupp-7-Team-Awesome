<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Genre Movies</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <!-- Scripts Navbar -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<!-- Scripts Navbar-->
@vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<nav class="w-full">
    @include('layouts.navigation')

    <!-- Page Heading -->
    @if (isset($header))
    <header class="bg-white dark:bg-gray-800 shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            {{ $header }}
        </div>
    </header>
    @endif
</nav>


<body>
    <div class="flex flex-col min-h-screen items-center justify-center bg-gray-100 dark:bg-white-900 mx-auto">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 mx-auto">

            <!-- Heading -->
            <h1 class="text-3xl mb-8 flex justify-center" style="color: #ff0000;">Genre Movies</h1>

            <!-- Filter Form -->
            <!-- Detta formulär används för att filtrera filmer baserat på vald genre. -->
            <form action="{{ route('genre.filter') }}" method="GET" class="mb-8 flex flex-col sm:flex-row items-center justify-center">
                <label for="genre" class="mr-2">Select Genre:</label>
                <div class="flex">
                    <!-- Dropdown-lista för att välja genre -->
                    <select name="genre" id="genre" class="flex-grow bg-gray-300 text-black p-2 mb-2 sm:mb-0 mr-2 rounded-md border border-gray-300 focus:outline-none">
                        <option value="">All</option>
                        @foreach ($genres as $genre)
                        <option value="{{ $genre }}">{{ $genre }}</option>
                        @endforeach
                    </select>
                    <!-- Knapp för att filtrera filmer baserat på vald genre -->
                    <button type="submit" class="bg-gray-300 text-black px-4 py-2 rounded-md border border-gray-300 focus:outline-none">Filter</button>
                </div>
            </form>




            <!-- Responsive Table -->
            <div class="overflow-x-auto flex justify-center">
                <table class="w-full sm:w-full md:w-4/5 lg:w-3/4 xl:w-2/3 bg-gray border-collapse border border-gray-300 sm:rounded-lg">
                    <thead class="hidden sm:table-header-group">
                        <tr class="hover:bg-gray-100 sm:table-row flex flex-col w-full">
                            <th class="px-6 py-3 text-left sm:w-1/6">Title</th>
                            <th class="px-6 py-3 text-left sm:w-1/6">Genre</th>
                            <th class="px-6 py-3 text-left sm:w-1/6">Country</th>
                            <th class="px-6 py-3 text-left sm:w-1/6">Release Year</th>
                            <th class="px-6 py-3 text-left sm:w-1/6">Director</th>
                            <th class="px-6 py-3 text-left sm:w-1/6">Photo</th>
                            <th class="px-6 py-3 text-left sm:w-1/6">Comment</th>
                            <th class="px-6 py-3 text-left sm:w-1/6">My List</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($movies as $movie)
                        <tr class="hover:bg-gray-100 sm:table-row flex flex-col w-full">
                            <td class="border px-6 py-3 sm:w-1/6">{{ $movie->titel }}</td>
                            <td class="border px-6 py-3 sm:w-1/6">{{ $movie->genre }}</td>
                            <td class="border px-6 py-3 sm:w-1/6">{{ $movie->country }}</td>
                            <td class="border px-6 py-3 sm:w-1/6">{{ $movie->year }}</td>
                            <td class="border px-6 py-3 sm:w-1/6">{{ $movie->director }}</td>
                            <td class="py-2 px-4 border-b sm:table-cell"><img src="{{ asset($movie->photoPath) }}" alt="{{ $movie->title }}" class="w-21 h-auto"></td>
                            <td class="border px-6 py-3 sm:w-1/6">
                                <a href="{{ url('/comment/'.$movie->id) }}" class="text-white-500 hover:underline border border-blue-500 bg-blue-500 text-white px-2 py-1 rounded">Comment</a>
                            </td>
                            <!--AddToMyList button-->
                            <td class="border px-6 py-3 sm:w-1/6">
                                <a href="{{ url('/mylist/'.$movie->id) }}" class="text-white-500 hover:underline border border-blue-500 bg-green-500 text-white px-2 py-1 rounded">AddToMyList</a>
                            </td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

<div class=" w-full bg-gray-800 text-white p-4 z-50 block">
    @include('footer')
</div>

</html>