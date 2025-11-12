<script type="text/javascript" src="{{ asset('js/ckfinder/ckfinder.js') }}"></script>
<script>
    CKFinder.config({
        connectorPath: "{{ route('ckfinder_connector') }}"
    });
</script>