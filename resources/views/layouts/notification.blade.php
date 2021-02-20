@if (session('message'))
    <section class="section" id="messageSection">
        <div class="notification is-success">
            {{ session('message') }}
        </div>
    </section>
@endif
