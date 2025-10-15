<x-app-layout>
    <h1>Contact Page</h1>
    <form method="POST" action="">
        @csrf
        <div>
            <label for="name">Username:</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}">
        </div>
        <div>
            <label for="category">Category:</label>
            <select id="category" name="category">
                <option value="">-- Select --</option>
                <option value="cdrama">Cdrama</option>
                <option value="actors">Actors</option>
                <option value="question">Question</option>
            </select>
        </div>
        <div>
            <label for="question">Question:</label>
            <textarea id="question" name="question"></textarea>
        </div>
        <div>
            <input type="submit">
        </div>
    </form>
</x-app-layout>
