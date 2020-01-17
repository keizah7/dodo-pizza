@if (session('message'))
    <section class="section">
        <div class="notification is-success">
            <button class="delete"></button>{{ session('message') }}
        </div>
    </section>
@endif
