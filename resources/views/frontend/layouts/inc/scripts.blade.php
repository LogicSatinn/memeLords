<script src="{{ mix('js/app.js') }}"></script>

<!-- For Night mode -->
<script>
    (function (window, document, undefined) {
        'use strict';
        if (!('localStorage' in window)) return;
        const nightMode = localStorage.getItem('gmtNightMode');
        if (nightMode) {
            document.documentElement.className += ' night-mode';
        }
    })(window, document);

    (function (window, document, undefined) {

        'use strict';

        // Feature test
        if (!('localStorage' in window)) return;

        // Get our newly insert toggle
        const nightMode = document.querySelector('#night-mode');
        if (!nightMode) return;

        // When clicked, toggle night mode on or off
        nightMode.addEventListener('click', function (event) {
            event.preventDefault();
            document.documentElement.classList.toggle('dark');
            if (document.documentElement.classList.contains('dark')) {
                localStorage.setItem('gmtNightMode', true);
                return;
            }
            localStorage.removeItem('gmtNightMode');
        }, false);

    })(window, document);
</script>

<!-- Javascript
================================================== -->
<script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
        crossorigin="anonymous"></script>
<script src="{{ asset('assets/js/tippy.all.min.js')}}"></script>
<script src="{{ asset('assets/js/uikit.js')}}"></script>
<script src="{{ asset('assets/js/simplebar.js')}}"></script>
<script src="{{ asset('assets/js/custom.js')}}"></script>
<script src="{{ asset("assets/js/bootstrap-select.min.js")}}"></script>
<script src="{{ asset('assets/js/ionicons.js') }}"></script>
@livewireScripts
