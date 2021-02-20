@if (session('message'))
    <section class="section" id="messageSection">
        <div class="notification is-success">
            <button class="delete"></button>{{ session('message') }}
        </div>
    </section>
@endif

<script>
    let messageCloseButton = document.querySelector('.notification button.delete');
    messageCloseButton.addEventListener('click', function () {
        document.getElementById('messageSection').remove();
    })
</script>
