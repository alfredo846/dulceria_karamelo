<!-- Alerts -->
<div class="alert-container">
    @if (session('message'))
    <div class="alert alert-info">
        <button class="close" data-dismiss="alert"><i class="pci-cross pci-circle"></i></button>
        <strong>{{session("message")}} </strong>
	</div>
    @endif
    @if(session('error'))
    <div class="alert alert-error m-0 text-center fw-bold fs-6 w-100 my-2">{{session("error")}}</div>
    @endif
</div>
<!-- Alerts End -->