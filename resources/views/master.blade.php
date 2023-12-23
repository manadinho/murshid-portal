<x-app-layout>
<body>
    @yield('contents')

    <script src="{{asset('assets/js/jquery.min.js')}}"></script>
    @stack('script')
</body>
</x-app-layout>