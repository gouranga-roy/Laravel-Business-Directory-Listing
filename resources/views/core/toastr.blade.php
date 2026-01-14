<div class="toast-container position-fixed"></div>

<script>
    "Use strict";

    function toastrMsg(type, icon, header, message) {
        var toastr = `
            <div class="toast show dark status-${type}" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="icon-container">
                    ${icon}
                </div>
                <div class="content">
                    <div class="header">
                        <span class="title">${header}</span>
                        <button class="close-btn" data-bs-dismiss="toast">
                            <i class="fi fi-rr-cross-small"></i>
                        </button>
                    </div>
                    <p class="description">${message}</p>
                </div>
            </div>
            `;

        $('.toast-container').prepend(toastr);
        const toast = new bootstrap.Toast('.toast');
        toast.show();
    }

    function success(message) {
        let icon = `
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5"></path>
            </svg>
        `;

        toastrMsg('success', icon, 'Success.', message);
    }

    function warning(message) {
        let icon = `
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
        `;

        toastrMsg('warning', icon, 'Warning!', message);
    }

    function error(message) {
        let icon = `
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
            </svg>
        `;

        toastrMsg('error', icon, 'An Error Occurred !', message);
    }

    function info(message) {
        let icon = `
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
            </svg>
        `;

        toastrMsg('info', icon, 'Attention!', message);
    }

    function dark(message) {
        toastrMsg('dark', '', '', '', message);
    }
</script>


@php
    $alertTypes = ['success', 'error', 'warning', 'info', 'dark', 'light'];
@endphp

@foreach ($alertTypes as $type)
    @if ($message = Session::get($type))
        <script>
            {{ $type }}("{{ $message }}");
        </script>
        @php Session::forget($type); @endphp
    @endif
@endforeach

@if ($errors->any())
    @foreach ($errors->all() as $error)
        <script>
            error("{{ $error }}");
        </script>
    @endforeach
@endif
