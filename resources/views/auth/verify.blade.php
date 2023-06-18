<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Verify Email Kamu </div>
                  <div class="card-body">
                   @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                           {{ __('Tautan verifikasi baru telah dikirim ke alamat email Anda.') }}
                       </div>
                   @endif
                   <a href="{{ url('/reset-password/'.$token) }}">Klik Disini</a>
               </div>
           </div>
       </div>
   </div>
</div>
