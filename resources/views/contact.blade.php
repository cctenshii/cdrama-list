<x-app-layout>
    <div class="max-w-3xl mx-auto px-4 py-12">
        <h1 class="text-3xl font-bold mb-6 text-center text-gray-800">Contact Us</h1>

        <form method="POST" action="" class="bg-white shadow-md rounded-lg p-6 space-y-4">
            @csrf

            {{-- Username --}}
            <div>
                <label for="name" class="block font-semibold mb-1">Username:</label>
                <input
                    type="text"
                    id="name"
                    name="name"
                    value="{{ old('name') }}"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400"
                >
            </div>

            {{-- Category --}}
            <div>
                <label for="category" class="block font-semibold mb-1">Category:</label>
                <select
                    id="category"
                    name="category"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400"
                >
                    <option value="">-- Select --</option>
                    <option value="cdrama" {{ old('category') == 'cdrama' ? 'selected' : '' }}>Cdrama</option>
                    <option value="actors" {{ old('category') == 'actors' ? 'selected' : '' }}>Actors</option>
                    <option value="question" {{ old('category') == 'question' ? 'selected' : '' }}>Question</option>
                </select>
            </div>

            {{-- Question --}}
            <div>
                <label for="question" class="block font-semibold mb-1">Question:</label>
                <textarea
                    id="question"
                    name="question"
                    rows="5"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400"
                >{{ old('question') }}</textarea>
            </div>

            {{-- Submit --}}
            <div>
                <button
                    type="submit"
                    class="bg-blue-500 text-white px-6 py-2 rounded hover:bg-blue-600 transition"
                >
                    Submit
                </button>
            </div>

        </form>
    </div>
</x-app-layout>
